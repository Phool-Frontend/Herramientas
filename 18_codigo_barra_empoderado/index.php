<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Como debe quedar mi APP</title>
</head>
<!-- Boostrap css-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<body>

<style>
    
    [data-venta_pro]{
        background: revert!important;
        border: revert!important;
    }

    button.btn.btn-danger.btn-sm {
        border: none;
        cursor: pointer;
    }
    button.btn.btn-primary.btn-sm{
        border: none;
        cursor: pointer;
    }
    #buscador_pro_2{
        display:none;
    }

    fieldset{
        border: solid 2px transparent;
    }
    table, th, td {
            border: 1px solid black;
            color: white;
            width: 100%;
            font-weight: bold;
            text-transform: uppercase;
        }
        body{
            background-image: linear-gradient(to right,#355C7D,#6C5B7B,#C06C84);
        }
    #label_codigo_venta,#nombre_pro_venta{
        display: none;
    }
    #buscador_pro_2{
        width:80%;
        padding:7px;
      
        margin: 0 auto;
    }
    #buscador_pro{
        display:none;
        width:80%;
        padding:7px;
        display:flex!important;
        justify-content: center;
        align-items:center;
        margin: 0 auto;
    }
    #vista_registro{
        display:none;
    }
    #vista_listar{
        display:none;
    }
    #vista_vender{  
        display:none;
    }
    .emo_menu input{
        padding: 10px;
        width: 80%;
        margin-bottom: 4vh;
    }
    .emo_menu{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 100%;
        border: solid 2px gold;
        height: auto;
        margin: 30vh auto;
        padding-top: 4vh;
    }
    table, th, td {
        border: 1px solid black;
        color: black;
        width: 100%;
        font-weight: bold;
        text-transform: uppercase;
        text-align: center;
    }
    .contenedor_celular h2{
        text-align: center;
    }
    input#valor_pex {
        padding: 6px;
        width: 100%;
        margin-bottom: 2vh;
    }

    .mensaje_cel,.mensaje_cel_2{
        width: 100%;
        height: 8vw;
        background-color:greenyellow;
        color: white;
        font-weight: 800;
        display: none;
        text-align: center;
        font-size: 6vw;
    }
    .contenedor_celular,.contenedor_celular_2{
        display: none;
        margin: 0 auto;
    }
    .codicional_camara{
        display: none;
    }
    .filete{
        margin:0 auto;
        width:70%;
        padding:20px;
        display:flex;
        flex-wrap: wrap;
        background: oldlace;
    }
    .cajita{
        width:98%;
        padding:6px;
        margin-bottom: 16px;
    }
    .txt_barra{
        display: none;
    }
    .cajita_barra{
        width:98%;
        padding:6px;
        display:none;
    }
    .boton-form{
        width: 60%;
        padding: 6px;
        margin: 10px auto 0 auto;
        display: block;
    }
    .codicional{
        margin: 0 auto;
        width: 100%;
    }
    .label_duro {
    display:none; 
    padding: 10px;
    border: solid 2px red;
    background: gold;
    }
    .espacito{
        margin:23px;
    }
    /******************************************  ESTILOS DE LA CAMARA DE EDTEAM *****************************************************************/
        #contenedor video,#contenedor_2 video{
            /*max-width: 100%;*/
            width: 100%!important;
            height:20vh!important;
        }
        #contenedor,#contenedor_2{
            max-width: 100%;
            position:relative;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        canvas{
            max-width: 100%;
        }
        canvas.drawingBuffer{
            position:absolute;
            top:0;
            left:0;
        }
        
</style>


<div class="emo_menu">
    <input type="button" value="Registrar producto" onclick="vista_registro()">
    <input type="button" value="Listar Producto"    onclick="vista_listar()">
    <input type="button" value="Vender producto"    onclick="vista_vender()">
</div>




