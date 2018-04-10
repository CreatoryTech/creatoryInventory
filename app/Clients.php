<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    //

    protected $fillable = ['id','firstName','lastName','phoneNumber','email','address','companyName','companyAddress'];

   public function invoices()
    {
        return $this->hasMany('App\Invoices');
    }

     public function payment()
    {
        return $this->hasOne('App\ClientsPayment');
    }
}
