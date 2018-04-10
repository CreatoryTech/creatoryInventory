<?php

namespace App\Http\Controllers;

use App\StockManagement;
use App\AvailableStock;
use App\RawMaterial;
use App\FinishedGood;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;//find or fail error exception class.


class StockManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         // return view('stock.create');
       $rawavailable = AvailableStock::all();


//   foreach ($rawavailable as $stock){

//   error_log($stock->availableref->id);
  
//    error_log($stock->availableref->name);

  
//    error_log($stock->total);
// }
 

    


    
  



       
      return view('stock.index')->with('rawavailable', $rawavailable);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $list = RawMaterial::find(123);

        $c = new StockManagement();

        $c->stock_in = 20;

        $list->stockmanangements()->save($c);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $stock = new StockManagement();
        $available_stock = new AvailableStock();


        $data =$request->all();
        //dd($data['ref_id']);



        if($data['reference_type'] =='raw')
        {


            try
              {

                
                $raw = RawMaterial::findOrFail($data['ref_id']);
                // $raw = RawMaterial::where('id',$data['ref_id'])->get();
                //dd($raw);
                $stock->stock_in = $data['stock_in'];
                $stock->stock_out = $data['stock_out'];
                $stock->mode = $data['mode'];
                $raw->stockmanangements()->save($stock);
                

                $available_stock_find = AvailableStock::firstOrNew(['availableref_id' => $data['ref_id']]);

                $available_stock_find->total = ($available_stock_find->total + $data['stock_in']);
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
                $stock->stock_in = $data['stock_in'];
                $stock->stock_out = $data['stock_out'];
                $stock->mode = $data['mode'];
                $raw->stockmanangements()->save($stock);
                if ($data['stock_out'] != ""){

                     $outlet = new StockManagement();
                     $outlet->stock_in = $data['stock_out'];
                    
                     $outlet->mode = "2" ;

                     $raw->stockmanangements()->save($outlet);
                }



                $available_stock_find = AvailableStock::firstOrNew(['availableref_id' => $data['ref_id']]);

                $available_stock_find->total = ($available_stock_find->total + $data['stock_in']);
                $available_stock_find->total = ($available_stock_find->total - $data['stock_out']);


                /* For Outlet Purpose S */

                 $available_stock_find->totalOutlet = ($available_stock_find->totalOutlet + $data['stock_out']);



                /* For Outlet Purpose E */



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





       return redirect()->route('factory.stock.index');

        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockManagement  $stockManagement
     * @return \Illuminate\Http\Response
     */
    public function show(StockManagement $stockManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockManagement  $stockManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(StockManagement $stockManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockManagement  $stockManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockManagement $stockManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockManagement  $stockManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockManagement $stockManagement)
    {
        //
    }
}