<fieldset id="vista_registro" class="filete" >
    <div class="contenedor_de_registro">
                <center><h2>Lectura de codigo de barra</h2></center>
                <legend>Registrar Producto</legend>
                <label for="">Ingrese Nombre</label>
                <input type="text" name="" id="nombre_pro" class="cajita">

                <label for="">Ingrese Precio</label>
                <input type="text" name="" id="precio_pro" class="cajita">

                <label for="">Ingrese Cantidad</label>
                <input type="text" name="" id="cantidad_pro" class="cajita">

                <div class="codicional">
                        <label for="cbox1">Usar codigo de barra del producto?</label>
                        <p>
                            <input type="radio" name="color" id="si_tengo">
                                <label for="si_tengo">SI</label>
                            <input type="radio" name="color" id="no_tengo">
                                <label for="no_tengo">NO</label>
                        </p>
                </div>
                <div class="codicional_camara">
                        <label for="cbox1">Pistola o Celular?</label>
                        <p>
                            <input type="radio" name="color" id="pistola">
                                <label for="pistola">Pistola</label>
                            <input onclick="activar_camara_cel()" type="radio" name="color" id="celular">
                                <label for="celular">Celular</label>
                        </p>
                </div>     

                <label class="txt_barra" for="">Codigo de barra capturado</label>
                <input type="text" name="" id="codigo_barra" class="cajita_barra" disabled>
                <center class="espacito"><label class="label_duro">Codigo automatico...</label></center>

                <button onclick="enviar_datos()" class="boton-form">Registrar</button>
    </div><!--.contenedor_de_registro-->

    <div class="contenedor_celular">
                <h2>Captando codigo!!!</h2>
               
                
                <input type="text" id="valor_pex" disabled>    
                
                
    </div>
    
    
    <div id="contenedor">
            <div class="element"></div>
            <div class="preloader-scan">
  <ul>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    
    <div class="diode">
      <div class="laser"></div>
    </div>
  </ul>
  
    </div>
            <div id="what">
                <div class="caja1"></div>
                <div class="caja2"></div>
                <div class="caja3"></div>
                
                
                <div class="caja4"></div>
                <div class="caja5"></div>
                <div class="caja6"></div>

                <div class="caja7"></div>
                <div class="caja8"></div>
                <div class="caja9"></div>
            </div>
    </div>
    <div class="mensaje_cel"></div>           
    

</fieldset>


<fieldset id="vista_listar">
    <div class="contenedor_de_registro">
    <center><h2>Listando codigo de barra</h2></center>

    <table id="mytable" class="table table-bordred table-striped">
          <thead>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Codigo_barra</th>
                <th>Editar</th>
                <th>Borrar</th>
          </thead>
          <tbody id="id_body">
          </tbody>
    </table>

    
</fieldset><br><br><br>



<fieldset id="vista_vender">
    <div class="contenedor_de_registro_2">
        <center><h2>Comprar con codigo </h2></center>
        <label for="label_codigo_venta" id="label_codigo_venta">Ingrese codigo:</label>
        <input type="text" name="" id="nombre_pro_venta" class="cajita" autofocus="autofocus"/>
        <div class="codicional_camara_2">
                            <label for="cbox1">Pistola o Celular?</label>
                            <p>
                                <input type="radio" name="color" id="pistola_venta_2" >
                                    <label for="pistola_venta_2">Pistola</label>
                                <input onclick="activar_camara_cel_2()" type="radio" name="color" id="celular_venta_2">
                                    <label for="celular_venta_2">Celular</label>
                            </p>

                                
    </div> 

    <input onclick="evaluar_codigo()" type="submit" id="buscador_pro_2"  value="Buscar"> 
    

    <hr>
    <table id="mytable_venta" class="table table-bordred table-striped" style="display:none">
        <thead>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Accion</th>
        </thead>
        <tbody id="id_body_venta">
        </tbody>
    </table>

    <!-- Activando camara para hacer la transaccion--->
    
                
  
    
    <div id="contenedor_2"></div>
    <div class="mensaje_cel_2"></div>

</fieldset>





