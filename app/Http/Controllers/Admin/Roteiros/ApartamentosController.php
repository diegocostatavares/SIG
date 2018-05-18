<?php

namespace App\Http\Controllers\Admin\Roteiros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Apartamentos;

class ApartamentosController extends Controller
{
     public function index() {

        $linhas = Apartamentos::all();
        //dd($retorno);
        return view('admin.roteiros.apartamentos.listar', compact('linhas'));
    }

    public function cadastrar() {
        $id_canal = Apartamentos::all();
        return view('admin.roteiros.apartamentos.cadastrar', compact('id_canal'));
    }

    public function editar($id) {
        $registro = Apartamentos::find($id); // retorna id selecionado

        //dd($canal_pai);
        return view('admin.roteiros.apartamentos.editar', compact('registro', 'id_canal'));
    }

    public function excluir($id) {
        Apartamentos::find($id)->delete();
        return redirect()->route('admin.roteiros.apartamentos.listar');
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
            Apartamentos::create($dados);
        } else {
            Apartamentos::find($dados['id'])->update($dados);
        }


        return redirect()->route('admin.roteiros.apartamentos.listar');
    }
}
