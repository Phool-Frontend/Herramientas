<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script language="javascript">


function editar_registro(id){
	   $("#id").val(id);
	   
	   $.ajax({
				type: "GET",
				async:true,
				url: 'crud.php',
				data: {
					opcion : 'editar',
					id         : $("#id").val() 
				},
				success: function (results) {
         if(results == 0){
              //console.log("Es nuevo el dato adelante agregar"); 
              //Limpiamos los inputs
              $("#nombre").val('');
              $("#apellido").val('');
              $("#direccion").val('');
         }else{
              dataArr = JSON.parse(results); 
              console.log(dataArr);
              $("#nombre").val(dataArr[0].nombre);
              $("#apellido").val(dataArr[0].apellido);
              $("#direccion").val(dataArr[0].direccion);
         }
					
					
					
				},
				error: function (request, status, error) {
						alert(request.responseText);
					}
			}); 
}
   
function agregar(){
			$.ajax({
				type: "GET",
				async:true,
				url: 'crud.php',
				data: {
					opcion : 'agregar',
					nombre : $("#nombre").val(),
					apellido  : $("#apellido").val(),
					direccion    : $("#direccion").val(),
					id         : $("#id").val() 
				},
				success: function (results) {
          console.log(results);
					cargar_datos();
				},
				error: function (request, status, error) {
						alert(request.responseText);
					}
			});
			
		$('.close').click(); 	
}
   
function enviar_id_borrar(id){
	   $("#delete_id").val(id);
}
   
function borrar(){
			$.ajax({
				type: "GET",
				async:true,
				url: 'crud.php',
				data: {
					opcion : 'borrar',
					id  : $("#delete_id").val()
				},
				success: function (results) {
         
					cargar_datos();
				},
				error: function (request, status, error) {
						alert(request.responseText);
					}
			});
		$('.close').click(); 	
}
   
function cargar_datos(){
			$.ajax({
				type: "GET",
				async:true,
				url: 'crud.php',
				data: {
					opcion : 'cargar_datos'
				},
				success: function (results) {
         
					dataArr = JSON.parse(results); 
					var str = '';
					$("#id_body").html(str);	  
					for(i=0;i<dataArr.length;i++)
					{
						str += '<tr>'+
								'<td>'+dataArr[i].nombre+'</td>'+
								'<td>'+dataArr[i].apellido+'</td>'+
								'<td>'+dataArr[i].direccion+'</td>'+
								'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" onClick="editar_registro('+dataArr[i].id+');" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>'+
								'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-sm" data-title="Delete" data-toggle="modal" data-target="#delete" onClick="enviar_id_borrar('+dataArr[i].id+');" ><span class="glyphicon glyphicon-trash"></span></button></p></td>'+
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
	     cargar_datos();
});


</script>

<div class="container">
  <div class="row">

    <div class="col-md-12">
      <h1>Tabla Usuario</h1>
       <div class="row">
         <div class="col-md-12">
           <b></b>
           <br>
           <a href="#edit" class="btn btn-success" data-toggle="modal" onClick="editar_registro('');"><i class="material-icons"></i> <span>Agregar Nuevo</span></a>
         </div>
       </div><br><br>
      <div class="table-responsive">


        <table id="mytable" class="table table-bordred table-striped">
          <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Editar</th>
                <th>Borrar</th>
          </thead>

          <tbody id="id_body">

          </tbody>

        </table>

        <div class="clearfix"></div>
       
      </div>
    </div>
  </div>
</div>


<!---agregar new-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Agregar</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input class="form-control " type="text"  id="nombre" placeholder="nombre">
        </div>
        <div class="form-group">
          <input class="form-control " type="text" id="apellido" placeholder="apellido">
        </div>
        <div class="form-group">
          <input class="form-control " type="text" id="direccion" placeholder="direccion">
        </div>
      </div>
      <div class="modal-footer ">
        <input type="hidden" id="id">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" onClick="agregar()"><span class="glyphicon glyphicon-ok-sign"></span>Agregar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>




<!--Delete-->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Eliminar esta entrada</h4>
      </div>
      <div class="modal-body">

        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>Estas seguro de eliminar el registro?</div>

      </div>
      <div class="modal-footer ">
        <input type="hidden" id="delete_id">
        <button type="button" class="btn btn-success" onClick="borrar();"><span class="glyphicon glyphicon-ok-sign"></span>Si</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

