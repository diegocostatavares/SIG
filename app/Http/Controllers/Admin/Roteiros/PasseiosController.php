<?php

namespace App\Http\Controllers\Admin\Roteiros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Passeios;
use App\PasseiosCategorias;

class PasseiosController extends Controller
{
    public function index() {

        $linhas = Passeios::all();
        //dd($retorno);
        return view('admin.roteiros.passeios.listar', compact('linhas'));
    }

    public function cadastrar() {
        $categorias = PasseiosCategorias::all();
        return view('admin.roteiros.passeios.cadastrar', compact('categorias'));
    }

    public function editar($id) {
        $registro = Passeios::find($id); // retorna id selecionado
        $categorias = PasseiosCategorias::all();
        //dd($canal_pai);
        return view('admin.roteiros.passeios.editar', compact('registro', 'categorias'));
    }

    public function excluir($id) {
        Passeios::find($id)->delete();
        return redirect()->route('admin.roteiros.passeios.listar');
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
            $dir = "imagens/passeios";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_" . $num . "." . $ex;
            $imagem->move($dir, $nomeImagem);
            $dados['imagem'] = $dir . "/" . $nomeImagem;
        }

        if (empty($dados['id'])) {
            Passeios::create($dados);
        } else {
            Passeios::find($dados['id'])->update($dados);
        }


        return redirect()->route('admin.roteiros.passeios.listar');
    }
}
