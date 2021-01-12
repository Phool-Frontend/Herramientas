<html>
<head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<meta charset=utf-8 />
<title>Morris.js Responsive Charts Example + Bootstrap</title>
</head>

<style>
    .morris-hover {
  position:absolute;
  z-index:1000;
}

.morris-hover.morris-default-style {     border-radius:10px;
  padding:6px;
  color:#666;
  background:rgba(255, 255, 255, 0.8);
  border:solid 2px rgba(230, 230, 230, 0.8);
  font-family:sans-serif;
  font-size:12px;
  text-align:center;
}

.morris-hover.morris-default-style .morris-hover-row-label {
  font-weight:bold;
  margin:0.25em 0;
}

.morris-hover.morris-default-style .morris-hover-point {
  white-space:nowrap;
  margin:0.1em 0;
}

svg { width: 100%; }
</style>
<body>
    <h1>Link de varios graficos en morris: https://codepen.io/Haknecs/pen/rWEwmz</h1>

<!--************************************************** LISTA  ************************************************************************************-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
     
       
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Edit</th>
                <th>Delete</th>
          </thead>
          <tbody id="id_body">
          </tbody>
        </table>
        <div class="clearfix"></div>
       
      </div>
    </div>
  </div>
</div>


<!--**************************************************************************************************************************************-->
  <section class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div id="bar-chart"></div>
      </div>
      
      <div class="col-md-8">
        <div id="line-chart"></div>
      </div>
      
      <div class="col-md-8">
        <div id="area-chart"></div>
      </div>
      
      <div class="col-md-4">
        <div id="donut-chart"></div>
      </div>
      
      <div class="col-md-8">
        <div id="pie-chart"></div>
      </div>
    </div>
  </section>

<script>
    $(document).ready(function() {
        
    
        $(window).resize(function() {
            window.lineChart.redraw();
        });
        });



        function lineChart(graficos) {
            console.log(graficos);

            window.lineChart = Morris.Line({
            element: 'line-chart',
            data: graficos,
            xkey: 'fecha',
            ykeys: ['cantidad'],
            labels: ['Se vendio:'],
            lineColors: ['green']
           
        });
        }

</script>

<script language="javascript">


  
   function loadData()
   {
			$.ajax({
				type: "GET",
				async:true,
				url: 'crud.php',
				data: {
					cmd : 'load_data'
				},
				success: function (results) {
                    
                    dataArr = JSON.parse(results); 
                    var graficos = dataArr;
                    lineChart(graficos);

					var str = '';
					$("#id_body").html(str);	  
					for(i=0;i<dataArr.length;i++)
					{
						str += '<tr>'+
								'<td>'+dataArr[i].fecha+'</td>'+
								'<td>'+dataArr[i].cantidad+'</td>'+
								'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onClick="showEditor('+dataArr[i].id+');" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>'+
								'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onClick="setDeletedId('+dataArr[i].id+');" ><span class="glyphicon glyphicon-trash"></span></button></p></td>'+
							  '</tr>';
					}
						  
					$("#id_body").html(str);	  
						    
						  
				},
				error: function (request, status, error) {
						alert(request.responseText);
					}
			});
			
	   
   }
   $(document).ready(function(){
	     loadData();
	   });

</script>

</body>
</html>
