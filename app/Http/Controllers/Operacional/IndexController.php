<?php
namespace App\Http\Controllers\Operacional;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MaquinasCartoes;

class IndexController extends Controller
{
    public function index()
    {
        return view('app.operacional.index');
    }

    public function calculadoraMaquinasCartoes()
    {
    	$maquinasCartoes = MaquinasCartoes::with('planos')->where(['ativo'=>'1'])->get();

    	//dd($maquinasCartoes[0]->planos[0]->plano_recebimento);

    	//dd($maquinasCartoes);

        return view('app.operacional.calculadoraMaquinasCartoes', compact('maquinasCartoes'));
    }
}
