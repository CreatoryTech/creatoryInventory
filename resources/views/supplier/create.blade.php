@extends('adminTemplate/admin_template')


@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Table With Full Features</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<form method="post" action="{{ route('factory.supplier.store') }}" enctype="multipart/form-data" class="form-horizontal">
			{{ csrf_field() }}



			<div class="form-group">	        
				<label class = "col-md-2 control-label">

					Supplier Name


				</label>
				<div class = "col-md-8">
					<input name='name' placeholder ='Name' value="{{ old('name') }}" class= "form-control">
					@if ($errors->has('name'))

					<div class="error">{{ $errors->first('name') }}</div>
					@endif
				</div>

			</div>
			<div class="form-group">
			<label class = "col-md-2 control-label">
					Company Name

				</label>
				<div class= "col-md-8">

					<input name ='company' placeholder ='Company' value="{{ old('company') }}" class= "form-control">
					@if ($errors->has('company'))
					<div class="error">{{ $errors->first('company') }}</div>
					@endif

				</div>
			</div>

			<button type='submit' class="btn btn-primary pull-right">Submit</button>

		</form>

	</div>
</div>

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Table With Full Features</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table class='table table-bordered'>
			<thead>
				<tr>
					<td>Supplier id</td>
					<td> Supplier Name</td>
					<td> Company</td>

					<td colspan='2'> Action</td>
				</tr>
			</thead>

			<tbody>
				@foreach ($suppliers as $supplier)

				<tr>
					<td> {{$supplier->id}} </td>
					<td>{{$supplier->name}}</td>

					<td>  {{$supplier->company}} </td>
					<td><a href ="{{ route('factory.supplier.edit',$supplier) }}">Edit</a></td>
					<!-- <td><a>Delete</a></td> -->
				</tr>

				@endforeach
			</tbody>
		</table>
	</div>
</div>


@endsection

@section('page-script')


@endsection