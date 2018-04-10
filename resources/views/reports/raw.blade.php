@extends('adminTemplate/admin_template')


@section('content')

@if ($mode == "report")
<a class='btn btn-primary' href = "{{route('raw_material','pdf') }}">Download PDF</a>
@endif

<table class='table table-bordered'>
	<thead>
		<tr>
			<td>Stock item</td>
			<td>Stock Ref</td>
			<td>Initial Stock</td>
			<td>Stock IN</td>
			<td>Stock OUT</td>
			<td>Final Stock</td>
		</tr>
	</thead>

	<tbody>
		@foreach ($raws as $raw)

		<tr>
		
			<td>{{$raw->availableref->name}}</td>
			<td> {{$raw->availableref_id}} </td>
			<td>{{$raw->availableref->initial_stock}}</td>
			<td> {{$raw->availableref->stockmanangements()->sum('stock_in')}} </td>
			<td> {{$raw->availableref->stockmanangements()->sum('stock_out')}} </td>
			<td> {{$raw->total}} </td>
			
		<!-- 	<td><a>Delete</a></td> -->
		</tr>

		@endforeach
	</tbody>
</table>



@endsection

@section('page-script')


@endsection