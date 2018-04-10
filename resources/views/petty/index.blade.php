
@extends('adminTemplate/admin_template')

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">IN</h3>
  </div>
  <div class="box-body">
   
    <form method="post" action="{{ route('petty.management') }}" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }} 
      <div class = "form-group">
        <label class = "col-md-2 control-label">Petty Type</label>
        <div class="col-md-6">
         <select name = "petty_type_id" class="form-control" >
          @foreach ($petty as $list)
           @if ($list->type=="IN")
           <option value="{{$list->id}}">
             {{$list->name}}
           </option>
           @endif
           @endforeach
         </select>
        </div>
      </div>
      <div class = "form-group">
          <label class = "col-md-2 control-label">Reason</label>
          <div class="col-md-6">
           <input name = "reason" class="form-control" >
          </div>
      </div>
      <div class = "form-group">
        <label class = "col-md-2 control-label">Name</label>
        <div class="col-md-6">
          <input name = "name" class="form-control" >
        </div>
      </div> 
      <div class = "form-group">
        <label class = "col-md-2 control-label">Amount</label>
        <div class="col-md-6">
         <input name = "amount" class="form-control" >
        </div>
        <div class="col-md-2">
            <button type = "submit" class="btn btn-primary "> Submit </button>
          </div>
      </div>
     </form>
     <hr>

    <div class="box-header">
      <h3 class="box-title">OUT</h3>
    </div>

      <form method="post" action="{{ route('petty.management') }}" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }} 
        <div class = "form-group">
          <label class = "col-md-2 control-label">Petty Type</label>
          <div class="col-md-6">
           <select name = "petty_type_id" class="form-control" >
            @foreach ($petty as $list)
             @if ($list->type=="OUT")
             <option value="{{$list->id}}">
               {{$list->name}}
             </option>
             @endif
             @endforeach
           </select>
          </div>
        </div>
        <div class = "form-group">
        <label class = "col-md-2 control-label">Name</label>
        <div class="col-md-6">
          <input name = "name" class="form-control" >
        </div>
      </div> 
        <div class = "form-group">
          <label class = "col-md-2 control-label">Reason</label>
          <div class="col-md-6">
           <input name = "reason" class="form-control" >
          </div>
        </div> 
        <div class = "form-group">
          <label class = "col-md-2 control-label">Amount</label>
          <div class="col-md-6">
           <input name = "amount" class="form-control" >
          </div>

          <div class="col-md-2">
            <button type = "submit" class="btn btn-primary"> Submit </button>
          </div>
        </div> 
       </form>
    <hr>
  <div class="box-header">
    <h3 class="box-title">NEW</h3>
  </div>

    <form method="post" action="{{ route('petty.type') }}" enctype="multipart/form-data" class="form-horizontal">
      {{ csrf_field() }}
     <div class="form-group">
      <label class = "col-md-2 control-label">Petty Name</label>
          <div class="col-md-6">
             <input name ="name" class="form-control">
          </div>
    </div>
    <div class="form-group">
          <label class = "col-md-2 control-label">Petty Type</label>
          <div class="col-md-6">
             <select name ="type" class="form-control">
             <option value = "IN">IN</option>
             <option value = "OUT">OUT</option>
             </select>
          </div>
      <button type = "submit" class="btn btn-primary"> Submit </button>

    </div>
    </form>
  </div>
</div>


@endsection