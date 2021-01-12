<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	
	<?php require_once "scripts.php"; ?>

</head>
<body>


<div class="frm_general">		
					<input type="text" id="nombre" placeholder="Ingrese su nombre" >		
					<input type="text" id="apellido" placeholder="Ingrese su apellido" >		
					<input type="text" id="usuario" placeholder="Ingrese su usuario" >
					<input type="text" id="password" placeholder="Ingrese su contraseña" >
				
					<a id="registrarNuevo"><button>Registrar</button></a>
					<a href="index.php"><button>Login</button>	</a>
</div>

</body>
</html>

<script type="text/javascript">

function registrar(){ 

			//Valifacion de vacion
			$('#registrarNuevo').click(function(){
				if($('#nombre').val()==""){
					alertify.alert("Debes agregar el nombre");
					return false;
				}else if($('#apellido').val()==""){
					alertify.alert("Debes agregar el apellido");
					return false;
				}else if($('#usuario').val()==""){
					alertify.alert("Debes agregar el usuario");
					return false;
				}else if($('#password').val()==""){
					alertify.alert("Debes agregar el password");
					return false;
			}

					$.ajax({
						type:"POST",
						url:"funciones/registro.php",
						data:{
							nombre: $('#nombre').val(),
							apellido:$('#apellido').val(),
							usuario:$('#usuario').val(),
							password:$('#password').val()
						},
						success:function(respuesta){

							if(respuesta == 2){
								alertify.alert("Este usuario ya existe, prueba con otro :)");
							}
							else if(respuesta == 1){
								
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
}

registrar();
</script>

