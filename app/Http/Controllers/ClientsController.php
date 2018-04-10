<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;

class ClientsController extends Controller
{
    public function index()
    {
        //
          $Clients = Clients::with("invoices")->get();
          //dd($Clients);
          

          return view('clients.index',[
            'clients' => $Clients,
          
            ]);

    }

     public function create()
    {
        //
          

          return view('clients.create',[
          
          
            ]);

    }

         public function store( Request $request )
    {
        //
          

           $goods = Clients::create($request->all());
            return redirect()->back();

    }

    public function clientSearch(Request $request)
    {
      error_log("Client");
      //dd($request->all());

      $query = $request->querySearch;
     // dd($query);



      $clients = Clients::where("firstName", "LIKE", '%'.$query.'%')->get();

      //dd($clients);

      return view('clients.index',[
        'clients' => $clients,

        ]);


      // return view('finished.challanList' , ['rawChallan'=> $rawChallan]);
    }
}
