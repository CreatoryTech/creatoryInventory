@extends('adminTemplate/admin_template')


@section('content')
<form method="post" action="{{ route('factory.finished.update',$finishedgood) }}" enctype="multipart/form-data" class="form-horizontal">
	{{ csrf_field() }}
	<input name ='id' placeholder ='ID' value='{{$finishedgood->id}}'>
	<input name='name' placeholder ='Name' value='{{$finishedgood->name}}'>
	<input name ='description' placeholder ='Description' value='{{$finishedgood->description}}'>

<table class='table'>
<tr>
	<th>Raw id</th>
	<th>Raw name</th>

</tr>
<tbody>
@foreach ($finishedgood->rawlists as $finished)
<tr>
  <td>
  	<input name ='finished_id[]' placeholder ='Raw ID' value='{{$finished->id}}'>
  
 </td>
   <td>
   {{$finished->name}}
 </td>


 
 

</tr>
</tbody>
@endforeach
</table>

<input name ='initial_stock' placeholder ='initial_stock' value='{{$finishedgood->initial_stock}}'>



<!-- 	<input name ='finished_id[]' placeholder ='Raw ID' >
	<input name ='finished_id[]' placeholder ='Raw ID'>
	<input name ='finished_id[]' placeholder ='Raw ID'> -->
	<button type='submit'>Submit</button>
</form>

@endsection

@section('page-script')


@endsection