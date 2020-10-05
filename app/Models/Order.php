<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey='id';
    public $timestamps = true;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Payment');
    }

    public function price()
    {
        return round($this->duration() * env('HOURLY_RATE'), 2);
    }

    public function duration()
    {
        $startTime = strtotime($this->created_at);
        $endTime = $startTime;
        switch ($this->status) {
            case 'created':
                $endTime = time();
                break;
            case 'paid':
                $endTime = strtotime($this->updated_at);
                break;
            case 'canceled':
                $endTime = $startTime;
                break;
        }

        return round(($endTime - $startTime) / 60 / 60, 2);
    }
}
