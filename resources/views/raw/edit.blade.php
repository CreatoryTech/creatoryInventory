
@extends('adminTemplate/admin_template')


@section('content')

<form method="post" action="{{ route('factory.raw.update',$rawMaterial) }}" enctype="multipart/form-data" class="form-horizontal">
	{{ csrf_field() }}
	<input name ='id' placeholder ='Raw'  value='{{ $rawMaterial->id }}'>

	<input name='name' placeholder ='Name' value='{{ $rawMaterial->name }}'>
	<input name ='description' placeholder ='Description' value='{{$rawMaterial->description}}'>
	<input name ='supplier_id' placeholder ='Supplier ID' value='{{$rawMaterial->supplier_id}}'>
	<input name ='initial_stock' placeholder ='Initial Stock' value='{{$rawMaterial->initial_stock}}'>
	<button type='submit'>Submit</button>


</form>


@endsection

@section('page-script')


@endsection