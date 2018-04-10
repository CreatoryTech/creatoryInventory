@extends('adminTemplate/admin_template')

@section('content')


<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title"> Raw Product Form </h3>
	</div>
	<form method="post" role="form" action="{{ route('factory.raw.store') }}" enctype="multipart/form-data" class="form-horizontal">

		<div class="box-body">
			{{ csrf_field() }}

			<div class = "form-group" >

				<div class = "col-md-2">

					<label for="" class=" control-label">Raw ID</label>
				</div>

				<div class = "col-md-8">
					<input name ='id' placeholder ='Raw' class = "form-control">

					@if ($errors->has('password'))

					<span class="text-danger">{{ $errors->first('id') }}</span>

					@endif
				</div>	
			</div>




			<div class = "form-group" >

				<div class = "col-md-2">

					<label for="" class=" control-label">Raw Name</label>


				</div>

				<div class = "col-md-8">

					<input name='name' placeholder ='Name' class = "form-control">

					@if ($errors->has('password'))

					<span class="text-danger">{{ $errors->first('name') }}</span>

					@endif


				</div>
			</div>



			<div class = "form-group" >

				<div class = "col-md-2">

					<label for="" class=" control-label"> Description</label>


				</div>


				<div class = "col-md-8">



					<input name ='description' placeholder ='Description' class = "form-control">
					@if ($errors->has('password'))

					<span class="text-danger">{{ $errors->first('description') }}</span>

					@endif


				</div>


			</div> 

			<div class = "form-group" >

				<div class = "col-md-2">

					<label for="" class=" control-label"> Supplier ID </label>


				</div>

				<div class = "col-md-8">



					<input name ='supplier_id' placeholder ='Supplier ID' class = "form-control">
					@if ($errors->has('password'))

					<span class="text-danger">{{ $errors->first('supplier_id') }}</span>

					@endif


				</div>
			</div>




			<div class = "form-group" >

				<div class = "col-md-2">

					<label for="" class=" control-label">Initial Stock</label>


				</div>

				<div class = "col-md-8">



					<input name ='initial_stock' placeholder ='Initial Stock' class = "form-control">
					@if ($errors->has('password'))

					<span class="text-danger">{{ $errors->first('initial_stock') }}</span>

					@endif




				</div>
			</div>



			<button type='submit'>Submit</button>
		</div>
	</div>


</form>

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Raw Products List</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table class='table table-bordered' id ="example1">
			<thead>
				<tr>
					<td>Raw id</td>
					<td> Raw Name</td>
					<td> Raw Description</td>
					<td> Supplier id</td>
					<td colspan='2'> Action</td>
				</tr>
			</thead>

			<tbody>
				@foreach ($raws as $raw)

				<tr>
					<td> {{$raw->id}} </td>
					<td>{{$raw->name}}</td>
					<td>{{$raw->description}}</td>
					<td> {{$raw->supplier_id}} </td>

					<td><a href ="{{ route('factory.raw.edit',$raw) }}">Edit</a></td>
					<!-- 	<td><a>Delete</a></td> -->
				</tr>

				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection

@section('page-script')
<script>
	$(function () {
		$('#example1').DataTable()
		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
		})
	})
</script>


@endsection