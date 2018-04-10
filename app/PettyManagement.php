<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PettyManagement extends Model
{
    //
    protected $fillable = ['petty_type_id', 'amount','reason','name'];

    
}
