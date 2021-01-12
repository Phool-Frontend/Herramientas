<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<?php require_once "scripts.php"; ?>

</head>

<body>


<div class="frm_general">
					<h1>RASTAMAN</h1>
					<input type="text" id="usuario" placeholder="Ingrese Usuario">
					<input type="password" id="password" placeholder="Ingrese Contraseña">
					
					<a href="#" id="entrarSistema" ><button>Entrar</button>	</a>				
					<a href="registro.php" ><button>Registro</button></a>		
</div>


</body>
</html>

<script type="text/javascript">

function entrarSistema(){
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

					$.ajax({
						type:"POST",
						url:"funciones/login.php",
						data:{
							usuario:$('#usuario').val(),
							password: $('#password').val()
						},
						success:function(respuesta){
							
							if(respuesta == 1){
								window.location="inicio.php";
							}else{
								alertify.alert("Fallo al entrar :(");
							}
						}
					});
		});	
}

entrarSistema();

</script>