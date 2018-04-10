<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallanFinished extends Model
{
    //
     protected $fillable = ['id','name','finished_id','weight','quantity','transport_type','transport_num_plate'];
     protected $dates = ['created_at'];
}
