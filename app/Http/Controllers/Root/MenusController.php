<?php

namespace App\Http\Controllers\Root;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\System\Menus;
use App\Models\System\Routes;
use \Session;

class MenusController extends Controller
{

    private $montandoMenuSelect;


    public function index(){


        //return $this->menuSelectAll();

        return view('app.root.menu');
    }


    public function cadastrar() 
    {
        //
    }

    public function editar($id) 
    {
        $registro = Menus::find($id);

        if (!$registro) {
            
            return false;
        }


        // if (\Request::ajax()) {
        //     dd('ajax');
        // }

        $routes = Routes::all();
        $menuOptionsAll = $this->menuOptionsAll($registro->id_menu_pai);

        return view('app.root.menu_editar', compact('registro','routes','menuOptionsAll'));
    }

    public function excluir($id) 
    {
        $registro = Menus::find($id);
        $registro->delete();

        $response = array(
          'status' => 'success'
        );

        return response()->json($response); 
    }

    public function salvar(Request $request) 
    {
        $dados = $request->all();

        dd($dados);

        if (isset($dados['ativo'])) {
            $dados['ativo'] = '1';
        } else {
            $dados['ativo'] = '0';
        }


        if (empty($dados['id_menu'])) {

            # NOVO CADASTRO
            // $this->validate($req,[
            //     'name' => 'required',
            //     'email' => 'required|email|max:200|unique:sys_users,email',
            //     'roles' => 'required',
            //     'password'   => ["required"],
            //     'password-confirm' => 'required|same:password'
            // ]);

            // $create = User::create($dados);
            // $id_user = $create->id_user;
        } else {

            $id_menu = $dados['id_menu'];

            // $this->validate($req,[
            //     'name' => 'required',
            //     'email' => 'required|email|max:200|unique:sys_users,email,'.$id_user.',id_user',
            //     'roles' => 'required'
            // ]);

            Menus::find($id_menu)->update($dados);
        }






        $response = array(
          'status' => 'success',
          'lista' => $dados,
        );

        return response()->json($response); 
    }





    public function jsonVerSubMenus(Request $request)
    {
        $menus = Menus::menusSelectID($request->id_menu_pai);
        
        $routes_vet = [];
        $routes = Routes::all()->toArray();
        foreach ($routes as $routes_k => $routes_v) {
            $routes_vet[$routes_v['id_route']] = $routes_v;
        }

        $response = array(
          'status' => 'success',
          'menus' => $menus,
          'routes' => $routes_vet,
        );

        return response()->json($response); 
    }


    public function jsonUpdateOrder(Request $request)
    {
        $dados = [];
        $pos = 0;

        foreach($request->lista as $menu_id) {
            $dados['ordem'] = $pos;
            Menus::find($menu_id)->update($dados);
            $pos++;
        }

        $response = array(
          'status' => 'success',
          'lista' => $request->lista,
        );

        return response()->json($response); 
    }

    public function menuOptionsAll($selected_id_menu_pai) {

        $itens = Menus::treeAll();

        $this->montandoMenuSelect = '';

        $this->montandoMenuSelect .= '<select class="form-control" required name="id_menu_pai">';
        $this->montandoMenuSelect .= '<option class="text-success" style="font-weight: bold" value=0 '.(0==$selected_id_menu_pai ? 'selected' : '').'><strong>----- RAIZ -----</strong></option>';
        $this->montandoMenuSelect .= $this->montaOptionsRecursive($itens, 0, $selected_id_menu_pai);
        $this->montandoMenuSelect .= '</select>';

        return $this->montandoMenuSelect;
    }

    public function montaOptionsRecursive($children, $i_nivel, $selected_id_menu_pai) {

        # CRIAR CONDIÇÃO PARA QUE SE FOR INATIVO MUDE A COR PRA CINZA ...

        foreach ($children as $child) {

            $count_children = sizeof($child['children']);
            $bool_item_raiz = $child->id_menu_pai > 0 ? false : true;

            $selected = $child->id_menu==$selected_id_menu_pai ? 'selected' : '';

            $delimitadorrrr = '';
            if ($i_nivel > 0) {
                for ($i=0; $i < $i_nivel; $i++) { 
                    $delimitadorrrr .= '- ';
                }
            }

            if ($count_children>0 || $bool_item_raiz) {

                $this->montandoMenuSelect .= '<option class="text-success" style="font-weight: bold" value="'.$child->id_menu.'" '.$selected.'>' . $delimitadorrrr;
                $this->montandoMenuSelect .= $child->nome;
                $this->montandoMenuSelect .= '</option>';
                
                if ($count_children>0) {
                         $this->montandoMenuSelect .= $this->montaOptionsRecursive($child['children'], $i_nivel + 1, $selected_id_menu_pai);
                }
            }
            else{

                 $this->montandoMenuSelect .= '<option class="text-primary" value="'.$child->id_menu.'" '.$selected.'>' . $delimitadorrrr;
                 $this->montandoMenuSelect .= $child->nome;
                 $this->montandoMenuSelect .= '</option>';

            }
        }
    }

}
