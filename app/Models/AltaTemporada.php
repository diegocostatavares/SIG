<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AltaTemporada extends Model
{
    protected  $table = "tbl_alta_temporada";
    protected  $fillable = ['id','nome','dt_inicio','dt_fim'];
    public $timestamps = false;
}
