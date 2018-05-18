<?php

namespace App\Http\Controllers\admin\root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::with('roles.permissions')->orderBy('id', 'ASC')->paginate(5);
        $users = User::with('roles.permissions')->orderBy('id', 'ASC')->get();

        return view('admin.root.users.index', compact('users'));
    }


    public function cadastrar() 
    {
        return 'Implementando - Cadastrar';

        return view('admin.conteudo.depoimentos_cadastrar');
    }

    public function editar($id) 
    {
        return 'Implementando - Editar';

        $registro = Depoimentos::find($id); // retorna id selecionado

        //dd($canal_pai);
        return view('admin.conteudo.depoimentos_editar', compact('registro'));
    }

    public function excluir($id) 
    {
        return 'Implementando - Excluir';

        Depoimentos::find($id)->delete();
        return redirect()->route('admin.conteudo.depoimentos');
    }

    public function salvar(Request $req) 
    {
        return 'Implementando - Salvar';

        $dados = $req->all();

        if (isset($dados['ativo'])) {
            $dados['ativo'] = 's';
        } else {
            $dados['ativo'] = 'n';
        }


        if (empty($dados['id'])) {
            Depoimentos::create($dados);
        } else {
            Depoimentos::find($dados['id'])->update($dados);
        }


        return redirect()->route('admin.conteudo.depoimentos');
    }




    //=================================================================================
    //      TESTEEESSSSSSSSSSSSSSSS
    //=================================================================================
    public function index2()
    {

        //$users = User::orderBy('id', 'ASC')->paginate(10);
        $users = User::orderBy('id', 'ASC');
        $usuarios = [];

        foreach ($users->get() as $k_users => $v_users) {

            $usuarios[$v_users->id]['nome'] = $v_users->name;
            $usuarios[$v_users->id]['grupos'] = [];
            $usuarios[$v_users->id]['permissoes'] = [];

            $isSuperAdmin = $v_users->isSuperAdmin();

            if ($isSuperAdmin) {

                $usuarios[$v_users->id]['permissoes'][] = array(

                    'desc' => 'Todas',
                    'key' => 'all',
                );
            }

            foreach ($v_users->roles()->get() as $k_roles => $v_roles) {

                $usuarios[$v_users->id]['grupos'][] = array(

                    'desc' => $v_roles->label,
                    'key' => $v_roles->name,
                );

                if (!$isSuperAdmin) {

                    foreach ($v_roles->permissions()->get() as $k_permissions => $v_permissions) {

                        $usuarios[$v_users->id]['permissoes'][] = array(

                            'desc' => $v_permissions->label,
                            'key' => $v_permissions->name,
                        );
                    }
                }
                


            }
        }
        return $usuarios;
    }

}
