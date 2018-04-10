@extends('adminTemplate/admin_template')


@section('content')

<div class="container">
  <div class="box  box-primary">
    <div class="box-header">
      <h3 class="box-title">Data Table With Full Features</h3>
    </div>
    <!-- /.box-header -->
   
 
        <form method="post" role= "form" action="{{ route('store2') }}" enctype="multipart/form-data" class="form-horizontal">
         <div class="box-body">
          {{ csrf_field() }}
          <div class="form-group">
            
              <label for="email" class="col-md-2 control-label">ID:</label>
              <div class = "col-md-8">
                <input name ='id' placeholder ='ID' class="form-control ">
              </div>
            </div>
         
          <div class="form-group">
           
              <label for="pwd" class="col-md-2 control-label">Name:</label>
              <div class = "col-md-8">
               <input name='name' placeholder ='Name' class="form-control ">
             </div>
           </div>
        


       <div class="form-group">


          <label for="pwd" class="col-md-2 control-label">Description:</label>
          <div class = "col-md-8">
           <input name ='description' placeholder ='Description' class="form-control ">
         </div>
       </div>


     <div class = "form-group">

      <div class = "col-md-2">

        <label for="pwd" class="control-label">Initial Stock


     </div>

     <div class = "col-md-8">



       <input name ='initial_stock' placeholder ='Initial Stock' class = "form-control">




     </div>

   </div> 




     <div class="form-group">
    <div class= "col-md-2">

      <label for="pwd" class="control-label"> Raw Material </label>

    </div>
    <div class='rawsection col-md-8'>
   

        <select name='finished_id[]' class='raw_select form-control'>
          @foreach ($rawlists as $raw)
          <option value='{{$raw->id}}'>
            {{$raw->name}}
          </option>
          @endforeach

        </select>
    

    </div>
    </div>
    <a class='addrow btn btn-primary pull-left'>Add</a>
    <a class='deleterow btn btn-primary pull-left'>Delete</a>







  <div class= "row">
    <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </div>
</form>
</div>
</div>




<div class="box">
  <div class="box-header">
    <h3 class="box-title">Data Table With Full Features</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <div class= "row">

      <table class='table table-bordered'>

        <tr>
          <td>
           Product ID
         </td>
         <td>
          Product Name
        </td>
        <td>Raw material lists</td>
        <td>Action</td>
      </tr>






      @foreach ($finishedgood as $finished)
      <tr>
        <td>
         {{$finished->id}}
       </td>
       <td>
         {{$finished->name}}
       </td>
       <td>
        @foreach ($finished->rawlists as $finishgood)


        {{$finishgood->name}}<br>


<!--    <td>
   {{$finishgood->name}}
 </td> -->

 @endforeach
</td>





<td><a href='{{ route('factory.finished.edit',$finished) }}'>Edit</a></td>


</tr>




@endforeach
</table>

</div>
</div>
</div>

@endsection


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 -->


@section('page-script')
 <script>
  var i=1;
  $(document).ready(function(){
    var html = $('.raw_select').html();
    $(".addrow").click(function(){
      //alert('hi');
      $(".rawsection").append(" <div class='form-group'><select name=finished_id[] class=form-control>"+html+"</select></div>");
      i=i+1;
    });
    $(".deleterow").click(function(){
      $('.rawsection .form-group:last').remove();
      i=i-1;
    });
  });
</script>



@endsection