<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $table = 'parkings';
    protected $primaryKey='id';
    public $timestamps = true;
    protected $guarded=[];
}
