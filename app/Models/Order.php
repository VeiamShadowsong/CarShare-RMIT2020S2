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
}
