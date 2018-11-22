<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersRole extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users_role';  
    protected $fillable = [
        'id_user', 'id_role'
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
      return $this->role_id;
    }

    private function hasRoles () {
      return $this->roles;
    }

    public function hasRole ($role) {
      $roles = $this->hasRoles ();
      foreach ($roles as $possibilities) {
        if ($role == $possibilities->nombre_role) {
          return true;
        }
      }
      return false;
    }

    public function myActualRole () {
      return session ()->get ('role');
    }

    public function setMyRoleToAdmin () {
      session()->put('role', '1');
    }

    public function setMyRoleToUser () {
      session()->put('role', '2');
    }

    public function setMyRoleToOwner () {
      session()->put('role', '3');
    }

    public function roles () {
      return $this->belongsToMany('App\Role', 'users_role', 'id_user', 'id_role');
    }
}
