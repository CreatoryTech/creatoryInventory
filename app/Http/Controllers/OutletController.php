<?php

namespace App\Http\Controllers;
use App\FinishedGood;
use App\Invoices;
use App\AvailableStock;
use App\Clients;
use App\PettyManagement;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class OutletController extends Controller
{
    //

    public function index(){

    	$clients = Clients::count();
    	$outletStock = AvailableStock::whereNotNull("totalOutlet")->get(); 
        $petty = PettyManagement::all();
        $invoices = Invoices::all();

       $pettyTime = $ldate = date('Y-m-d 12:00:00');
       $openingBalance = $petty->where("created_at",">",$pettyTime)->sum("amount");
       $closingBalance = $petty->where("created_at","<",$pettyTime)->sum("amount");

       //error_log($openingBalance);
       //error_log($closingBalance);


    	//dd($outletStock);


    	return view('outlet.index')->with(['outletStock'=> $outletStock , 'clients' => $clients ,'openingBalance' => $openingBalance, 'closingBalance' => $closingBalance,'invoices' =>$invoices]);


    }

    public function projectChartData(Request $request){
       //error_log("Reporting");


    	// $data =Invoices::all();

    	// return $data;

    	  // $data = DB::table('invoices')
       //      ->select(DB::raw('MONTHNAME(created_at) as month'), DB::raw("DATE_FORMAT(created_at,'%Y-%m') as monthNum"), DB::raw('count("*") as projects '))
       //      ->groupBy('monthNum')
       //      ->get();
         // $users = DB::table('invoices')
         //             ->select(DB::raw('sum(total) as user_count'))->get();
                     // ->where('created_at', '<>', 1)
                     
                     
    //dd($users);

    	$mode = $request->mode;

    	if($mode == "date"){
           $data = DB::table('invoices')
                     ->select(DB::raw('sum(total) as total'),DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y') as date"))
                     // ->where('created_at', '<>', 1)
                     ->groupBy('date')
                     ->get();
    	}

    	if($mode == "year"){
           $data = DB::table('invoices')
                     ->select(DB::raw('sum(total) as total'),DB::raw("DATE_FORMAT(created_at,'%Y') as date"))
                     // ->where('created_at', '<>', 1)
                     ->groupBy('date')
                     ->get();

    	}

    	// if($mode == "year"){
     //       $data = DB::table('invoices')
     //                 ->select(DB::raw('sum(total) as total'),DB::raw("DATE_FORMAT(created_at,'%Y') as date"))
     //                 // ->where('created_at', '<>', 1)
     //                 ->groupBy('date')
     //                 ->get();

    	// }
 
 
         


//dd($users);
         

         return $data;

       


    }

        public function highestSellingProduct(Request $request){

        	$count = Invoices::all();
        	$data = DB::table('invoices')
            ->select(DB::raw('sum(total) as total'),DB::raw("DATE_FORMAT(created_at,'%Y') as date"))
                     // ->where('created_at', '<>', 1)
             ->groupBy('date')
             ->get();

             Sales::with(['rawlists' => function($query){
        $query->groupBy('product_name');
    }])->get();
        	return $count;
        }

}
