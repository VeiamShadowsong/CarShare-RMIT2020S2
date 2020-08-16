<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $hidden = [
        'password'
    ];

    protected $table = 'admins';

    protected $primaryKey = 'id';

    public $timestamps = true;
}
