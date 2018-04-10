<?php

namespace App\Http\Controllers;

use App\RawMaterial;
use App\AvailableStock;
use App\StockManagement;
use App\Challan;
use Illuminate\Http\Request;
use Session;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return the view 'index'
        $raws =RawMaterial::all();

        //dd($raws);
          return view('raw.index',['raws'=> $raws]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $raws =RawMaterial::all();


         return view('raw.index',['raws'=> $raws]);

       
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

         //dd( $request->all());

         $data = $request->all();

    $validatedData = $request->validate([
        'id' => 'required',
        'name' => 'required',
        'description' => 'max:255',
        'supplier_id' => 'required|exists:suppliers,id',
        'initial_stock' => 'required|integer',
    ]);









        /* $message = new RawMaterial();

        //   $this->validate($request, [
        //     'name' => 'required|string',
        //     'comapny' => 'required|string',
        // ]);
         


        $message->fill($data);
        $message->save();*/
          $raw = RawMaterial::create($request->all());
        Session::flash('flash_message', 'Raw material successfully added!');
          /*$user = RawMaterial::create($request->all());*/



         /*Adding initial stock to Stock table*/
       
       $available_stock_find = AvailableStock::firstOrNew(['availableref_id' => $raw->id]);

       $available_stock_find->total = $raw->initial_stock;
      
       $raw->availablestock()->save($available_stock_find);

         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(RawMaterial $rawMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(RawMaterial $rawMaterial)
    {
        //
        //dd($rawMaterial);
     error_log("aaaaaaaaaaaaaaaaaaaaaaaaaaa");


      error_log($rawMaterial->name);


         return view('raw.edit',['rawMaterial'=> $rawMaterial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawMaterial $rawMaterial)
    {
        //

       $task = RawMaterial::findOrFail($rawMaterial->id);

       // $this->validate($request, [
       //  'title' => 'required',
       //  'description' => 'required'
       //  ]);

       $input = $request->all();

       $task->fill($input)->save();

       Session::flash('flash_message', 'Raw material successfully edited!');

       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawMaterial $rawMaterial)
    {
        //
    }


            /**
     * For the  resource for challan.
     *
     * @param  \App\RawMaterial  $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function challan()
    {
        //

         return view('raw.challan');
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
            'raw_id' => 'required|exists:raw_materials,id',
            'weight' => 'nullable',
            'quantity' => 'required',
            
        ]);







        $data = array('reference_type' => 'raw' ,'ref_id' => $request->raw_id, 'stock_out' =>$request->quantity);

          $raw = Challan::create($request->all());

          StockManagement::stockOut($data);






         return view('raw.challan');
    }





public function challanList(Request $request)
    {
        //

         $rawChallan = Challan::all();

    
         return view('raw.challanList' , ['rawChallan'=> $rawChallan]);
    }


    public function challanSearch(Request $request)
    {
        //
         //error_log("From challanSearch");
         //dd($request->all());

        //

         // $rawChallan = Challan::all();

        $start = \Carbon\Carbon::createFromFormat('m/d/Y', $request->startDate)->format('Y-m-d');
        $end = \Carbon\Carbon::createFromFormat('m/d/Y', $request->endDate)->format('Y-m-d');
        //dd($start);

         $rawChallan = Challan::whereDate('created_at', '>', $start)
         ->whereDate('created_at','<', $end)
         ->get();



    
         return view('raw.challanList' , ['rawChallan'=> $rawChallan]);
    }
}
