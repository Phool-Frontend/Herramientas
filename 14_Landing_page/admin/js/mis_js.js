////////////////////////////// LOGIN /////////////
function entrarSistema(){
   
    $('#entrarSistema').click(function(){
        event.preventDefault();
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
                    beforeSend: function(){
                        $('body').waitMe();
                            return true;
                    },
                    success:function(respuesta){
                        if(respuesta == 1){
                            setTimeout(() => {
                                window.location="inicio.php";
                                
                            },4600);
                            setTimeout(() => {
                                $('body').waitMe('hide');
                                alertify.alert("Loque exitoso");
                            },3600);
                            
                        }else{
                            setTimeout(() => {
                                $('body').waitMe('hide');
                            },1200);
                            setTimeout(() => {
                                alertify.alert("Fallo al entrar :(");
                            },1600);
                            
                        }
                    }
                }).always(function(){
                    
                
            });
    });	
}
////////////////////////////// CRUD - ADMINISTRADOR
function addUser()
{
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
             type: "POST",
             async:true,
             url:"funciones/registro.php",
             data: {
                cmd : 'add',
                id    : $("#id").val(), 
                nombre: $('#nombre').val(),
                apellido:$('#apellido').val(),
                usuario:$('#usuario').val(),
                password:$('#password').val()
             },
             success: function (respuesta) {
                console.log(respuesta);
                 loadData();
                 $('#nombre').val(''),
                 $('#apellido').val(''),
                 $('#usuario').val(''),
                 $('#password').val('')
                 if(respuesta == 2){
                     alertify.alert("Este usuario ya existe, prueba con otro :)");
                 }
                 else if(respuesta == 3){
                     
                    Swal.fire(
                        'Actualizado con exito!',
                        'Exelente!',
                        'success'
                      )
                 }
                 else if(respuesta == 1){
                     
                    Swal.fire(
                        'Agregado con exito!',
                        'Exelente!',
                        'success'
                      )
                 }else{
                     
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Algo salio mal!'
                      })



                 }
             },
             error: function (request, status, error) {
                     alert(request.responseText);
                 }
         });
         
     $('.close').click(); 	
} 
function loadData()
{
         $.ajax({
             type: "GET",
             async:true,
             url:"funciones/registro.php",
             data: {
                 cmd : 'load_data'
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
                             '<td>'+dataArr[i].usuario+'</td>'+
                             '<td>'+dataArr[i].password+'</td>'+
                             '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" onClick="showEditor('+dataArr[i].id+');" ><i class="fas fa-pencil-alt"></i></button></p></td>'+
                             '<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-sm" data-title="Delete" data-toggle="modal" data-target="#delete" onClick="setDeletedId('+dataArr[i].id+');" ><i class="fas fa-trash-alt"></i></button></p></td>'+
                             '<input type="hidden" id="delete_id">'+
                             '</tr>';
                 }
                       
                 $("#id_body").html(str);	  
                       
             },
             error: function (request, status, error) {
                     alert(request.responseText);
                 }
         });
         
    
}
function setDeletedId(id){
    $("#delete_id").val(id);

    console.log(id);

    Swal.fire({
        title: 'Estás seguro?',
        text: "No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí,borralo!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                async:true,
                url:"funciones/registro.php",
                data: {
                    cmd : 'delete',
                    id: $("#delete_id").val()
                },
                success: function (results) {
                    loadData();
                },
                error: function (request, status, error) {
                        alert(request.responseText);
                    }
            });
          Swal.fire(
            'Eliminado!',
            'Su archivo ha sido eliminado.',
            'success'
          )
        }
      })
}

function showEditor(id)
{
    $("#id").val(id);
    
    $.ajax({
             type: "GET",
             async:true,
             url:"funciones/registro.php",
             data: {
                 cmd : 'edit',
                 id  : $("#id").val() 
             },
             success: function (results) {
                 dataArr = JSON.parse(results); 
                 $("#nombre").val(dataArr[0].nombre);
                 $("#usuario").val(dataArr[0].usuario);
                 $("#apellido").val(dataArr[0].apellido);
                 //$("#password").val(dataArr[0].password);
                 //Se comento porque deque sirve cambiar la contra encryptada mejor desde 0 no mas
                 $('#password').val('');
                 
             },
             error: function (request, status, error) {
                     alert(request.responseText);
                 }
         });
}
////////////////////////////// CRUD - EFECTO