<!---agregar new-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input class="form-control " type="text"  id="nombre_edi" placeholder="nombre">
        </div>
        <div class="form-group">
          <input class="form-control " type="text" id="precio_edi" placeholder="precio">
        </div>
        <div class="form-group">
          <input class="form-control " type="text" id="cantidad_edi" placeholder="cantidad">
        </div>
        <div class="form-group">
          <input class="form-control " type="text" id="barra_edi" placeholder="codigo barra">
        </div>
      </div>
      <div class="modal-footer ">
        <input type="hidden" id="id">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" onClick="agregar()"><span class="glyphicon glyphicon-ok-sign"></span>Actualizar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>

    //Ejemplo de click cn funcion anonima y dentro show y hide
    [].forEach.call( document.querySelectorAll( '#si_tengo' ), function ( a ) {
        a.addEventListener( 'click', function ( e ) {
            
            document.querySelectorAll(".codicional").forEach(box =>{ box.style.display = "none"});
            document.querySelectorAll(".codicional_camara").forEach(box =>{ box.style.display = "block"});

            e.preventDefault();
        }, false );
    });

    [].forEach.call( document.querySelectorAll( '#no_tengo' ), function ( a ) {
        a.addEventListener( 'click', function ( e ) {
            

            document.querySelectorAll(".codicional").forEach(box =>{ box.style.display = "none"});
            document.querySelectorAll(".label_duro").forEach(box =>{ box.style.display = "block"});


            e.preventDefault();
        }, false );
    });

    [].forEach.call( document.querySelectorAll( '#pistola' ), function ( a ) {
        a.addEventListener( 'click', function ( e ) {
            

            document.querySelectorAll(".codicional_camara").forEach(box =>{ box.style.display = "none"});
            document.querySelectorAll(".txt_barra").forEach(box =>{ box.style.display = "block"});
            document.querySelectorAll(".cajita_barra").forEach(box =>{ box.style.display = "block"});

            document.querySelectorAll(".codicional_camara").forEach(box =>{ box.style.display = "none"});
            document.querySelectorAll(".txt_barra").forEach(box =>{ box.style.display = "block"});
            document.querySelectorAll(".cajita_barra").forEach(box =>{ box.style.display = "block"});
            document.getElementById("codigo_barra").disabled = false;
         


            e.preventDefault();
        }, false );
    });

    [].forEach.call( document.querySelectorAll( '#pistola_venta_2' ), function ( a ) {
        a.addEventListener( 'click', function ( e ) {
            

            document.querySelectorAll("#label_codigo_venta").forEach(box =>{ box.style.display = "block"});
            document.querySelectorAll("#nombre_pro_venta").forEach(box =>{ box.style.display = "block"});
            document.querySelectorAll("#buscador_pro_2").forEach(box =>{ box.style.display = "block"});
            document.querySelectorAll(".codicional_camara_2").forEach(box =>{ box.style.display = "none"});

            e.preventDefault();
        }, false );
    });


    [].forEach.call( document.querySelectorAll( '#celular' ), function ( a ) {
        a.addEventListener( 'click', function ( e ) {
            
            document.querySelectorAll(".contenedor_de_registro").forEach(box =>{ box.style.display = "none"});
            document.querySelectorAll(".contenedor_celular").forEach(box =>{ box.style.display = "block"});
        
            e.preventDefault();
        }, false );
    });


    [].forEach.call(document.querySelectorAll('#no_tengo'),function(a) {
        a.addEventListener('click',function(e){
            
            var cod_barra_seteado = document.getElementById("codigo_barra").value;
        

            if(cod_barra_seteado == ''){
                //console.log('Tratar los datos');

                //captando hora
                var currentdate = new Date();
                var fecha_D_M_A   =   currentdate.getDate()+ "" +(currentdate.getMonth()+1) + "" +currentdate.getFullYear();
                var hora_H_M  = currentdate.getHours() + "" + currentdate.getMinutes();

                ///////////// Tratar los datos ///////////////////
    
                cod_barra_seteado = hora_H_M+fecha_D_M_A;

            
                document.getElementById("no_tengo").value = cod_barra_seteado;
                //inputNombre.value = "DYP"; ---> Este deberia haber insertado valor al input pero el de arriba dio

            }else{
                console.log('No hacer nada xd');
            }


        
        e.preventDefault();
        },false);
    });


    [].forEach.call(document.querySelectorAll('#celular_venta_2'),function(a) {
        a.addEventListener('click',function(e){
            
           
            document.querySelectorAll(".codicional_camara_2").forEach(box =>{ box.style.display = "none"});
        
        e.preventDefault();
        },false);
    });
  
    //Focus para registrar producto
    document.getElementById("pistola").onclick = function(){
        document.getElementById("codigo_barra").focus();
    }

    //Focus gozu vender producto
    document.getElementById("pistola_venta_2").onclick = function(){
        document.getElementById("nombre_pro_venta").focus();
    }
</script>
<!--************************************************* COPY CODIGO DE BARRA  *********-->
    

<script src="js/quagga.min.js"></script>

