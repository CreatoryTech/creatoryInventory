<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
     /**
     * Get all of the raw material's ref.
     */
    public $incrementing = false;

    protected $fillable = ['id','name','description','supplier_id','initial_stock'];


   public function stockmanangements()
    {
        return $this->morphMany('App\StockManagement', 'ref');
    }


     public function availablestock()
    {
        return $this->morphMany('App\AvailableStock', 'availableref');
    }

}
