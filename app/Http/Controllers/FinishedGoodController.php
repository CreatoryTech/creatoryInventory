<?php

namespace App\Http\Controllers;

use App\FinishedGood;
use App\RawMaterial;
use App\ChallanFinished;
use App\Challan;
use App\AvailableStock;
use App\StockManagement;
use Session;



use Illuminate\Http\Request;

class FinishedGoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $finishedgood = FinishedGood::all();
          $rawlists = Challan::distinct("raw_id")->get(['raw_id']);

          //dd($rawlists);

          // foreach ($rawlists as $key => $value) {
          //     # code...
          //      dd($value->raw->name);
          // }
       


          return view('finished.index',[
            'finishedgood' => $finishedgood,
            'rawlists' => $rawlists
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        // Auth::user()->ports->contains('port', $request->port);

       /* $goods = new FinishedGood();

              
                $goods->name = $request->name;

                    $goods->description = $request->description;
                    $goods->save();*/
             $goods = FinishedGood::create($request->all());

             $rawsid = RawMaterial::whereIn('id', array_filter($request->finished_id))->get();



         //dd($rawsid);


    $goods->rawlists()->sync($rawsid);


     $available_stock_find = AvailableStock::firstOrNew(['availableref_id' => $goods->id]);

       $available_stock_find->total = $goods->initial_stock;
      
       $goods->availablestock()->save($available_stock_find);

       

            return redirect()->route('factory.finished.index');


        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FinishedGood  $finishedGood
     * @return \Illuminate\Http\Response
     */
    public function show(FinishedGood $finishedGood)
    {
        //
           return view('finished.edit')->with('finishedgood', $finishedGood);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FinishedGood  $finishedGood
     * @return \Illuminate\Http\Response
     */
    public function edit(FinishedGood $finishedGood)
    {
        //
        //dd($finishedGood->rawlists()->get());
             return view('finished.edit')->with('finishedgood', $finishedGood);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FinishedGood  $finishedGood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinishedGood $finishedGood)
    {
        //

         $task = FinishedGood::findOrFail($finishedGood->id);

       // $this->validate($request, [
       //  'title' => 'required',
       //  'description' => 'required'
       //  ]);

       $input = $request->all();

       $task->fill($input)->save();


/*
        $available_stock_find = AvailableStock::firstOrNew(['availableref_id' => $task->id]);

       $available_stock_find->total = $task->initial_stock;
      
       $task->availablestock()->save($available_stock_find);*/




       Session::flash('flash_message', 'Raw material successfully edited!');

       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FinishedGood  $finishedGood
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinishedGood $finishedGood)
    {
        //
    }


     public function challan()
    {
        //

         return view('finished.challan');
    }

            /**
     * For the  challan form submission.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */



      public function challansave(Request $request)
    {
        //

        


               




        $request->validate([
          /*  'id' => 'required|unique:challan|max:255',*/
          'finished_id' => 'required|exists:finished_goods,id',

           
            'weight' => 'nullable',
            'quantity' => 'required',
            
        ]);



             # code...
            $quantityChecker = AvailableStock::where([
            ["availableref_id", "=", $request->finished_id]

            ])->first();

            if($request->quantity < $quantityChecker->total || $request->quantity == $quantityChecker->total){



         //  $array = ["id" => $request->finished_id, "name" => $request->name];

         // $goods = FinishedGood::create($array);

        $data = array('reference_type' => 'finished' ,'ref_id' => $request->finished_id, 'stock_out' =>$request->quantity, 'mode' => "1");

          $raw = ChallanFinished::create($request->all());

          StockManagement::stockOut($data);

            $products_id = FinishedGood::findOrFail($request->finished_id);

                     $outlet = new StockManagement();
                     $outlet->stock_in = $request->quantity;
                    
                     $outlet->mode = "2" ;

                      $products_id->stockmanangements()->save($outlet);
           

                $available_stock_find = AvailableStock::firstOrNew(['availableref_id' =>  $products_id->id]);

               
                

                /* For Outlet Purpose S */

                 error_log("outlet?");

             $available_stock_find->totalOutlet = ($available_stock_find->totalOutlet + $request ->quantity);




                /* For Outlet Purpose E */



                $products_id->availablestock()->save($available_stock_find);


         }

    if($request->quantity > $quantityChecker->total){
        error_log("nope");
         Session::flash('error_message', 'The quantity you entered exceeded the stock amount22');

    }





      return redirect()->back();
    }


    public function challanList(Request $request)
    {
        //

         $rawChallan = ChallanFinished::all();

    
         return view('finished.challanList' , ['rawChallan'=> $rawChallan]);
    }


    public function challanSearch(Request $request)
    {
        //

         // $rawChallan = Challan::all();

        $start = \Carbon\Carbon::createFromFormat('m/d/Y', $request->startDate)->format('Y-m-d');
        $end = \Carbon\Carbon::createFromFormat('m/d/Y', $request->endDate)->format('Y-m-d');
        //dd($start);

         $rawChallan = ChallanFinished::whereDate('created_at', '>', $start)
         ->whereDate('created_at','<', $end)
         ->get();


     

         //dd($rawChallan);


    
         return view('finished.challanList' , ['rawChallan'=> $rawChallan]);
    }
}
