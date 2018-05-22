<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasseiosCategorias extends Model
{
    protected $table = "passeios_categorias";
    protected $fillable = ['id', 'nome', 'ativo'];
    public $timestamps = false;
}
