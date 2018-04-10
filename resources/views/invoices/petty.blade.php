
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
  <div class="col-lg-2 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{$petty->where("petty_type_id", 1)->count()}}</h3>

        <p>Deposit Bank</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#bank">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-2 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-purple">
      <div class="inner">
        <h3>{{$petty->where("petty_type_id", 2)->count()}}</h3>

        <p>Payment to Vendor</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#payment">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-2 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-orange">
      <div class="inner">
        <h3>{{$petty->where("petty_type_id", 3)->count()}}</h3>

        <p>Expenses</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#expense">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

<table class="table tabled-bordered">
    <thead>
        <tr>
            <td>  </td>
            <td>  </td>      
        </tr>
    </thead>
  
</table>

<!-- Modal -->
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
              <td>Date</td>
              <td>Amount</td>
            </tr>
          </thead>  
            <tbody>
            @foreach ($petty->where("petty_type_id", 5) as $info)
                <tr>
                 <td>{{ $info->created_at->format('d.m.Y') }} </td>
                 <td> {{ $info->amount }} </td>
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

