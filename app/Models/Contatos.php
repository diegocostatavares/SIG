<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    //
    const CREATED_AT = 'dthr_envio';
    const UPDATED_AT = 'dthr_leitura';
    
    protected $table = "tbl_contatos";

    protected $fillable = [
        'id', 'nome', 'cidade', 'email', 'telefone', 'mensagem', 'dthr_envio', 'dthr_leitura', 'lida'
    ];
}
