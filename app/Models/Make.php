<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    protected $table = 'makes';
    protected $primaryKey='id';
    public $timestamps = true;
    protected $guarded=[];

    public function cars()
    {
        return $this->hasMany('App\Models\Car');
    }
}
