<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaquinasCartoesPlanos extends Model
{
    
    protected $table = "tbl_maquinas_cartoes_planos";
    protected $primaryKey = "id_maquina_cartao_plano";


    public function maquinaCartao()
    {
        return $this->belongsTo(MaquinasCartoes::class, 'id_maquina_cartao'); 
    }

}
