@extends('adminTemplate/admin_template')


@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Table With Full Features</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  <table class='table table-bordered'>

    <tr>
    <td>
       Product ID
    </td>
    <td>
      Product Name
    </td>
    <td>
      Available Factory Stock
    </td>

    <td>
      Available Outlet Stock
    </td>

    </tr>






    @foreach ($rawavailable as $stock)
    <tr>
    <td>
     {{$stock->availableref->id}}
    </td>
    <td>
     {{$stock->availableref->name}}
    </td>
    <td>
     {{$stock->total}}
    </td>

    <td>
     {{$stock->totalOutlet}}
    </td>



      

       </tr>

      
    @endforeach
  </table>
  </div>
</div>



<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Table With Full Features</h3>
  </div>
    <form method="post" action="{{ route('factory.stock.store') }}" enctype="multipart/form-data" class="form-horizontal">
    	{{ csrf_field() }}

    	<div class="form-group">
      <div class="col-md-6">
      <input class="form-control" name='stock_in' placeholder ='Stock in'>
    	</div>
      </div>
      <div class="form-group">
      <div class="col-md-6">
      <input class="form-control" name ='stock_out' placeholder ='Stock out'>
    	</div>
      </div>
      <div class="form-group">
      <div class="col-md-6">
      <input class="form-control" name ='ref_id' placeholder ='Reference ID'>
    	</div>
      </div>
      <div class="form-group">
      <div class="col-md-6">
      <input class="form-control" name ='reference_type' placeholder ='Reference Type'>
      </div>
      </div>
      <div class="form-group">
      <div class="col-md-6">
      <input class="form-control" name ='mode' value = "1" type = 'hidden'>
    	</div>
      </div>
      <button type='submit'>Submit</button>


    </form>
  </div>

@endsection

@section('page-script')


@endsection