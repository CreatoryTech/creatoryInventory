<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsPayment extends Model
{
    //

     protected $fillable = ['clients_id','total_paid', 'total_due'];
}
