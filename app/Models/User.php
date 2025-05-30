<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Obtener la clave primaria del usuario.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Obtener los claims personalizados.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
