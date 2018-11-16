<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sur_name','last_name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role () {
      return $this->belongsTo ('App\Role');
    }

    public function getRole () {
      // return $this->role->id_roles;
      // if ($this->role->id_roles == 2) {
        // return true;
      // }
        // return false;
      // if ($this->role_id == 2) {
      //   return true;
      // }
      return $this->role_id;
    }

    public function isAdmin () {
      if ($this->role_id == 1) {
        return true;
      } else {
        return false;
      }
    }

    public function isOwner () {
      if ($this->role_id == 3) {
        return true;
      } else {
        return false;
      }
    }

    public function isUser () {
      if ($this->role_id == 2) {
        return true;
      } else {
        return false;
      }
    }
/*
    public function isUserInRole($role) {
      // IR a la BBDD para buscar los roles del usuarii
      // Si tiene el rol retorno true
      if ($this->role_id == 2) {
        return true;
      } else {
        return false;
      }
    }
*/
}
