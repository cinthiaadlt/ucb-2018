<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParqueoFavoritos extends Model
{
    protected $primaryKey = 'id_parqueos_favoritos';

    protected $fillable=[
        'id_parqueos',
        'id_user',
        'favorito'
    ];
}
