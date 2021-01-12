<canvas id="myChart"></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>


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


<canvas id="pie-chart" width="800" height="450"></canvas>


<script>
    function grafico(colores,cantidad){ 
        
        console.log(cantidad);

        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
            labels: colores,
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                data: cantidad
            }]
            },
            options: {
            title: {
                display: true,
                text: 'Predicted world population (millions) in 2050'
            }
            }
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
                   

                    
                    //colores = fechas
                    const colores = [];
                    const cantidad = [];
						  
					for(i=0;i<dataArr.length;i++)
					{
						colores.push(dataArr[i].fecha);
						cantidad.push(dataArr[i].cantidad)
					}
						  
					grafico(colores,cantidad);
						    
						  
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