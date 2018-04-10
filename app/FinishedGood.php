<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinishedGood extends Model
{
    //
     public $incrementing = false;

    public $timestamps = false;
    protected $fillable = ['id','name','description','initial_stock'];


    public function stockmanangements()
    {
        return $this->morphMany('App\StockManagement', 'ref');
    }

     public function availablestock()
    {
        return $this->morphMany('App\AvailableStock', 'availableref');
    }

        public function rawlists()
    {
        return $this->belongsToMany('App\RawMaterial','finished_good_raw_material');
    }


   
}
