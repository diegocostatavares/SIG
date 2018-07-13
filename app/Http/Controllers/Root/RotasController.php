<?php

namespace App\Http\Controllers\Root;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Session;

class RotasController extends Controller
{

    public function index(){

        return view('app.root.index');
    }

    public function cadastrar() 
    {
        //
    }

    public function editar($id) 
    {
        //
    }

    public function excluir($id) 
    {
        //
    }

    public function salvar(Request $req) 
    {
        //
    }
}
