@extends('layout.app')


@section('content')

<table class='table table-bordered'>

  <tr>
    <td>
    Clients ID
   </td>


  <td>
    First Name
  </td>


  <td>Last Name</td>
  <td>Phone Number</td>
  <td>Email</td>
  <td>Address</td>
  <td>Company Name</td>
  <td>Company Address</td>
  <td>Total Paid</td>
</tr>







@foreach ($clients as $clients)
<tr>
  <td>
   {{$clients->id}}
 </td>

 <td>
   {{$clients->firstName}}
  </td>

  <td>
   {{$clients->lastName}}
  </td>

  <td>
   {{$clients->phoneNumber}}
  </td>

  <td>
   {{$clients->email}}
  </td>

  <td>
   {{$clients->address}}
  </td>

  <td>
   {{$clients->comapnyName}}
  </td>

  <td>
   {{$clients->companyAddress}}
  </td>

 <td>
   {{$clients->payment->total_paid}}
  </td>


 
 

  


</tr>




@endforeach

</table>



@endsection

@section('page-script')



@endsection