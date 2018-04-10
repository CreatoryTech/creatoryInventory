<?php

namespace App\Http\Controllers;

use App\Invoices;
use App\StockManagement;
use App\FinishedGood;
use App\ClientsPayment;
use App\PettyType;
use App\PettyManagement;
use App\AvailableStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('invoices.create');


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
        //dd($request->all());
        $validatedData = $request->validate([
         
            'clients_id' => 'required|exists:clients,id'
            
            ]);

//pseudocode
        
        $invoices = Invoices::create($request->all());
        $products_id = FinishedGood::whereIn('id', array_filter($request->product_id))->get();
           $petty = ["petty_type_id"=>5, "amount" => $request->total];


             $this->pettyManagement($petty);


        $array =array();


        foreach ( $products_id as $key => $value) {
             # code...

          try
          {
             $array1 = array('price' => $request->price[$key],'quantity' => $request ->quantity[$key] );
             $invoices->rawlists()->attach($value, $array1);

             array_push($array,$array1);
             
             $stock = new StockManagement();
             $raw = FinishedGood::findorfail($value->id);
                //dd($raw);
             
             $stock->stock_out = $request->quantity[$key];
             
             $stock->mode = "2";
             
             $raw->stockmanangements()->save($stock);
             



             $available_stock_find = AvailableStock::firstOrNew(['availableref_id' => $request->product_id]);

               //dd( $available_stock_find);
             

             /* For Outlet Purpose S */

             

             $available_stock_find->totalOutlet = (int)($available_stock_find->totalOutlet) - (int)($request ->quantity);




             /* For Outlet Purpose E */



             $raw->availablestock()->save($available_stock_find);
                // $available_stock_find->save();

             $clientpayment = ClientsPayment::firstOrNew([

                'clients_id' => $request->clients_id,
                

                ]);

             $clientpayment->total_paid = ($clientpayment->total_paid + $request->total);
             $clientpayment->total_due = ($clientpayment->total_due + $request->payment_due);
             $clientpayment->save();

             $raw->availablestock()->save($available_stock_find);






         }
         catch(ModelNotFoundException $err)
         {

                //if id doesnt exist it will skip return view('profil..
                //and excute whatever in this section
            error_log('Does not Exist');
                //error_log($err);
            
        }
    }

    

    

    

    

    

    return redirect()->back();
    
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices $invoices)
    {
        //
    }

    public function petty(){
        //$petty = PettyManagement::all();
        //dd($petty);

        
         $invoices = Invoices::all();
       return view('invoices.petty',['invoices' => $invoices]); 
    }
    private function pettymanagement($array){

     $type = PettyManagement::create($array);


    }
}
