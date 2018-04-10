
@extends('adminTemplate/admin_template')
@section('content')
<div class="row">
  <div class="col-lg-2 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$invoices->count()}}</h3>

        <p>Payment Client</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#myModal">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-2 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$petty->where("petty_type_id", 5)->count()}}<sup style="font-size: 20px"></sup></h3>

        <p>Withdraw</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#withdraw">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-2 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>44</h3>

        <p>Others</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#others">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->


 
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">

        <table class="table tabled-bordered">
          <thead>
            <tr>
              <td>Client ID</td>
              <td>Invoice</td>
              <td>Amount</td>
            </tr>
          </thead>  
            <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                 <td>{{ $invoice->clients_id }} </td>
                 <td> {{ $invoice->id }} </td>
                 <td> {{ $invoice->total }} </td>
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






<!-- Withdraw -->

<!-- Modal -->
<div class="modal fade" id="withdraw" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">

        <table class="table tabled-bordered">
          <thead>
            <tr>
              <td>Client ID</td>
              <td>Invoice</td>
              <td>Amount</td>
            </tr>
          </thead>  
            <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                 <td>{{ $invoice->clients_id }} </td>
                 <td> {{ $invoice->id }} </td>
                 <td> {{ $invoice->total }} </td>
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

@endsection