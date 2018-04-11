
@extends('adminTemplate/admin_template')


@section('content')
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Invoice</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<form method="post" action="{{ route('invoices.store') }}" enctype="multipart/form-data" class="form-horizontal">
			{{ csrf_field() }}
			<div class = "form-group">
			<label class = "col-md-2 control-label">Client ID</label>
				<div class="col-md-8">
			
			<input class="form-control" name='clients_id' placeholder ='Client ID'>
			</div>
			</div>

			<div class="productGroup">
				<div class = "form-group" id="productRow0" >
				<label class = "col-md-2 control-label">Product ID</label>
				<div class="col-md-8 productRow">

				
					<input class='form-control' name ='product_id[]' placeholder ='PRODUCT ID'>

				</div>
				<div class = "col-md-2">

				<a class="addProduct" id = "addProduct0"> Add Product </a>
				</div>
				</div>
				<div class = "form-group" id = "priceRow0">
				<label class = "col-md-2 control-label">Price</label>
					<div class="col-md-8">
				
				<input class="form-control price" name ='price[]' placeholder ='price' id = "price0">
				</div>
				</div>
				<div class = "form-group" id = "quanRow0">
				<label class = "col-md-2 control-label">Quantity</label>
					<div class="col-md-8">
				
				<input class="form-control quan" name ='quantity[]' placeholder ='quantity' id = "quan0">
				</div>
				</div>
			</div>
			<div class = "form-group">
				<label class = "col-md-2 control-label">Total</label>
					<div class="col-md-8">
				
				<input class="form-control totalCalculated">
			</div>
			</div>
			<div class = "form-group">
			<label class = "col-md-2 control-label">Payment Type</label>
				<div class="col-md-8">
			
			<input class="form-control" name ='payment_type' placeholder ='payment_type' >
			</div>
			</div>
			<div class = "form-group">
			<label class = "col-md-2 control-label">Paid</label>
				<div class="col-md-8">
			
			<input class="form-control" name ='total' placeholder ='total'>
			</div>
			</div>
			<div class = "form-group">
			<label class = "col-md-2 control-label">Payment Due</label>
				<div class="col-md-8">
			
			<input class="form-control" name ='payment_due' placeholder ='payment_due' >	
			</div>
			</div>
			<button type='submit'>Submit</button>
		</form>
	</div>
</div>


@endsection

@section('page-script')
<script>
  var i=1;
  function calculated(){
  	console.log("activated");


  	var total=0;
  	$('.price').each(function(i, obj) {
  	 var token= $(this).attr("id").split('price').filter(function(el) {return el.length != 0});
  	   var price = $(this).val();
  	   var quantity = $('#quan'+token).val();
  	   console.log("Quantity"+quantity);
  	   total = total+(price*quantity);


	});
	console.log("TOTAL FEMME"+total);

    return total;


  }
  $(document).ready(function(){
  	//alert('hi');
  	$('body').on('click',".addProduct",function(){
    // $(".addProduct").click(function(){
    var html = '<div class = "form-group" id="productRow'+i+'"><label class = "col-md-2 control-label">Product ID</label><div class="col-md-8 productRow"><input class="form-control" name ="product_id[]"   placeholder ="product_id"></div></div><div class = "form-group" id="priceRow'+i+'"><label class = "col-md-2 control-label">Price</label><div class="col-md-8"><input class="form-control price" name ="price[]" placeholder ="price" id = "price'+i+'"></div><div class = "col-md-2"><a class="addProduct" id = "addProduct'+i+'"> Add Product </a></div></div><div class = "form-group" id="quanRow'+i+'"><label class = "col-md-2 control-label">Quantity</label><div class="col-md-8"><input class="form-control quan" name ="quantity[]" placeholder ="quantity" id = "quan'+i+'"></div></div><hr>';

      //alert('hi');
       // $(".productRow").append("<input class='form-control' name ='product_id[]' placeholder ='product_id'>");
      $(".productGroup").append(html);
      $(this).addClass("deleterow");
      $(this).removeClass("addProduct");
      $(this).html("").html("remove");

       i=i+1;
       console.log("i"+i);
    });

     $('body').on('click',".deleterow",function(){
    // $(".deleterow").click(function(){
    	console.log("Raw Section");

      // $('.rawsection .form-group:last').remove();
  	   var token= $(this).attr("id").split('addProduct').filter(function(el) {return el.length != 0});
  	   $('#quanRow'+token).remove();
  	   $('#priceRow'+token).remove();
  	   $('#productRow'+token).remove();
  	    var total = calculated();
    	$(".totalCalculated").val(total);
      i=i-1;
    });

    $('body').on('keyup',".quan, .price",function(){
    	var total = calculated();
    	$(".totalCalculated").val(total);
    });

    $('input[name="total"]').keyup(function(){
    	var total = $(".totalCalculated").val();
    	var sub = $(this).val();
    	var due = total - sub;
    	$('input[name="payment_due"]').val(due);
    })


  });


</script>







@endsection