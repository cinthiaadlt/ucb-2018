<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Vehiculo extends Model
{
    protected $primaryKey = 'id_vehiculos';
    Protected $fillable=['id_modelo', 'id_usuario','color','placa','cat_tipo_vehiculo'];

}

