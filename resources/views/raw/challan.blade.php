@extends('adminTemplate/admin_template')


@section('content')

<div class="box  box-primary">
	<div class="box-header">
		<h3 class="box-title">Data Table With Full Features</h3>
	</div>


	<form method="post" action="{{ route('factory.raw.challansave') }}" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}


		<div class="form-group">
		<label class="col-md-2 control-label">Product Name</label>
			<div class ="col-md-8">


				<input name='name' placeholder ='Product Name' class="form-control ">


			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Challan ID</label>

			<div class ="col-md-8">
				<input name ='id' placeholder ='Challan ID' class="form-control " >
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Product ID</label>

			<div class ="col-md-8">
				<input name ='raw_id' placeholder ='Product ID' class="form-control ">
			</div>

		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Product Weight</label>
			<div class ="col-md-8">

				<input name ='weight' placeholder ='Product Weight' class="form-control ">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Quantity</label>

			<div class ="col-md-8">
				<input name ='quantity' placeholder ='Quantity' class="form-control ">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Transport Type</label>

			<div class ="col-md-8">
				<input name ='transport_type' placeholder ='Transport Type ' class="form-control ">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Transport Number Plate</label>
			<div class ="col-md-8">

				<input name ='transport_num_plate' placeholder ='Transport Number Plate'  class="form-control ">
			</div>
		</div>

		
		<button type='submit' class="pull-right">Confirm</button>

	</form>
</div>


@endsection

@section('page-script')


@endsection