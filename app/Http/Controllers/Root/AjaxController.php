<?php
namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Log;

class AjaxController extends Controller
{

    // public function menu_updateOrder(Request $request)
    // {
    //     $dados = [];
    //     $pos = 0;

    //     foreach($request->lista as $menu_id){

    //         $dados['ordem'] = $pos;
    //         \App\Models\System\Menus::find($menu_id)->update($dados);
    //         $pos++;
         
    //     }

    //     $response = array(
    //       'status' => 'success',
    //       'lista' => $request->lista,
    //     );

    //     return response()->json($response); 
    // }

    // public function menu_verSubMenus(Request $request)
    // {
    //     $menus = \App\Models\System\Menus::menusSelectID($request->id_menu_pai);
        
    //     $routes_vet = [];
    //     $routes = \App\Models\System\Routes::all()->toArray();
    //     foreach ($routes as $routes_k => $routes_v) {
    //         $routes_vet[$routes_v['id_route']] = $routes_v;
    //     }

    //     $response = array(
    //       'status' => 'success',
    //       'menus' => $menus,
    //       'routes' => $routes_vet,
    //     );

    //     return response()->json($response); 
    // }


}
