<?php

namespace App\Http\Controllers\admin\roteiros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AltaTemporada;

class AltaTemporadaController extends Controller
{
     public function index() {

        $linhas = AltaTemporada::all();
        //dd($retorno);
        return view('admin.roteiros.altatemporada.listar', compact('linhas'));
    }

    public function cadastrar() {
        $id_canal = AltaTemporada::all();
        return view('admin.roteiros.altatemporada.cadastrar', compact('id_canal'));
    }

    public function editar($id) {
        $registro = AltaTemporada::find($id); // retorna id selecionado

        //dd($canal_pai);
        return view('admin.roteiros.altatemporada.editar', compact('registro', 'id_canal'));
    }

    public function excluir($id) {
        AltaTemporada::find($id)->delete();
        return redirect()->route('admin.roteiros.altatemporada.listar');
    }

    public function salvar(Request $req) {
        $dados = $req->all();

        dd($dados);

        if (empty($dados['id'])) {
            AltaTemporada::create($dados);
        } else {
            AltaTemporada::find($dados['id'])->update($dados);
        }


        return redirect()->route('admin.roteiros.altatemporada.listar');
    }
}
