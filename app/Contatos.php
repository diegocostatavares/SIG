<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    //
    const CREATED_AT = 'dthr_envio';
    const UPDATED_AT = 'dthr_leitura';
    
    protected $fillable = [
        'id', 'nome', 'cidade', 'email', 'telefone', 'mensagem', 'dthr_envio', 'dthr_leitura', 'lida'
    ];
}
