@extends('adminTemplate/admin_template')


@section('content')

 <div class="box  box-primary">
    <div class="box-header">
      <h3 class="box-title">Clients Form</h3>
    </div>
  <form method="post" role="form" action="{{ route('clients.store') }}" enctype="multipart/form-data" class="form-horizontal">
    {{ csrf_field() }}


    <div class="form-group">      
        <label for="email" class="col-md-2 control-label">ID:</label>
        <div class="col-md-8">
          <input name ='id' placeholder ='ID' class="form-control">
        </div>
      </div>
   


    <div class="form-group">      
        <label for="pwd" class="col-md-2 control-label">First Name:</label>
        <div class="col-md-8">
          <input name='firstName' placeholder ='First Name' class="form-control">
        </div>
      </div>


    <div class="form-group">     
        <label for="pwd" class="col-md-2 control-label">Last Name:</label>
        <div class="col-md-8">
          <input name ='lastName' placeholder ='Last Number' class="form-control">
        </div>
      </div>


    <div class="form-group">     
        <label for="pwd" class="col-md-2 control-label">Phone Number:</label>
        <div class="col-md-8">
          <input name ='phoneNumber' placeholder ='Phone Number' class="form-control">
        </div>
      </div>



    <div class="form-group">     
        <label for="pwd" class="col-md-2 control-label">Email:</label>
        <div class="col-md-8">
          <input name ='email' placeholder ='Email' class="form-control">
        </div>

      </div>
   
    <div class="form-group">     
        <label for="pwd" class="col-md-2 control-label">Address:</label>
        <div class="col-md-8">
          <input name ='address' placeholder ='Address' class="form-control">
        </div>
      </div>


    <div class="form-group">     
        <label for="pwd" class="col-md-2 control-label">Company Name:</label>
        <div class="col-md-8">
          <input name ='companyName' placeholder ='Company Name' class="form-control">
        </div>
      </div>




    <div class="form-group">     
        <label for="pwd" class="col-md-2 control-label">Company Address:</label>
        <div class="col-md-8">
          <input name ='companyAddress' placeholder ='Company Address' class="form-control">
        </div>
      </div>


    
    <button type="submit" class="btn btn-default pull-right">Submit</button>
  </form>
</div>



@endsection

@section('page-script')



@endsection