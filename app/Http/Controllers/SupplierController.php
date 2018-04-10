<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Session;

class SupplierController extends Controller
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
        $suppliers = Supplier::all();
        return view('supplier.create',['suppliers' =>$suppliers]);
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

        error_log('hiiiiiiiiii');

       // dd( $request);

         $data = $request->all();


         $message = new Supplier();

        //   $this->validate($request, [
        //     'name' => 'required|string',
        //     'comapny' => 'required|string',
        // ]);
         


        $message->fill($data);
        $message->save();
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //

        return view('supplier.edit',['suppliers'=> $supplier]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
           $task = Supplier::findOrFail($supplier->id);

       // $this->validate($request, [
       //  'title' => 'required',
       //  'description' => 'required'
       //  ]);

       $input = $request->all();

       $task->fill($input)->save();

       Session::flash('flash_message', 'Supplier information successfully edited!');

       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
