<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canais extends Model
{
    const CREATED_AT = 'dthr_criacao';
    const UPDATED_AT = 'dthr_update';
    
    protected $fillable = [
        'id', 'id_pai', 'nome', 'texto', 'dthr_criacao', 'dthr_update', 'id_include', 'mostra_menu', 'ordem', 'ativo'
    ];
}
