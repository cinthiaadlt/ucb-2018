<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoMulta extends Model
{
    use SoftDeletes;
    // Para decir el nombre de la tabla, si no es el mismo de la clase, se pone:
    protected $table = 'tipo_multas';
    // y el id:
    protected $primaryKey = 'id_tipo_multa';
    protected $dates = ['deleted_at'];
}
