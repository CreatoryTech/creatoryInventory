@extends('adminTemplate/admin_template')


@section('content')
<div class = "row">

<div class="col-md-6">
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Stock</h3>
    <table class="table table-bordered">
    	<thead>
    		<tr>
    		  <th> Product Name </th>

    		  <th>Product ID</th>
    		  <th>Stock</th>	

    		</tr>
    		<tbody>
    		 @foreach ($outletStock as $stock)
   			<tr>

    			 <td>{{$stock->availableref->id}}</td>
    			 <td>{{$stock->availableref->name}}</td>
    			 <td>{{$stock->totalOutlet}}</td>

    		</tr>

    		@endforeach


    		</tbody>

    	</thead>

    </table>
  </div>

  </div>
  

  



</div>


<div class="col-md-6">



            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sales</h3>


              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>

              </div>
                 <input type = "radio" class="mode " value = "date" name="mode"> Date
	             <input type = "radio" class="mode " value = "year" name="mode"> Year
            </div>
            <div class="box-body">

              <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


  

  



</div>
</div>

<div class="row">
<div class="col-md-6">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title text-center">Number Of Clients: {{$clients}}</h3>
      </div>
    </div>
  </div>
  <div class="col-md-6">


  <div class="box">
  <div class="box-header">
    <h3 class="box-title text-center">Number of invoices: {{$invoices->count()}}</h3>
  </div>
</div>
</div>

</div>


  <div class="box">
  <div class="box-header">
    <h3 class="box-title">Petty Cash</h3>

    <div class="text-center">
      Opening Balance: {{$openingBalance}}
    </div>
    <div class="text-center">
      Closing Balance: {{$closingBalance}}
    </div>
  </div>

  </div>

@endsection

@section('page-script')
<script src="../../bower_components/chart.js/Chart.js"></script>
<script>
// $(function(){


//     var areaChartData = {
//       labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
//       datasets: [
//         {
//           label               : 'Electronics',
//           fillColor           : 'rgba(210, 214, 222, 1)',
//           strokeColor         : 'rgba(210, 214, 222, 1)',
//           pointColor          : 'rgba(210, 214, 222, 1)',
//           pointStrokeColor    : '#c1c7d1',
//           pointHighlightFill  : '#fff',
//           pointHighlightStroke: 'rgba(220,220,220,1)',
//           data                : [65, 59, 80, 81, 56, 55, 40]
//         },
//         {
//           label               : 'Digital Goods',
//           fillColor           : 'rgba(60,141,188,0.9)',
//           strokeColor         : 'rgba(60,141,188,0.8)',
//           pointColor          : '#3b8bba',
//           pointStrokeColor    : 'rgba(60,141,188,1)',
//           pointHighlightFill  : '#fff',
//           pointHighlightStroke: 'rgba(60,141,188,1)',
//           data                : [28, 48, 40, 19, 86, 27, 90]
//         }
//       ]
//     }

//     var areaChartOptions = {
//       //Boolean - If we should show the scale at all
//       showScale               : true,
//       //Boolean - Whether grid lines are shown across the chart
//       scaleShowGridLines      : false,
//       //String - Colour of the grid lines
//       scaleGridLineColor      : 'rgba(0,0,0,.05)',
//       //Number - Width of the grid lines
//       scaleGridLineWidth      : 1,
//       //Boolean - Whether to show horizontal lines (except X axis)
//       scaleShowHorizontalLines: true,
//       //Boolean - Whether to show vertical lines (except Y axis)
//       scaleShowVerticalLines  : true,
//       //Boolean - Whether the line is curved between points
//       bezierCurve             : true,
//       //Number - Tension of the bezier curve between points
//       bezierCurveTension      : 0.3,
//       //Boolean - Whether to show a dot for each point
//       pointDot                : false,
//       //Number - Radius of each point dot in pixels
//       pointDotRadius          : 4,
//       //Number - Pixel width of point dot stroke
//       pointDotStrokeWidth     : 1,
//       //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
//       pointHitDetectionRadius : 20,
//       //Boolean - Whether to show a stroke for datasets
//       datasetStroke           : true,
//       //Number - Pixel width of dataset stroke
//       datasetStrokeWidth      : 2,
//       //Boolean - Whether to fill the dataset with a color
//       datasetFill             : true,
//       //String - A legend template
//       legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
//       //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
//       maintainAspectRatio     : true,
//       //Boolean - whether to make the chart responsive to window resizing
//       responsive              : true
//     }

//     //Create the line chart
//   //-------------
//     //- LINE CHART -
//     //--------------
//     var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
//     var lineChart                = new Chart(lineChartCanvas)
//     var lineChartOptions         = areaChartOptions
//     lineChartOptions.datasetFill = false
//     lineChart.Line(areaChartData, lineChartOptions)


// })

function chartRender(data){

	$.getJSON("outlet/projects/chart/data",data, function (result) {


    var labels = [],data=[];
    for (var i = 0; i < result.length; i++) {
        labels.push(result[i].date);
        data.push(result[i].total);

        //console.log(result);

        // labels.push(result[i].created_at);
        // data.push(result[i].total);


    }
    console.log(data);

    var buyerData = {
      labels : labels,
      datasets : [
        {
          fillColor : "rgba(240, 127, 110, 0.3)",
          strokeColor : "#f56954",
          pointColor : "#A62121",
          pointStrokeColor : "#741F1F",
          data : data
        }
      ]
    };
    var buyers = document.getElementById('lineChart').getContext('2d');
    
    new Chart(buyers).Line(buyerData, {
      bezierCurve : true
    });
  });



}
$(function(){
	var data={

		mode: "date" 
	};

	chartRender(data);

	$(".mode").change(function(){

		var mode= $(this).val();
		console.log ("MODE" +mode);
     var data={

		mode: mode
	};

	chartRender(data);

	})

  
})

 
</script>


@endsection