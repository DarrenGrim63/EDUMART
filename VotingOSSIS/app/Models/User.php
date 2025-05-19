<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'identifier',
        'password',
        'is_guru',
        'has_voted'
    ];

    protected $hidden = [
        'password',
    ];
}
