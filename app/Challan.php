<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Challan extends Model
{
    //

     protected $fillable = ['id','name','raw_id','weight','quantity','transport_type','transport_num_plate'];

     protected $dates = ['created_at'];


}
