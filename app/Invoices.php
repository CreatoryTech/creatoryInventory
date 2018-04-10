<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    //
    protected $fillable = ['clients_id','total','payment_type','payment_due'];



    public function rawlists()
    {
        return $this->belongsToMany('App\FinishedGood','finished_good_invoice'); // 
    }

     public function paymentList()
    {
        return $this->hasMany('finished_good_invoice'); // 
    }


}
