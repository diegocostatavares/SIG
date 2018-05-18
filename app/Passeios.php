<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passeios extends Model
{
    protected $fillable = ['id', 'id_categoria', 'nome', 'texto', 'created_at', 'updated_at', 'valor_adulto_alta', 'valor_adulto_baixa', 'valor_chd_alta', 'valor_chd_baixa', 'ativo', 'imagem'];
}
