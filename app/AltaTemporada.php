<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AltaTemporada extends Model
{
    protected  $table = "alta_temporada";
    protected  $fillable = ['id','nome','dt_inicio','dt_fim'];
    public $timestamps = false;
}
