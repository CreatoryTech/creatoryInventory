
@extends('adminTemplate/admin_template')


@section('content')

<table class='table table-bordered'>

  <tr>
  <td>
     Product ID
  </td>
  <td>
    Product Name
  </td>
  <td>
    Available Factory Stock
  </td>

 

  </tr>






  @foreach ($finishedAvaialble as $stock)
  <tr>
  <td>
   {{$stock->id}}
  </td>
  <td>
   {{$stock->name}}
  </td>
  <td>
   {{$stock->availablestock->first()->total}}
  </td>

  



    

     </tr>

    
  @endforeach



  </table>

  @endsection

@section('page-script')


@endsection