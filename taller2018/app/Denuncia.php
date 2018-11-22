<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $primaryKey = 'id_denuncias';

    Protected $fillable=['id_parqueos',
        'id',
        'descripcion_adicional',
        'cat_nivel_gravedad',
        'estado_denuncia',
        'num_strikes',
        'cat_tipo_denuncia'
    ];


    //Query Scope

    /*public function scopeEstado($query, $estado_denuncia)
    {
        if($estado_denuncia)
        {
            return $query->where('estado_denuncia','LIKE',"%$estado_denuncia%");
        }
    }*/


}
