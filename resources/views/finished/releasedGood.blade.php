
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
    Available Production Stock
  </td>

 

  </tr>






  @foreach ($finishedAvaialble as $stock)

  @if(($stock->availablestock->first()->totalOutlet)!="")
  <tr>
  <td>
   {{$stock->id}}
  </td>
  <td>
   {{$stock->name}}
  </td>


  <td>
   {{$stock->availablestock->first()->totalOutlet}}
  </td>

  


@endif
    

     </tr>

    
  @endforeach



  </table>

  @endsection

@section('page-script')


@endsection