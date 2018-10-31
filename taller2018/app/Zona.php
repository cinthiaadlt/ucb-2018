<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $primaryKey = 'id_zonas';
    Protected $fillable=['zona',
                         'calle',
                         'ciudad'
    ];
}
