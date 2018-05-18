<?php

namespace App\Http\Controllers\Admin\Conteudo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Canais;

class CanaisController extends Controller {

    public function index() {

        $linhas = canais::all();
        //dd($retorno);
        return view('admin.conteudo.canais', compact('linhas'));
    }

    public function cadastrar() {
        $canal_pai = Canais::all();
        return view('admin.conteudo.canais_cadastrar', compact('canal_pai'));
    }

    public function editar($id) {
        $registro = Canais::find($id); // retorna id selecionado
        $canal_pai = Canais::all();

        //dd($canal_pai);
        return view('admin.conteudo.canais_editar', compact('registro', 'canal_pai'));
    }

    public function excluir($id) {
        Canais::find($id)->delete();
        return redirect()->route('admin.conteudo.canais');
    }

    public function salvar(Request $req) {
        $dados = $req->all();

        if (isset($dados['ativo'])) {
            $dados['ativo'] = 's';
        } else {
            $dados['ativo'] = 'n';
        }

        if (empty($dados['id'])) {
            Canais::create($dados);
        } else {
            Canais::find($dados['id'])->update($dados);
        }


        return redirect()->route('admin.conteudo.canais');
    }

}
