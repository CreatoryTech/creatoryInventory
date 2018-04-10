<?php

namespace App\Http\Controllers;

use App\PettyManagement;
use App\PettyType;
use App\Invoices;
use Illuminate\Http\Request;

class PettyController extends Controller
{
    public function index(){
         $petty =PettyType::all();

        return view('petty.index',["petty" => $petty]);
    }

    public function type(Request $request)
    {
        //
        $type = PettyType::create($request->all());
        return redirect()->back();

    }

    public function management(Request $request)
    {
        //
        $type = PettyManagement::create($request->all());
        return redirect()->back();

    }

    public function petty(){
        //$petty = PettyManagement::all();
        //dd($petty);
        $check=PettyType::all();
        foreach ($check as $key => $value) {
            # code...
            //dd($value->list->count());
        }


        
       $invoices = Invoices::all();
       $petty = PettyManagement::all();

       $pettyTime = $ldate = date('Y-m-d 12:00:00');
       $openingBalance = $petty->where("created_at",">",$pettyTime)->sum("amount");
       $closingBalance = $petty->where("created_at","<",$pettyTime)->sum("amount");

       error_log($openingBalance);
       error_log($closingBalance);
       return view('invoices.petty',['invoices' => $invoices, 'petty' => $petty]); 
    }



}
