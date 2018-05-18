<?php

namespace App\Http\Controllers\Admin\Conteudo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Destaques;
use App\Canais;

class DestaquesController extends Controller {

    public function index() {

        $linhas = Destaques::all();
        //dd($retorno);
        return view('admin.conteudo.destaques', compact('linhas'));
    }

    public function cadastrar() {
        $id_canal = Canais::all();
        return view('admin.conteudo.destaques_cadastrar', compact('id_canal'));
    }

    public function editar($id) {
        $registro = Destaques::find($id); // retorna id selecionado
        $id_canal = Canais::all();

        //dd($canal_pai);
        return view('admin.conteudo.destaques_editar', compact('registro', 'id_canal'));
    }

    public function excluir($id) {
        Destaques::find($id)->delete();
        return redirect()->route('admin.conteudo.destaques');
    }

    public function salvar(Request $req) {
        $dados = $req->all();

        if (isset($dados['ativo'])) {
            $dados['ativo'] = 's';
        } else {
            $dados['ativo'] = 'n';
        }

        if ($req->hasFile('imagem')) {
            $imagem = $req->file('imagem');
            $num = rand(1111, 9999);
            $dir = "imagens/destaques";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir . "/" . $nomeImagem;
        }

        if (empty($dados['id'])) {
            Destaques::create($dados);
        } else {
            Destaques::find($dados['id'])->update($dados);
        }


        return redirect()->route('admin.conteudo.destaques');
    }

}