<script>

    function suena_maquinita() {
        var sonido_correcto_barra = new  Audio("sonido/barcode.wav");  
        sonido_correcto_barra.play();
    }

    function suena_error(){
        var sonido_error = new  Audio("sonido/error.mp4");  
        sonido_error.play();
    }

    function activar_camara_cel(){      
        console.log("Ya chapa");
        document.querySelectorAll("#what").forEach(box =>{ box.style.display = "flex"});
        document.querySelectorAll(".element").forEach(box =>{ box.style.display = "block"});
        document.querySelectorAll(".preloader-scan").forEach(box =>{ box.style.display = "table"});
        
        Quagga.init({
                    inputStream: {
                        constraints: {
                            width: 1920,
                            height: 1080,
                        },
                        name: "Live",
                        type: "LiveStream",
                        target: document.querySelector('#contenedor'), // Pasar el elemento del DOM
                    },
                    decoder: {
                        readers: ["ean_reader"]
                    }
                }, function (err) {
                    if (err) {
                        console.log(err);
                        // Sonido de error de prueba
                        sonido_error.play();
                        return
                    }
                    console.log("Iniciado correctamente");
                    Quagga.start();
                });
                Quagga.onDetected((data) => {
                    suena_maquinita();
                    var hola = data.codeResult.code;
                    // Imprimimos todo el data para que puedas depurar
                    document.querySelectorAll(".laser").forEach(box =>{ box.style.background = "green"});
                    console.log(data);
                    llamada_pro(hola);
                });
    }

    function emo_infinito(){
        var myAudio = new Audio('https://opengameart.org/sites/default/files/audio_preview/swing_0.mp3.ogg'); 
        myAudio.addEventListener('ended', function() {
            this.currentTime = 0;
            this.play();
        }, false);
        myAudio.play();
    }

    /////////////////////////// Ahora biene lo bueno //////////////////////
    //Esta funcion hace todo lo que pasara luego de que lea el codigo de barra en el cel
    function llamada_pro(hola){
                
                document.getElementById("valor_pex").value = hola;
                document.querySelectorAll("#contenedor").forEach(box =>{ box.style.display = "none"});
                var mensaje_succes = '<h2 style="font-size:smaller">Codigo detectado...</h2>';
                document.getElementsByClassName("mensaje_cel")[0].innerHTML = mensaje_succes;
                document.querySelectorAll(".mensaje_cel").forEach(box =>{ box.style.display = "block"});
        
                
                //Meter esto en un timeout de 3 segundos
                setTimeout(function(){ 
                     limpia_camara_barra(hola);
                },2500);
    }

    function limpia_camara_barra(hola){

        document.querySelectorAll(".contenedor_celular").forEach(box =>{ box.style.display = "none"});
        document.querySelectorAll(".contenedor_de_registro").forEach(box =>{ box.style.display = "block"});
        document.querySelectorAll(".codicional_camara").forEach(box =>{ box.style.display = "none"});
        document.querySelectorAll(".txt_barra").forEach(box =>{ box.style.display = "block"});

        //Metemos el valor del otro input a este input :v
        document.querySelectorAll(".cajita_barra").forEach(box =>{ box.style.display = "block"});
        document.getElementsByClassName("cajita_barra")[0].value = hola;
       
    }
    
    function enviar_datos(){
           
            var cod_barra_seteado = document.getElementById('no_tengo').value;
            var cod_barra         = document.getElementById('codigo_barra').value;
  
            //console.log(cod_barra_seteado);
            //console.log(cod_barra);
            if(cod_barra_seteado == 'on'){
                //console.log("SI hay cod de barra");
                var confirma = 'si';
                console.log(cod_barra);
                clasificando_barra(cod_barra,confirma);
               
            }else{
                //console.log("No hay cod de barra");
                var confirma = 'no';
                console.log(cod_barra_seteado);
                clasificando_barra(cod_barra_seteado,confirma);
            }

            //console.log(codigo_barra);
            Swal.fire({
                title: '<i class="far fa-laugh" style="font-size:100px;color:blue!important)"></i>',
                text: 'Se agrego correctamente!'
            })
         
    }

    function clasificando_barra(cod_barra,confirma) {
                console.log(confirma);

                var opcion      = 'agregar';
                var nombre      =  document.getElementById("nombre_pro").value;
                var precio      =  document.getElementById("precio_pro").value;
                var cantidad    =  document.getElementById("cantidad_pro").value;
                //var id_producto =  document.getElementById("id_producto").value;
            

                 let datos = new FormData();
                 datos.append('opcion',opcion),
                 datos.append('nombre',nombre),
                 datos.append('precio',precio),
                 datos.append('cantidad',cantidad),
                 datos.append('codigo_barra',cod_barra),
                 datos.append('confirma',confirma)
                 //datos.append('id_producto',id_producto)
             
                 
 
                 fetch('crud.php', {
                   method: 'POST',
                   body: datos
                 })
                 .then(function(response) {
                   if(response.ok) {
                       return response.text()
                   } else {
                       throw "Error en la llamada Ajax";
                   }
 
                 })
                 .then(function(texto) {
                   //console.log(texto);
                   //verificacion_r(texto);
                 })
                 .catch(function(err) {
                   console.log(err);
                 });
        
    }

    function vista_registro(){
        document.querySelectorAll("#vista_registro").forEach(box =>{ box.style.display = "block"});
        document.querySelectorAll(".emo_menu").forEach(box =>{ box.style.display = "none"});
    }

    function vista_listar(){
        document.querySelectorAll("#vista_listar").forEach(box =>{ box.style.display = "block"});
        document.querySelectorAll(".emo_menu").forEach(box =>{ box.style.display = "none"});
        llamando_productos();
    }

    function vista_vender(){
        document.querySelectorAll("#vista_vender").forEach(box =>{ box.style.display = "block"});
        document.querySelectorAll(".emo_menu").forEach(box =>{ box.style.display = "none"});
        document.querySelectorAll(".codicional_camara").forEach(box =>{ box.style.display = "block"});



        [].forEach.call( document.querySelectorAll('#pistola_venta'),function (a) {
            a.addEventListener( 'click', function (e){
                        document.querySelectorAll("#nombre_pro_venta").forEach(box =>{ box.style.display = "block"});
                        document.querySelectorAll("#label_codigo_venta").forEach(box =>{ box.style.display = "block"});
                        document.querySelectorAll(".codicional_camara").forEach(box =>{ box.style.display = "hide"});

                        [].forEach.call( document.querySelectorAll( '.codicional_camara' ), function ( a ) {
                            a.addEventListener( 'click', function ( e ) {
                                document.querySelectorAll("#buscador_pro_2").forEach(box =>{ box.style.display = "block"});
                                evaluar_codigo(); 
                            e.preventDefault();
                            }, false );
                        });

                e.preventDefault();
            }, false );
        });

        [].forEach.call( document.querySelectorAll('#celular_venta_2'), function (a) {
            a.addEventListener('click',function(e){
            
            document.querySelectorAll(".codicional_camara").forEach(box =>{ box.style.display = "none"});
            document.querySelectorAll("#buscador_pro_2").forEach(box =>{ box.style.display = "none"});
            document.querySelectorAll("hr").forEach(box =>{ box.style.display = "none"});
            document.querySelectorAll("#nombre_pro_venta").forEach(box =>{ box.style.display = "block"});
            document.getElementById("nombre_pro_venta").disabled = true;

            e.preventDefault();
            }, false );
        });

        


    }
   
    function evaluar_codigo(){
    
            var valor_input   =   document.getElementById("nombre_pro_venta").value;

                 let datos = new FormData();
                 datos.append('opcion','venta_producto'),
                 datos.append('buscar_pro_ma',valor_input)
               
                 fetch('crud.php', {
                   method: 'POST',
                   body: datos
                 })
                 .then(function(response) {
                   if(response.ok) {
                       return response.text()
                   } else {
                       throw "Error en la llamada Ajax";
                   }
 
                 })
                 .then(function(resultado) {
                                dataArr = JSON.parse(resultado); 
                                var str = '';
                                for(i=0;i<dataArr.length;i++)
                                {
                                //`Con esto vale verga las demas comillas este es el REY`
                                str += '<tr>'+
                                    '<td>'+dataArr[i].nombre+'</td>'+
                                    '<td>'+dataArr[i].precio+'</td>'+
                                    '<td>'+dataArr[i].cantidad+'</td>'+
                                    '<td><button class="btn btn-primary btn-sm" data-venta_pro='+dataArr[i].id_producto+'  onClick="vender_pro('+dataArr[i].id_producto+');" >Vender</button></td>';  
                                }  
                                var injectando_resultado = document.getElementById("id_body_venta");
                                injectando_resultado.insertAdjacentHTML('beforebegin', str);
                                document.querySelectorAll("#mytable_venta").forEach(box =>{ box.style.display = "block"});
                 })
                 .catch(function(err) {
                   console.log(err);
                 });           
          
    }
  
    function vender_pro(valor){
        console.log(valor);
        document.querySelectorAll("tbody").forEach(box =>{ box.style.display = "none"});
    }

    function activar_camara_cel_2(){      
        console.log("Ya chapa");
        Quagga.init({
                    inputStream: {
                        constraints: {
                            width: 1920,
                            height: 1080,
                        },
                        name: "Live",
                        type: "LiveStream",
                        target: document.querySelector('#contenedor_2'), // Pasar el elemento del DOM
                    },
                    decoder: {
                        readers: ["ean_reader"]
                    }
                }, function (err) {
                    if (err) {
                        console.log(err);
                        // Sonido de error de prueba
                        sonido_error.play();
                        return
                    }
                    console.log("Iniciado correctamente en camara_cel_2");
                    Quagga.start();
                });
                Quagga.onDetected((data) => {
                    suena_maquinita();
                    var hola = data.codeResult.code;
                    // Imprimimos todo el data para que puedas depurar
                    console.log(data);
                    llamada_pro_2(hola);
                });
    }

    function llamada_pro_2(hola){
     
                document.getElementById("nombre_pro_venta").value = hola;
              
                var mensaje_succes = '<h2 style="font-size:smaller">Codigo detectado...</h2>';
                document.getElementsByClassName("mensaje_cel_2")[0].innerHTML = mensaje_succes;
                document.querySelectorAll(".mensaje_cel_2").forEach(box =>{ box.style.display = "block"});
              
                //Meter esto en un timeout de 3 segundos
                setTimeout(function(){ 
                     limpia_camara_barra_2(hola);
                },2500);
    }

    function limpia_camara_barra_2(hola){
        
        /*ECHO POR MI LO DEMAS ES COPÌA Y NO PAGA*/
        document.querySelectorAll("#contenedor_2").forEach(box =>{ box.style.display = "none"});
        document.querySelectorAll("#label_codigo_venta").forEach(box =>{ box.style.display = "block"});
        document.querySelectorAll("#buscador_pro_2").forEach(box =>{ box.style.display = "block"});
        document.querySelectorAll(".mensaje_cel_2").forEach(box =>{ box.style.display = "none"});

    }

    function llamando_productos(){
                        var opcion     =   'mostrar';
                        var nombre     =   document.getElementById("nombre_pro").value;
                        var precio     =   document.getElementById("precio_pro").value;     
                        var cantidad   =   document.getElementById("cantidad_pro").value;

                        let datos = new FormData();
                        datos.append('opcion',opcion),
                        datos.append('nombre',nombre),
                        datos.append('precio',precio),
                        datos.append('cantidad',cantidad)

                        fetch('crud.php', {
                        method: 'POST',
                        body: datos
                        })
                        .then(function(response) {
                        if(response.ok) {
                            return response.text()
                        } else {
                            throw "Error en la llamada Ajax";
                        }

                        })
                        .then(function(results) {
                        

                        dataArr = JSON.parse(results); 
                        var str = '';
                      
                


                        for(i=0;i<dataArr.length;i++)
                        {
                        //`Con esto vale verga las demas comillas este es el REY`
                        str += '<tr>'+
                            '<td>'+dataArr[i].nombre+'</td>'+
                            '<td>'+dataArr[i].precio+'</td>'+
                            '<td>'+dataArr[i].cantidad+'</td>'+
                            '<td><img width="100%" id="barcode'+dataArr[i].codigo_barra+'"></td>'+
                            '<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-sm" data-title="Edit" data-toggle="modal" data-target="#edit" onClick="editar('+dataArr[i].id_producto+');" ><i class="fas fa-pencil-alt"></i></button></p></td>'+
                            '<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-sm" data-title="Delete" data-toggle="modal" data-target="#delete" onClick="borrar('+dataArr[i].id_producto+');" ><i class="fas fa-trash-alt"></i></button></p></td>'+
                            '<input type="hidden" id="delete_id">'+
                            '</tr>';
                        }  
                        //Insertando respuestas del for 
                        var injectando_resultado = document.getElementById("id_body");
                        injectando_resultado.innerHTML = str;
                       


                        var barras = [];
                        for(i=0;i<dataArr.length;i++)
                        {
                            barras.push(dataArr[i].codigo_barra);
                        }
                        //console.log(barras);
                        for (let i = 0; i < barras.length; i++){
                            JsBarcode("#barcode" + barras[i], barras[i].toString(),{
                                format: "codabar",
                                lineColor: "#000",
                                width:2,
                                hight:30,
                                displayValue:true
                            });
                            
                        }
                            
                        })
                        .catch(function(err){
                        //console.log(err);
                    });

            
    }

    function editar(id){
            //document.querySelectorAll(".modal-backdrop.show").forEach(box =>{ box.style.opacity = "0"});
            //document.querySelectorAll(".modal.fade.show").forEach(box =>{ box.style.display = "block"});
            //document.querySelectorAll(".modal-backdrop").forEach(box =>{ box.style.position = "fixed"});

        document.getElementById("id").value = id;
            let datos = new FormData();
            datos.append('opcion','editar'),
            datos.append('id',id),

            fetch('crud.php', {
            method: 'POST',
            body: datos
            })
            .then(function(response) {
            if(response.ok) {
                return response.text()
            } else {
                throw "Error en la llamada Ajax";
            }
            })
            .then(function(results) {
                    if(results == 0){
                        console.log("Es nuevo el dato adelante agregar"); 
                        //Limpiamos los inputs
                        
                    }else{
                            dataArr = JSON.parse(results); 
                            console.log(dataArr);
                            $("#nombre_edi").val(dataArr[0].nombre);
                            $("#precio_edi").val(dataArr[0].precio);
                            $("#cantidad_edi").val(dataArr[0].cantidad);
                            $("#barra_edi").val(dataArr[0].codigo_barra);
                    }
            })
            .catch(function(err) {
            console.log(err);
            });



            
    }
    
    function agregar(){
            let datos = new FormData();
            datos.append('opcion'   ,   'agregar'),
            datos.append('nombre'   ,   document.getElementById("nombre_edi").value),
            datos.append('precio'   ,   document.getElementById("precio_edi").value),
            datos.append('cantidad' ,   document.getElementById("cantidad_edi").value),
            datos.append('barra_edi',   document.getElementById("barra_edi").value),
            datos.append('id',document.getElementById("id").value),

            fetch('crud.php', {
            method: 'POST',
            body: datos
            })
            .then(function(response) {
            if(response.ok) {
                return response.text()
            } else {
                throw "Error en la llamada Ajax";
            }
            })
            .then(function(texto) {
                console.log(texto);
                llamando_productos();
            })
            .catch(function(err) {
            console.log(err);
            });	
            $('.close').click(); 
       
            
            
    }
    

    function borrar(id){

        var opcion      = 'borrar';

        let datos = new FormData();
        datos.append('opcion',opcion),
        datos.append('id_producto',id),


        

        fetch('crud.php', {
        method: 'POST',
        body: datos
        })
        .then(function(response) {
        if(response.ok) {
            return response.text()
        } else {
            throw "Error en la llamada Ajax";
        }
        })
        .then(function(texto) {
            console.log(texto);
            llamando_productos();
       
        })
        .catch(function(err) {
        console.log(err);
        });

    }
    	
                
