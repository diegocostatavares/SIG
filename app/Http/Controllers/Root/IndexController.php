<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Auth;

class IndexController extends Controller
{

    public function index(){

        return view('app.root.index');
    }

    public function config(){

        return view('app.root.config');
    }

    public function clearCacheRoutes(){

    	Cache::forget('sys_routes');

    	$msg = (Cache::get('sys_routes') === null) ? 'Cache de rotas exluido.' : 'Erro ao exluir Cache.';

    	return redirect()->route('root.config')->with('info', $msg);
    }

    public function clearCacheAll(){

    	\Illuminate\Support\Facades\Artisan::call('cache:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        \Illuminate\Support\Facades\Artisan::call('debugbar:clear');
        \Illuminate\Support\Facades\Artisan::call('route:clear');

    	$msg = 'Cache/View/Debugbar/Route - Deletados!';

    	return redirect()->route('root.config')->with('info', $msg);
    }
}
