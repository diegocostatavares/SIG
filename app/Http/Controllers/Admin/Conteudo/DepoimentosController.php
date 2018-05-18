<?php

namespace App\Http\Controllers\Admin\Conteudo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Depoimentos;

class DepoimentosController extends Controller
{
    public function index() {

        $linhas = \App\Depoimentos::all();
        //dd($retorno);
        return view('admin.conteudo.depoimentos', compact('linhas'));
    }

    public function cadastrar() {
        return view('admin.conteudo.depoimentos_cadastrar');
    }

    public function editar($id) {
        $registro = Depoimentos::find($id); // retorna id selecionado

        //dd($canal_pai);
        return view('admin.conteudo.depoimentos_editar', compact('registro'));
    }

    public function excluir($id) {
        Depoimentos::find($id)->delete();
        return redirect()->route('admin.conteudo.depoimentos');
    }

    public function salvar(Request $req) {
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
}
