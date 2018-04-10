<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AvailableStock;
use App\RawMaterial;
use App\FinishedGood;

class StockManagement extends Model
{
     /**
     * Get all of the owning stock management models.
     */
     public function ref()
     {
     	return $this->morphTo();
     }

     public static function stockOut($data) {

     	/* $array = Insert data array */

     	$stock = new StockManagement();
     	$available_stock = new AvailableStock();


     	if($data['reference_type'] =='raw')
     	{


     		try
     		{

     			
     			$raw = RawMaterial::findOrFail($data['ref_id']);
                // $raw = RawMaterial::where('id',$data['ref_id'])->get();
                //dd($raw);
     			
     			$stock->stock_out = $data['stock_out'];
                $stock->mode = $data['mode'];

     			$raw->stockmanangements()->save($stock);
     			

     			$available_stock_find = AvailableStock::firstOrNew(['availableref_id' => $data['ref_id']]);

     			
     			$available_stock_find->total = ($available_stock_find->total - $data['stock_out']);
     			$raw->availablestock()->save($available_stock_find);
                // $available_stock_find->save();





     		}
     		catch(ModelNotFoundException $err)
     		{

                //if id doesnt exist it will skip return view('profil..
                //and excute whatever in this section
     			error_log('Does not Exist');
                //error_log($err);
     			
     		}

     		


     	}

     	if($data['reference_type'] =='finished')
     	{


     		try
     		{
     			$raw = FinishedGood::findorfail($data['ref_id']);
     			
     			$stock->stock_out = $data['stock_out'];
                $stock->mode = $data['mode'];
     			$raw->stockmanangements()->save($stock);

     			$available_stock_find = AvailableStock::firstOrNew(['availableref_id' => $data['ref_id']]);

     			
     			$available_stock_find->total = ($available_stock_find->total - $data['stock_out']);
     			$raw->availablestock()->save($available_stock_find);
                // $available_stock_find->save();








     		}
     		catch(ModelNotFoundException $err)
     		{

                //if id doesnt exist it will skip return view('profil..
                //and excute whatever in this section
     			error_log('Does not Exist');
                //error_log($err);
     			
     		}

     		

     	}
     }
 }
