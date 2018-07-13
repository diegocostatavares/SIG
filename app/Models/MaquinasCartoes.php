<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaquinasCartoes extends Model
{
    
    protected $table = "tbl_maquinas_cartoes";
    protected $primaryKey = "id_maquina_cartao";

    public function planos()
    {
    	return $this->hasMany(MaquinasCartoesPlanos::class, 'id_maquina_cartao');
    }

}
