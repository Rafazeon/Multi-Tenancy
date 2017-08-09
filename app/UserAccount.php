<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// Model de Usuários Admin do Sistema

class UserAccount extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function rolesUpdate($id)
    {
        return array(
            'username'              => 'required|alpha_dash|unique:users,username,' . $id,
            'email'                 => 'required|email|unique:users,email,'. $id,
            'password'              => 'between:4,11',
        );
    }
}
