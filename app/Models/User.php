<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $hidden = [
        'password',
    ];

    protected $table = 'users';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $guarded = [];
}
