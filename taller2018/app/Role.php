<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'roles';
  protected $primaryKey = 'id_roles';
  protected $fillable = ['nombre_rol', 'descripcion_rol'];
}
