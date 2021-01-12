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
                    
                    //console.log(respuesta);

                    if(respuesta == 2){
                        alertify.alert("Este usuario ya existe, prueba con otro :)");
                    }
                    else if(respuesta == 1){
                        //alertify.success("Agregado con exito");
                        Swal.fire(
                            'Agregado con exito!',
                            'Exelente!',
                            'success'
                          )
                    }else{
                        alertify.error("Fallo al agregar");
                    }
                }
            });
    });
}

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
                        console.log(respuesta);
                        
                        $('.frm_general').waitMe({
                            effect : 'roundBounce',
                            text : 'Cargando',
                            maxSize : '',
                            waitTime : -1,
                            textPos : 'vertical',
                            fontSize : '',
                            source : '',
                            onClose : function() {}
                        });
                    
                        if(respuesta == 1){
                            setTimeout(() => {
                                $('.frm_general').waitMe('hide');
                            },4600);

                            setTimeout(() => {
                                window.location="inicio.php";
                            },3600);
                            

                        }else{
                            $('.frm_general').waitMe('hide');
                            alertify.alert("Fallo al entrar :(");
                        }
                    }
                });
    });	
}

entrarSistema();
registrar();