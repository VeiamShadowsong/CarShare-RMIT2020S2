<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $primaryKey='id';
    public $timestamps = true;
    protected $guarded=[];

    public function make()
    {
        return $this->belongsTo('App\Models\Make');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
