<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depoimentos extends Model
{
    protected $fillable = ['id', 'nome', 'texto', 'email', 'created_at', 'updated_at', 'ativo'];
}
