<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartamentos extends Model
{
    //
    protected $table = "roteiros_apartamentos";
    protected $fillable = ['id','nome','valor_alta','valor_baixa','texto'];
    public $timestamps = false;
}
