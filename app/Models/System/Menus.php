<?php
namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{

	protected $table = "sys_menus";
	protected $primaryKey = "id_menu";

    public $timestamps = false;
    
    protected $fillable = [
        'id_menu_pai',
        'nome',
        'id_route',
        'link',
        'icon',
        'ordem',
        'ativo',
    ];

    public function parent() 
    {
        return $this->hasOne(Menus::class, 'id_menu', 'id_menu_pai');
    }

    public function children() 
    {
        return $this->hasMany(Menus::class, 'id_menu_pai', 'id_menu')->where('ativo', '=', 1)->orderBy('ordem', 'ASC');
    }  

    public function childrenAll() 
    {
        return $this->hasMany(Menus::class, 'id_menu_pai', 'id_menu')->orderBy('ordem', 'ASC');
    }  

    public static function tree() 
    {
        return static::
            with(
            implode('.', array_fill(0, 4, 'children'))
            )
            ->where('id_menu_pai', '=', 0)
            ->where('ativo', '=', 1)
            ->orderBy('ordem', 'ASC')
            ->get();
    }

    public static function treeAll() 
    {
        return static::
            with(
            implode('.', array_fill(0, 4, 'childrenAll'))
            )
            ->where('id_menu_pai', '=', 0)
            ->orderBy('ordem', 'ASC')
            ->get();
    }

    public static function menusSelectID($id_menu=0) 
    {
        return static::
            with(
                implode('.', array_fill(0, 4, 'childrenAll'))
                )
            ->where('id_menu_pai', '=', $id_menu)
            ->orderBy('ordem', 'ASC')
            ->get();
    }
}