<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System\User;
use App\Models\System\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Session;

class UsuariosController extends Controller
{

    public function index()
    {

        // $msg = 'Implementando';
        // return redirect()->route('admin.usuarios')->with('msg', $msg);

        //$users = User::with('roles.permissions')->orderBy('id', 'ASC')->paginate(5);


        if(Auth::user()->isRoot()) {

            // USUARIO ATUAL ROOT - MOSTRA TUDO
            $users = User::with('roles.permissions')->orderBy('id_user', 'ASC')->get();
        }
        elseif(Auth::user()->isAdmin()) {

            // USUARIO ATUAL ADMIN - MOSTRA TUDO - MENOS O ROOT
            $users = User::with('roles.permissions')
                ->whereHas(
                    'roles', function ($query) {
                        $query->where('name', '=', 'root');
                    }, '=', 0
                )
                ->orderBy('id_user', 'ASC')
                ->get();
        }
        else{

            // USUARIO ATUAL OUTROS - NAO MOSTRA USUARIOS ROOT E ADMIN
            $users = User::with('roles.permissions')
                ->whereHas(
                    'roles', function ($query) {
                        $query->whereIn('name', ['admin', 'root']);
                    }, '=', 0
                )
                ->orderBy('id_user', 'ASC')
                ->get();
        }

        return view('app.admin.usuarios.index', compact('users'));
    }


    public function cadastrar() 
    {
        $roles = Role::all();
        return view('app.admin.usuarios.cadastrar', compact('roles'));
    }

    public function visualizar($id) 
    {
        $registro = User::with('roles.permissions')->find($id);

        if (!$registro) {
            
            if (!$registro) {
                
                return $this->alertaRedirectNaoExiste();
            }
        }

        return view('app.admin.usuarios.visualizar', compact('registro'));
    }

    public function editar($id) 
    {
        $registro = User::with('roles.permissions')->find($id);

        if (!$registro) {
            
            return $this->alertaRedirectNaoExiste();
        }

        // NEGA A EDIÇÃO SE O GRUPO FOR SUPERIOR AO EDITADO
        if(!Auth::user()->isRoot()) {

            if(Auth::user()->isAdmin()) {

                if ($registro->isRoot()) {
                
                    if (!$registro) {
                        
                        return $this->alertaRedirectNegado();
                    }
                }
            }
            else{

                if ($registro->isRootOrAdmin()) {
                
                    if (!$registro) {
                        
                        return $this->alertaRedirectNegado();
                    }
                }
            }
        }

        $roles = Role::all();
        return view('app.admin.usuarios.editar', compact('registro','roles'));
    }

    public function excluir($id) 
    {
        $registro = User::find($id);
        $nome = $registro->name;
        $email = $registro->email;
        $registro->delete();

        Session::flash('success', 'Usuário [ '.$nome.' - '.$email.' ] apagado com sucesso!'); 

        return redirect()->route('admin.usuarios');
    }

    public function salvar(Request $req) 
    {
        $dados = $req->all();

        if (isset($dados['ativo'])) {
            $dados['ativo'] = '1';
        } else {
            $dados['ativo'] = '0';
        }

        if (empty($dados['id_user'])) {

            # NOVO CADASTRO
            $this->validate($req,[
                'name' => 'required',
                'email' => 'required|email|max:200|unique:sys_users,email',
                'roles' => 'required',
                'password'   => ["required"],
                'password-confirm' => 'required|same:password'
            ]);

            $create = User::create($dados);
            $id_user = $create->id_user;
        } else {

            $id_user = $dados['id_user'];

            $this->validate($req,[
                'name' => 'required',
                'email' => 'required|email|max:200|unique:sys_users,email,'.$id_user.',id_user',
                'roles' => 'required'
            ]);

            User::find($id_user)->update($dados);
        }


        //=============================================================
        // GRUPOS DE USUARIO
        //=============================================================

        if (intval($id_user) > 0) {

            $roles = [];

            if (isset($dados['roles'])) {

                if (sizeof($dados['roles']) > 0) {

                    foreach ($dados['roles'] as $role_k => $role_v) {
                        
                        if (in_array($role_v, [1,2])) {
                            
                            // SE FOR ROOT OU ADMIN - NAO ASSOCIA OUTROS GRUPOS
                            $roles = [];
                            $roles[] = $role_v;
                            break;
                        }
                        elseif (intval($role_v) > 2) {

                            // MONTA ARRAY DOS GRUPOS
                            $roles[] = $role_v;
                        }
                    }
                }
            }

            if (sizeof($roles) == 0) {
                
                // SE NAO TIVER GRUPO VÁLIDO COLOCA O PADRÃO
                $roles[] = 3;
            }

            User::find($id_user)->roles()->sync($roles);
        }
        
        //=============================================================

        return redirect()->route('admin.usuarios');
    }

    public function alertaRedirectNaoExiste() 
    {
        Session::flash('error', 'Usuário não existe!'); 
        Session::flash('toastr', ['tipo'=>'error', 'titulo'=>'ATENÇÃO', 'msg'=>'Usuário não existe!']);

        return redirect()->route('admin.usuarios');
    }

    public function alertaRedirectNegado() 
    {
        Session::flash('warning', 'Acesso Negado... Operação NÃO Autorizada!'); 
        Session::flash('toastr', ['tipo'=>'warning', 'titulo'=>'ATENÇÃO', 'msg'=>'Acesso Negado... Operação NÃO Autorizada!']);

        return redirect()->route('admin.usuarios');
    }

    public function view_trocasenha_user_atual()
    {
        return view('app.auth.passwords.reset_user_atual');
    }

    public function salva_trocasenha_user_atual(Request $req) 
    {
        $dados = $req->all();

        // dd($dados);
        $input = [];

        if (Auth::check()) {

            if (Auth::user()->ativo == 1) {

                $registro = User::find(Auth::id());
                $id_user = $registro->id_user;

                if ($id_user > 0) {

                    if (!Hash::check($dados['password_old'],$registro->password)){

                        return redirect()->route('trocasenha')->withErrors(['password_old' => 'Senha atual está incorreta'])->withInput();
                    }

                    $this->validate($req,[
                        'password_old'   => ["required"],
                        'password'   => ["required"],
                        'password-confirm' => 'required|same:password'
                    ]);

                    $input['password'] = Hash::make($dados['password']);

                    User::find($id_user)->update($input);
                    
                    Session::flash('success', 'Senha Alterada com Sucesso!'); 
                    Session::flash('toastr', ['tipo'=>'success', 'titulo'=>'ATENÇÃO', 'msg'=>'Senha Alterada com Sucesso!']);

                    return redirect()->route('home');
                }


            }

        }

        Session::flash('warning', 'Acesso Negado... Operação NÃO Autorizada!'); 
        Session::flash('toastr', ['tipo'=>'warning', 'titulo'=>'ATENÇÃO', 'msg'=>'Acesso Negado... Operação NÃO Autorizada!']);

        return redirect()->route('trocasenha');

    }

    public function view_meuPerfil()
    {
        $registro = User::with('roles.permissions')->find(Auth::id());

        return view('app.admin.usuarios.meu_perfil', compact('registro'));
    }

}
