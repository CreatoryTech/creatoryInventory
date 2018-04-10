<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\RawMaterial;
use App\Clients;

use App\FinishedGood;




use App\AvailableStock;
use PDF;

class ReportController extends Controller
{
    //

     public function raw_material($mode)
    {


      $raws =AvailableStock::with('availableref')->where('availableref_type','App\RawMaterial')->get();

        //dd($raws);

/*      foreach ($raws as $raw){

           $raw->availableref->with('stockmanangements')->get();
            error_log($raw->availableref->stockmanangements()->sum('stock_in'));

      }*/

       if ($mode =='report'){
       	  return view('reports.raw',['raws' =>$raws, 'mode'=> $mode ]);

       };


       if ($mode =='pdf'){
       	  $pdf = PDF::loadView('reports.raw', ['raws'=> $raws, 'mode'=> $mode]);
           return $pdf->stream();

       };
       



    
       /* return $pdf->download('invoice.pdf');*/
      




    }

     public function raw_pdf($raws)
    {


    
      $pdf = PDF::loadView('reports.raw', ['raws'=> $raws]);
     /* return $pdf->stream();*/
       /* return $pdf->download('invoice.pdf');*/
        return view('reports.raw',['raws' =>$raws]);




    }


  public function clients()
    {


    
      
        return view('reports.clients');




    }

   public function clients_list()
    {

      $Clients = Clients::orderBy('firstName', 'desc')->get();
          


    
      $pdf = PDF::loadView('clients.index', ['clients'=> $Clients]);


           return $pdf->stream();
     /* return $pdf->stream();*/
       /* return $pdf->download('invoice.pdf');*/
      




    }

  public function clients_top()
    {
      $clients =new Clients();

    /*  $attachments = $userModel->attachments()->where('level', 'user')->get();

      $Clients = $clients->payment->orderBy('total_paid', 'desc')->get();*/
          
  $Clients=   $clients->with(['payment' => function($query)
{
    $query->orderBy('total_paid', 'desc');
}])->get();

   // dd( $Clients);
      $pdf = PDF::loadView('clients.topPaid', ['clients'=> $Clients]);


           return $pdf->stream();
     /* return $pdf->stream();*/
       /* return $pdf->download('invoice.pdf');*/
      




    }

 public function duePaid()
    {
      $clients =new Clients();

    /*  $attachments = $userModel->attachments()->where('level', 'user')->get();

      $Clients = $clients->payment->orderBy('total_paid', 'desc')->get();*/
          
  $Clients=   $clients->with(['payment' => function($query)
{
    $query->whereNotNull('total_due')->orderBy('total_due', 'desc');
}])->get();

   // dd( $Clients);
      $pdf = PDF::loadView('clients.duePaid', ['clients'=> $Clients]);


           return $pdf->stream();
     /* return $pdf->stream();*/
       /* return $pdf->download('invoice.pdf');*/
      




    }


  public function existingProduct(Request $request)
    {
       $finishedAvaialble = FinishedGood::all();
       // dd($request->mode);
        
       $mode = $request->mode;

    /*  $attachments = $userModel->attachments()->where('level', 'user')->get();

      $Clients = $clients->payment->orderBy('total_paid', 'desc')->get();*/
          
  
   // dd( $Clients);

      if($mode == "released"){
          $pdf = PDF::loadView('finished.releasedGood', ['finishedAvaialble'=> $finishedAvaialble]);

      }

    if($mode == "factory"){
          $pdf = PDF::loadView('finished.existingProduct', ['finishedAvaialble'=> $finishedAvaialble]);

      }



     


           return $pdf->stream();
     /* return $pdf->stream();*/
       /* return $pdf->download('invoice.pdf');*/
      




    }



  public function finishedIndex()
    {
      
       return view('finished.finishedIndex');



    }







}
