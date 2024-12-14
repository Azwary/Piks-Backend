<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Definisi role
    const ROLE_PENGELOLA = 1;
    const ROLE_PEMERINTAH = 2;

    /**
     * Cek apakah pengguna adalah Pengelola.
     */
    public function isPengelola()
    {
        return $this->role == self::ROLE_PENGELOLA;
    }

    /**
     * Cek apakah pengguna adalah Pemerintah.
     */
    public function isPemerintah()
    {
        return $this->role == self::ROLE_PEMERINTAH;
    }
}
