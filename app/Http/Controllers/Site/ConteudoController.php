<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Canais;

class ConteudoController extends Controller {

    public function pousada() {
        $linhas = Canais::find(14);
        return view('site.canais.canais', compact('linhas'));
    }

    public function tarifarios() {
        $linhas = Canais::find(15);
        return view('site.canais.canais', compact('linhas'));
    }

}
