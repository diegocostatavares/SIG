<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destaques;

class HomeController extends Controller
{
    public function index(){
        $destaque_principal_full = Destaques::where(['ativo'=>'s', 'tipo'=>'PF'])->get()->first();
        $destaque_principal_single = Destaques::where(['ativo'=>'s', 'tipo'=>'PS'])->get();
        $destaque_secundario = Destaques::where(['ativo'=>'s', 'tipo'=>'S'])->get();
        return view('site.index', compact('destaque_principal_full','destaque_principal_single','destaque_secundario'));
    }
}
