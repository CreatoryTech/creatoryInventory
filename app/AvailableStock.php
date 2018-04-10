<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableStock extends Model
{
    //

        protected $fillable = ['availableref','total'];



   public function availableref()
    {
        return $this->morphTo();
    }
}
