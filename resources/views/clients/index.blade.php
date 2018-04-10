@extends('adminTemplate/admin_template')


@section('content')
  @foreach ($clients as $cl)
  <!-- Modal -->
    <div class="modal fade" id='myModal{{$cl->id}}' role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">

            <table class="table table-bordered">
            <thead>
              <tr>
               <th>Date</th>
               <th>Payment Type</th>
               <th>Product</th>
               <th>Invoices ID</th>
               <th>Payable</th>
               <th>Paid</th>
               <th>Due</th>

              </tr>
            </thead>
            <tbody>
            @foreach ($cl->invoices as $invoice)
              <tr>
                <td>{{$invoice->created_at->format("d-m-Y")}}</td>
                <td>{{$invoice->payment_type}}</td>
                <td></td>
                <td>{{$invoice->id}}</td>
                <td></td>
                <td>{{$invoice->total}}</td>
                <td>{{$invoice->payment_due}}</td>

              </tr>
              @endforeach

            </tbody>

            </table>
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  @endforeach     


 <div class="box  box-primary">
    <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
      <form method="post" action="{{ route('clientSearch') }}" enctype="multipart/form-data" class="form-horizontal">
       {{ csrf_field() }}
        <div class ="col-md-5">

           <input type = "textbox"  name="querySearch">

        </div>

        <button type="submit">Submit</button>


      </form>
    </div>


    <table class='table table-bordered' id ="example1">

      <tr>
        <td>
          Clients ID
        </td>
       <td>
          First Name
        </td>


        <td>Last Name</td>
        <td>Phone Number</td>
        <td>Email</td>
        <td>Address</td>
        <td>Company Name</td>
        <td>Company Address</td>
      </tr>

      @foreach ($clients as $clients)
      <tr>
        <td>
         <a data-toggle="modal" data-target="#myModal{{$clients->id}}" >{{$clients->id}}</a>
       </td>

       <td>
         {{$clients->firstName}}
       </td>

       <td>
         {{$clients->lastName}}
       </td>

       <td>
         {{$clients->phoneNumber}}
       </td>

       <td>
         {{$clients->email}}
       </td>

       <td>
         {{$clients->address}}
       </td>

       <td>
         {{$clients->comapnyName}}
       </td>

       <td>
         {{$clients->companyAddress}}
       </td>
     </tr>

    @endforeach

    </table>


</div>


@endsection

@section('page-script')



@endsection