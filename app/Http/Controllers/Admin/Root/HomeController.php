<?php

namespace App\Http\Controllers\Admin\Root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Auth;

class HomeController extends Controller
{

    public function index(){

        return view('admin.root.index');
    }

    public function clearCacheRoutes(){

    	Cache::forget('sys_routes');

    	$msg = (Cache::get('sys_routes') === null) ? 'Cache de rotas exluido.' : 'Erro ao exluir Cache.';

    	return redirect()->route('admin.root')->with('msg', $msg);
        //return view('admin.root.index', compact('msg'));
    }

    public function clearCacheAll(){

    	$code = \Illuminate\Support\Facades\Artisan::call('cache:clear');

    	$msg = 'Todos os arquivos de Cache foram Deletados!';

    	return redirect()->route('admin.root')->with('msg', $msg);
        //return view('admin.root.index', compact('msg'));
    }
}
