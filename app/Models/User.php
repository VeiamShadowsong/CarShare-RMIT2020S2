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

    public function cars()
    {
        return $this->hasMany('App\Models\Car');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function license()
    {
        return $this->hasOne('App\Models\License')->orderBy('expired_at', 'DESC')->first();
    }

    public function checkLicenseValidate()
    {
        $license = $this->license();
        if(!$license) {
            return false;
        }

        if(strtotime($license->expired_at) < time()) {
            return false;
        }
        return true;
    }
}
