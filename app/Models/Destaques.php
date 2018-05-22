<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destaques extends Model
{
    protected $fillable = ['id', 'id_canal', 'titulo', 'texto', 'ativo', 'ordem', 'link', 'tipo', 'imagem', 'video'];
}
