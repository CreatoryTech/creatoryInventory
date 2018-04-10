@extends('adminTemplate/admin_template')


@section('content')

 <div class="box  box-success">
    <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
    </div>

	<div class = "row" >

	<div class = "col-md-8">

	  
	  Search By : <input type = "textbox" class = "form-control">

	  </div>


	  <div class = "col-md-4">

	  
	     <a class = "btn btn-primary"> Submit </a>

	  </div>



	 

	</div>


	<form method="post" action="{{ route('factory.finished.challanSearch') }}" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}

	 Search By  Date
	<div class = "row" >

	  
	 

	  <div class ="col-md-5">
	 

	    From : <input type = "textbox" class = "form-control datepicker" name="startDate">

	   </div>


	   <div class = "col-md-5">

	   To : <input type = "textbox" class = "form-control datepicker" name="endDate">

	    </div>


	     <div class = "col-md-2">

	  
	     <button class = "btn btn-primary"> Submit </button>

	  </div>
	 

	</div>
	</form>
</div>



<div class = "row ">


	<table class='table table-bordered'>
		<thead>
			<tr>
				<td> Challan ID </td>
				<td> Product Name </td>
				<td> Product Weight </td>
				<td> Product Quantity </td>
				<td> Product ID </td>
				<td> Transport Type </td>
				<td> Transport Number Plate </td>
				<td> Date Created </td>
				<td> Time  </td>
			</tr>
		</thead>

		<tbody>
			@foreach ($rawChallan as $challan)

			<tr>
			    <td> {{ $challan->id }} </td>
				<td> {{ $challan->name }} </td>
				<td> {{ $challan->weight }} </td>
				<td> {{ $challan->quantity }} </td>
				<td> {{ $challan->finished_id }} </td>
				<td> {{ $challan->transport_type }} </td>
				<td> {{ $challan->transport_num_plate }} </td>
				<td> {{ $challan->created_at->format('Y-m-d') }} </td>
				<td> {{ $challan->created_at->format('H:i:s') }} </td>			
			</tr>

			@endforeach
		</tbody>
	</table>

</div>


@endsection

@section('page-script')


@endsection