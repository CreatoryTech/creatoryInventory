@extends('adminTemplate/admin_template')


@section('content')


<form method="post" action="{{ route('factory.supplier.update',$suppliers) }}" enctype="multipart/form-data" class="form-horizontal">
{{ csrf_field() }}

 <input name='name' placeholder ='Name' value ='{{$suppliers->name}}'>


 <input name ='company' placeholder ='Company' value ='{{$suppliers->company}}' >


 <button type='submit'>Submit</button>



</form>


@endsection

@section('page-script')


@endsection