function cargardatos(){  
   
    $.ajax({
            type: "GET",
            async:true,
            url:"funciones/registro.php",
            data: {
                opcion : 'cargar_datos'
            },
            success: function (res) {
               
                //Limpiando los inputs
                $('#nombre_efecto').val('');
                $('#contenido').val('');
                $('#observacion').val('');
                dataArr = JSON.parse(res);
                var str = '';
                $("#id_body1").html(str);
                      
                for(i=0;i<dataArr.length;i++)
                {
                    str += '<tr>'+
                            '<td>'+dataArr[i].nombre_efecto+'</td>'+
                            '<td><pre><code>'+dataArr[i].contenido+'</code></pre></td>'+
                            '<td>'+dataArr[i].observacion+'</td>'+
                            '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" onClick="showEditor1('+dataArr[i].idDocumentacion+');" ><i class="fas fa-pencil-alt"></i></button></p></td>'+
                            '<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-sm" data-title="Delete" data-toggle="modal" data-target="#delete" onClick="setDeletedId1('+dataArr[i].idDocumentacion+');" ><i class="fas fa-trash-alt"></i></button></p></td>'+
                            '<input type="hidden" id="delete_id1">'+
                          '</tr>';
                }
                      
                $("#id_body1").html(str);
                numeracion();	   
            },
            error: function (request, status, error) {
                    alert(request.responseText);
                }
        });
}
function numeracion() {
    var pre = document.getElementsByTagName('pre'),
        pl = pre.length;
    for (var i = 0; i < pl; i++) {
        pre[i].innerHTML = '<span class="line-number"></span>' + pre[i].innerHTML + '<span class="cl"></span>';
        var num = pre[i].innerHTML.split(/\n/).length;
        for (var j = 0; j < num; j++) {
            var line_num = pre[i].getElementsByTagName('span')[0];
            line_num.innerHTML += '<span>' + (j + 1) + '</span>';
        }
    }
}
function agregarDatos()
        {	
         
         //Este es el truco:
         //https://www.youtube.com/watch?v=wsMklWBQhm4
         var hola = $("#contenido").val();
         
         ra = hola.replace(/</g,'&lt;');
         re = ra.replace(/>/g,'&gt;');
 
         $.ajax({
             type: "GET",
             async:true,
             url:"funciones/registro.php",
             data: {
                 opcion : 'agregar',
                 nombre_efecto : $("#nombre_efecto").val(),
                 contenido  : re,
                 observacion : $("#observacion").val(),
                 id         : $("#id").val() 
             },
             success: function (results) {
                Swal.fire(
                    'Agregado con exito!',
                    'Exelente!',
                    'success'
                  )
                 cargardatos();
                 
             },
             error: function (request, status, error) {
                     alert(request.responseText);
                     
                 }
         });
         
     $('.close').click(); 	
}
function setDeletedId1(id){
    $("#delete_id1").val(id);
  
    Swal.fire({
        title: 'Estás seguro?',
        text: "No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí,borralo!'
      }).then((result) => {
        if (result.isConfirmed) {
            console.log("aqui ira el ajax?????????? estamos en sweetalert2");


            $.ajax({
                type: "GET",
                async:true,
                url:"funciones/registro.php",
                data: {
                    opcion : 'borrar',
                    id: $("#delete_id1").val()
                },
                success: function (results) {
                    console.log(results);
                    cargardatos();
                },
                error: function (request, status, error) {
                        alert(request.responseText);
                    }
            });
          Swal.fire(
            'Eliminado!',
            'Su archivo ha sido eliminado.',
            'success'
          )
        }
      })
}
function showEditor1(id)
{
    $("#id").val(id);

    $.ajax({
                type: "GET",
                async:true,
                url:"funciones/registro.php",
                data: {
                    opcion : 'editar',
                    id         : $("#id").val() 
                },
                success: function (results) {
                    if(results == 0){
                        //console.log("funciona");
                    }else{
                     
                     
                     //ra = hola.replace(/</g,'&lt;');
                     //re = ra.replace(/>/g,'&gt;');

                     dataArr = JSON.parse(results); 
                     $("#nombre_efecto").val(dataArr[0].nombre_efecto);
                     $("#contenido").val(dataArr[0].contenido);
                     $("#observacion").val(dataArr[0].observacion);

                     var transformer = $("#contenido").val();
                     pra = transformer.replace(/&lt;/g,'<');
                     pre = pra.replace(/&gt;/g,'>');
                     
                     $("#contenido").val(pre);
                 }
                 
             },
             error: function (request, status, error) {
                     alert(request.responseText);
                 }
         });

}



////////////////////////////// LLAMANDO A LAS FUNCIONES
entrarSistema();
loadData();
cargardatos();

