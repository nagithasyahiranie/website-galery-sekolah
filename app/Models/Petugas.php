<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use HasApiTokens;
    
    protected $table = 'petugas';
    
    protected $fillable = [
        'username',
        'password'
    ];

    protected $hidden = [
        'password'
    ];
}