////////////////////////////////////////// TERMINADO TODO ESTA CON Javascript Vainilla ///////////////////////////////////////
</script>



<style>
    
        .element {
                position: absolute;
                background: rgba(0,0,0,0.3);
                display: none;
                -webkit-clip-path: polygon(0% 0%, 0% 100%, 25% 100%, 25% 25%, 75% 25%, 75% 75%, 25% 75%, 25% 100%, 100% 100%, 100% 0%);
                clip-path: polygon(0% 0%, 0% 100%, 10% 100%, 10% 16%, 90% 16%, 90% 84%, 0% 84%, 0% 100%, 100% 100%, 100% 0%);
            }
</style>


<style>
        div#what {
            width: 90%;
            height: auto;
            display: flex;
            flex-wrap: wrap;
            margin: 0px auto;
            position: absolute;
            max-width: 100%;
            max-height: 100vh;
            display:none;
        }

        .caja1 {
            background: red;
            height: 50%;
            border-left: 0.3rem white solid;
            border-top: 0.3rem solid white;
            background: transparent;
        }
        .caja2{
            background:blue;
            height:50%;
            
            
        }
        .caja3{
            background:gold;
            height:50%;
            border-right:0.3rem  solid white;
            border-top:0.3rem  solid white;
            background: transparent;
        }
        .caja4{
            background:green;
            height:50%;
            
            
        }
        .caja5{
            background:aqua;
            height:50%;
            
        }
        .caja6{
            background:skyblue;
            height:50%;
            
            
        }
        .caja7{
            background:tan;
            height:50%;
            border-left:0.3rem  white solid;
            border-bottom:0.3rem  solid white;
            background: transparent;
            
        }
        .caja8{
            background:blueviolet;
            height:50%;
        
            
        }
        .caja9{
            background:rosybrown;
            height:50%;
            border-right:0.3rem  white solid;
            border-bottom:0.3rem  solid white; 
            background: transparent;
        }

        .caja1, .caja2, .caja3, .caja4, .caja5, .caja6, .caja7, .caja8, .caja9 {
            width: 31%;
            height: 8vw;
            background: transparent;
            margin: 0 auto;
        }

        /*
                POR LOS 619PX se empieza a distrocionar la camara osea se encoge

                600PX ESTA GOZU PARA DARLE DURO   QUEDA AHI METER SU MEDIA QUERY
        */
        @media all and (max-width: 580px) {
            body{
                background-color: blue;
            }
            fieldset#vista_registro{
                width:100%!important;
                background:gold;
            }
            #contenedor video{
            /*max-width: 100%;*/
            width:100%!important;
            height:20vh!important;
        }
        }
        #contenedor video {
            width: 450px;
            /* height: 48vh!important; */
}
        @media all and (min-width:600px) {
            body{
                background-color:gold;
            }
            div#what {
                width: 346px;
                height: 165px;
            }
            .caja1, .caja2, .caja3, .caja4, .caja5, .caja6, .caja7, .caja8, .caja9 {
                height: auto;
            }
        }
        @media all and (min-width: 600px) {
            .element{
                width:427px!important;
                height:242px!important;
            }
            
        }
        @media all and (max-width: 600px) {
            .element{
                width: 100%;
                height: 38.5vw;
                -webkit-clip-path: polygon(0% 0%, 0% 100%, 25% 100%, 25% 25%, 75% 25%, 75% 75%, 25% 75%, 25% 100%, 100% 100%, 100% 0%);
                clip-path: polygon(0% 0%, 0% 100%, 6% 100%, 6% 16%, 95% 16%, 95% 84%, 0% 84%, 0% 100%, 100% 100%, 100% 0%);
            }
        }
        /***************** ESCANEADOR ***********************/
        .preloader-scan {
        position: fixed;
        left: 0;
        right: 0;
        max-width: 200px;
        display: none;
        margin: 0 auto;
        height: 100%;
        text-align: center;
        }
        .preloader-scan li:nth-child(1) {
        width: 3px;
        }
        .preloader-scan li:nth-child(2) {
        width: 1px;
        }
        .preloader-scan li:nth-child(3) {
        width: 4px;
        }
        .preloader-scan li:nth-child(4) {
        width: 3px;
        }
        .preloader-scan li:nth-child(5) {
        width: 4px;
        }
        .preloader-scan li:nth-child(6) {
        width: 5px;
        }
        .preloader-scan li:nth-child(7) {
        width: 5px;
        }
        .preloader-scan li:nth-child(8) {
        width: 5px;
        }
        .preloader-scan li:nth-child(9) {
        width: 4px;
        }
        .preloader-scan li:nth-child(10) {
        width: 2px;
        }
        .preloader-scan li:nth-child(11) {
        width: 3px;
        }
        .preloader-scan li:nth-child(12) {
        width: 2px;
        }
        .preloader-scan li:nth-child(13) {
        width: 3px;
        }
        .preloader-scan li:nth-child(14) {
        width: 2px;
        }
        .preloader-scan li:nth-child(15) {
        width: 3px;
        }
        .preloader-scan li:nth-child(16) {
        width: 2px;
        }
        .preloader-scan li:nth-child(17) {
        width: 5px;
        }
        .preloader-scan li:nth-child(18) {
        width: 4px;
        }
        .preloader-scan li:nth-child(19) {
        width: 2px;
        }
        .preloader-scan li:nth-child(20) {
        width: 4px;
        }
        .preloader-scan li:nth-child(21) {
        width: 4px;
        }
        .preloader-scan li:nth-child(22) {
        width: 5px;
        }
        .preloader-scan li:nth-child(23) {
        width: 1px;
        }
        .preloader-scan li:nth-child(24) {
        width: 3px;
        }
        .preloader-scan ul {
        height: 100%;
        display: table-cell;
        vertical-align: middle;
        list-style-type: none;
        text-align: center;
        }
        .preloader-scan li {
        display: inline-block;
        width: 2px;
        height: 50px;
        background-color:transparent;
        }
        .preloader-scan .laser {
            width: 138%;
            margin-left: -38%;
            background-color: tomato;
            height: 4px;
            position: absolute;
            top: 46%;
            z-index: 2;
            box-shadow: 0 0 4px red;
            -webkit-animation: scanning 2s infinite;
            animation: scanning 2s infinite;
        }
        .preloader-scan .diode {
        -webkit-animation: beam 0.01s infinite;
                animation: beam 0.01s infinite;
        }

        body {
        height: 100%;
        }

        @-webkit-keyframes beam {
        50% {
            opacity: 0;
        }
        }

        @keyframes beam {
        50% {
            opacity: 0;
        }
        }
        @-webkit-keyframes scanning {
        50% {
            transform: translateY(75px);
        }
        }
        @keyframes scanning {
        50% {
            transform: translateY(75px);
        }
        }
</style>

<!--***************************** LIBRERIAS ***************************************--->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Boostrap js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!--Barcode libreria-->
<script src="js/barcode-all.js"></script>

<!-- Font owesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

<!--Swit-alert 2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.1/dist/sweetalert2.all.min.js"></script>



