<?php

namespace App\Http\Controllers\site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contatos;
use Illuminate\Support\Facades\Mail;


class ContatosController extends Controller
{
      public function index() {

        return view('site.canais.contato');
    }
    
    public function envia(Request $req) {
        $dados = $req->all();
        
        //Contatos::create($dados);
        
        Mail::send('site.canais.contatoMail', $dados, function($message){

            $message->to('clayton.guerini@gmail.com');
            $message->subject('Contato Hotel Caranda Eco Ville');
            
        });
         

        //return redirect()->route('site.canais.resposta');
        return view('site.canais.resposta');
    }
}
