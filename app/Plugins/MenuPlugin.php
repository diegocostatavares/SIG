<?php
namespace App\Plugins;

use App\Models\System\Menus;
use App\Models\System\Routes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class MenuPlugin {

    protected static $_montandoMenu;
    protected static $_routes;

    static function menu() {

        self::$_montandoMenu = '';
        self::$_routes = [];

        $routes = Routes::all()->toArray();
        foreach ($routes as $routes_k => $routes_v) {
            self::$_routes[$routes_v['id_route']] = $routes_v;
        }

        $itens = Menus::tree();
        // $itens = Cache::remember('sys_menu', 1, function () {
        //     return Menus::tree();
        // });

        self::$_montandoMenu .= '<ul>';
        self::$_montandoMenu .= '<li class="text-muted menu-title">Navegação</li>';
        self::$_montandoMenu .= self::menuRecursivo($itens);
        self::$_montandoMenu .= '</ul>';

        return self::$_montandoMenu;
    }
   
    private static function menuRecursivo($children) {

        foreach ($children as $child) {

            $count_children = sizeof($child['children']);
            $bool_item_raiz = $child->id_menu_pai > 0 ? false : true;
            $class_icon = trim($child->icon) <> '' ? $child->icon : 'zmdi zmdi-collection-item';

            $route_name = $child->id_route>0 ? self::$_routes[$child->id_route]['name'] : false;

            $link = trim($child->link) == '' || trim($child->link) == '#' ? 'javascript:void(0);' : $child->link;
            $link = $route_name && trim($child->link) != '#' ? self::$_routes[$child->id_route]['link'] : $link;

            if ($child->id_route>0) {

                if (!Gate::allows('auth_permission', $route_name)) {
                    continue;
                }
            }

            if ($count_children>0 || $bool_item_raiz) {

                 self::$_montandoMenu .= '<li class="has_sub">';

                    if ($bool_item_raiz) {

                         self::$_montandoMenu .= '<a href="' . $link . '" class="waves-effect"><span class="label label-success label-pill float-right"></span><i class="' . $class_icon . '"></i><span> ' . $child->nome . ' </span></a>';
                    }
                    else{

                         self::$_montandoMenu .= '<a href="' . $link . '" class="waves-effect"><span>' . $child->nome . '</span>  <span class="menu-arrow"></span>    </a>';
                    }
                    
                    if ($count_children>0) {
                         self::$_montandoMenu .= '<ul class="list-unstyled">';
                             self::$_montandoMenu .= self::menuRecursivo($child['children']);
                         self::$_montandoMenu .= '</ul>';
                    }
                 self::$_montandoMenu .= '</li>';
            }
            else{

                 self::$_montandoMenu .= '<li><a href="' . $link . '">'. $child->nome .'</a></li>';
            }
        }
    }
}
