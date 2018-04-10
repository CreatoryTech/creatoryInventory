<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PettyType extends Model
{
    //
    protected $fillable = ['name', 'type'];

    public function list()
	{
	    return $this->hasMany('App\PettyManagement');
	}
}
