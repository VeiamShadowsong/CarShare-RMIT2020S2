<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table = 'licenses';
    protected $primaryKey='id';
    public $timestamps = true;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
