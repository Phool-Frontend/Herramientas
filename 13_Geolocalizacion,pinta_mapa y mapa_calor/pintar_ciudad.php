<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZkaCBIqm-teDz9cogkIxWYR13mjPznyk"></script>
<!--*******************************************************************************************************************************************************-->
<style>
    
  .insertacion_de_coordenadas{
    display: none;
  }
      .manual{
        display:none;
      }
        div#map-canvas {
          width: 90%;
          height: 75vh;
          position: relative;
          overflow: hidden;
          margin: 0 auto;
        }


        body{
        padding: 10px;
        }

        .atencion{
          text-align: center;
          font-size: 3vh;
        }
        .btn-mapas ,.cantidad_graf button,.automatica button,input#pais_region, input#distrito_local,input#link_insertado {
          width: 100%;
          padding: 10px;
          display: block;
      }

      input#cantidad_graf{
          width: 100%;
          padding: 10px;
          display: block;
      }

      legend {
          background: transparent;
          font-weight: 600;
          color: black;
          padding-bottom: 10px;
      }
      fieldset {
          background: #d5de8754;
          border: solid;
          padding: 50px;
      }
      a {
          display: block;
      }
     
      .cargar_data_table{
        display: none;
      }
      #finalizador_perron{
        display:block;
      }
      #agregar_dato{
        display: none;
      }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.12.6/sweetalert2.css" integrity="sha512-sdBlqIXiZQy6Z6WJXrCb6sQ3v1DF0x6qQghP56taypKGGuru3ANBhSFLePvcolfP8xCzVoNvhP8Smm29EH7eMQ==" crossorigin="anonymous" />
<!-- MI METODO NECESITA ARRAY PURO DURO DE MACHO -->
<!-- jsfiddle NECESITA  puro objeto ajax el mas gozu -->

<!--  OPCION 
      - HACER QUE GRAFIQUE MI METODO CON OBJETO JSON
      - OBTENER LA ID DEL CENTRO DE MI METODO DE BUSQUEDA
      - SEGUIR HACIENDO POR MI METODO DURO, PERO AHORA METER ARRAY PUSH PARA QUE ESAS COORDENADAS QUEDEN MAMADISIMAS
-->


<body> 
<!--*************************************** CANTIDAD DE DATOS *************************************************************************************************************-->
<fieldset class="cantidad_graf">    
          <legend>INGRESE LOS SIGUIENTES DATOS:</legend>
          <input type="text"  id="cantidad_graf" placeholder="CUANTOS GRAFICOS DESEA? MAX 10"><br><br>  
          <button onClick="cantidad_graf()">Aceptar</button>
</fieldset>
<!--*************************************** INGRESAR DATA DE MAPA ********************************************************************************************************-->

<div class="insertacion_de_coordenadas">
    <h3 class="atencion">Atencion:El sistema localiza cualquier parte del mundo.Pero solo grafica minimamente distritos, pueblitos NO!</h3>
    <div class="automatica">
      <fieldset>    
          <legend>POR BUSQUEDA:</legend>
          <input type="text"  id="pais_region" placeholder="INGRESE PAIS O REGION"><br>
          <input type="text"  id="distrito_local" placeholder="INGRESE DISTRITO O LOCAL"><br>
          <input type="text"  id="color_mapa" class="btn-mapas" placeholder="COLOR PARA EL MAPA"><br>
          <a onClick="cambiazo()" href="#">No encontraste lo que buscabas?...Haz click aqui</a><br>
          <button onClick="busca_automatica()">Buscar</button>
      </fieldset>
    </div>
    <div class="manual">
      <fieldset>
          <legend>POR URL:</legend>
          <input type="text"  id="link_insertado" placeholder="INGRESE URL Nominatim.openstreetmap"><br>
          <input type="text"  id="color_mapa_2" class="btn-mapas" placeholder="COLOR PARA EL MAPA"><br>
          <button class="btn-mapas" onClick="busca_manual()">Buscar</button>
      </fieldset>
    </div><br><br>
</div>
<!--********************************************************************************************************************************************************************-->

<br><br><button class="btn-mapas" id="finalizador_perron" onClick="mostrar_mapa_final()">Finalizador perro</button><br><br>  

<!---------------------------------------------------------------------------------------->
<div id="map-canvas" style="width:80%; height: 40vh;margin:0 auto"></div><br><br>    
                                

<button id="agregar_dato" onClick="enviar_data_bd()">Agregar mapa</button><br><br>  


<div class="cargar_data_table">
      <h1>AQUI CARGARA LA DATA DE PHP SERVE</h1>
      <table id="mytable">
                              <thead> 
                                      <th>ID</th>
                                      <th>Nombre</th>
                              </thead>

                              <tbody id="id_body">

                              </tbody>

      </table>
</div


</body>
<script>
var boundingbox = [];
var geojson = [];
var caleta = []; 
contador = 0;




function busca_automatica(){
  //console.log(color_mapa);
          $('#map-canvas').show();
          var pais_region     = $('#pais_region').val();
          var distrito_local  = $('#distrito_local').val();
          var color_mapa      = $('#color_mapa').val();
          

          
          var url_dinamica = 'https://nominatim.openstreetmap.org/search.php?q='+pais_region+'/%20'+distrito_local+'&polygon_geojson=1&format=jsonv2';
          //console.log(url_dinamica);
    //////////////////////////////////////////////////////////////////////////////////////////////////
                  $.ajax({
                              url: url_dinamica,
                              type: 'GET',
                              async: true,
                              dataType: 'json',
                              success: function(respuesta){
                                      //console.log(respuesta);
                                      //console.log(  respuesta[0].geojson.coordinates);
                                      if(respuesta == ''){
                                        console.log("Sin resultado de la API");
                                      }else{

                                      clasificador(respuesta,color_mapa);

                                                            Swal.fire({
                                                                title: 'Guardar mapa?',
                                                                text: "Una vez que lo guarde no podra cambiar",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Si'
                                                                }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                  Swal.fire(
                                                                    'Guardado',
                                                                    'Mapa listo para ser usado',
                                                                    'success'
                                                                  )
                                                                  var link_insertado = undefined;
                                                                  enviar_data_bd(pais_region,distrito_local,respuesta,link_insertado,color_mapa);
                                                                  
                                                               }
                                                              
                                                            })//Fin sweetalert2
                                           
                                      }
                                  }//Fin del succes 
                          });//Fin de ajax
}//El que busca en API con palabras
    
function busca_manual(){
  //console.log("Estas en busqueda manu");
  //console.log(color_mapa);
        var link_insertado = $('#link_insertado').val();
        var color_mapa      = $('#color_mapa_2').val();
        

        $.ajax({
                    url: 'controlador_crud.php',
                    type: 'GET',
                    
                    data: {
                          opcion : 'cargar_pinta_mapa',
                          link_insertado : link_insertado,
                          tipo_busqueda:'manual'
                          },
                    dataType: 'json',
                    success: function(respuesta){
                             //console.log(respuesta.geometry.coordinates);
                            //console.log(respuesta[0].geojson.type);

                            if(respuesta == ''){
                              console.log("Sin resultado de la API");
                            }else{
                              //console.log(respuesta);
                              clasificador(respuesta,color_mapa);
                              
                              Swal.fire({
                                                                title: 'Guardar mapa?',
                                                                text: "Una vez que lo guarde no podra cambiar",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#3085d6',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: 'Si'
                                                                }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                  Swal.fire(
                                                                    'Guardado',
                                                                    'Mapa listo para ser usado',
                                                                    'success'
                                                                  )
                                                                  var pais_region,distrito_local = undefined;
                                                                  
                                                                  enviar_data_bd(pais_region,distrito_local,respuesta,link_insertado,color_mapa);
                                                                  
                                                               }
                                                              
                                                            })//Fin sweetalert2   
                            }

                    }//Fin del succes 
                });//Fin de ajax
}//El que busca en API con url

function clasificador(datos_a_clasificar,color_mapa){
      //console.log(color_mapa);

      var tipo_geometry       = datos_a_clasificar.geometry;
      if(tipo_geometry != undefined){
              //console.log("Tipo geometria");
              //iniciador_pro(datos_a_clasificar['geometry']['coordinates'][0]);
              iniciador_pro(datos_a_clasificar,color_mapa);
      }else{
            //var tipo_poligono       = datos_a_clasificar.geojson.type;
            var tipo_poligono       = datos_a_clasificar[0]['geojson']['type'];

            if(tipo_poligono == 'Polygon'){
              //console.log("Tipo Poligono");
              //Lo mandamos a 1°Mapa iniciador_pro()
              //iniciador_pro_preview(datos_a_clasificar[0].geojson.coordinates[0]);
              ojos_chinos(datos_a_clasificar,color_mapa);
             
            }else if(tipo_poligono == 'MultiPolygon'){
              //console.log("Tipo Multipoligono");
              //Lo mandamos a 2°Mapa
              ojos_chinos(datos_a_clasificar,color_mapa);

            }else if(tipo_poligono == 'Point'){
              console.log("Tipo Punto");
              iniciador_pro(datos_a_clasificar[0]['geojson']['coordinates'],color_mapa);
              //Lo mandamos a 3°Mapa con aguja saltarina

            }else if(tipo_poligono =='LineString'){
              //console.log("Tipo LineString");
              //console.log("ESTAS EN Tipo Patay rondos");
              //No da antes daba analizar esta pendejada
              //iniciador_pro(datos_a_clasificar[0]['geojson']['coordinates']);
              iniciador_pro(datos_a_clasificar[0]['geojson'],color_mapa);
              
            }else{
              console.log("Error Desconocido");
            }
      }

     
    //// 3 casos ///
    /*

    1)Poligon
    2)Multi-Poligon
    3)Geometry
    4)Sub niveles de busqueda como de amarilis

    */
}//El que clasifica tipo_poligono

function secador(geojson){
  var mapOptions = {
                              zoom: 5,
                              center: new google.maps.LatLng(-9.933844,-76.2439148),
                              gestureHandling: 'greedy',
                              mapTypeId: google.maps.MapTypeId.ROADMAP

                            };    
                              
                            var map = new google.maps.Map(document.getElementById('map-canvas'),
                                mapOptions);

                            var cuadrangular = new google.maps.Polygon({
                              paths: geojson,
                              strokeColor: '#FF0000',
                              strokeOpacity: 0.8,
                              strokeWeight: 1,
                              fillColor: '#FF0000',
                              fillOpacity: 0.35
                            });

                            cuadrangular.setMap(map);
}//Hace que no se repita el grafico de iniciador_pro

function iniciador_pro(data,color_mapa){
  //console.log(color_mapa);
                      console.log("A iniciador_pro");
                      
                      if(contador == 0){           
                            //console.log("Si");
                        }else{
                            //console.log("No");
                            geojson = [];
                            secador(geojson) 
                        }



                      if(data["type"] == 'LineString'){
                        //console.log("Patay rondos por busqueda automatica");
                        //console.log("Patay rondos por busqueda automatica ROMPE ARRAY");
                        var dale123 = data.coordinates;
                        for(var i=0; i<dale123.length; i++) { 
                              geojson.push(new google.maps.LatLng(dale123[i][1],dale123[i][0]));
                            }
                            
                      }else{
                            var grafica_pz = data.geometry.coordinates[0]; 
                            if (data.geometry["type"] == 'Polygon') {
                                  $.each(grafica_pz, function (i) {
                                      geojson.push(new google.maps.LatLng(grafica_pz[i][1], grafica_pz[i][0]));
                                  });
                        //console.log("Estamos en == Polygon");
                        
                        }else if(data.geometry["type"] == 'LineString'){
                              //console.log("Busqueda por URL");
                              r = data.geometry.coordinates;
                              for(var i=0; i<r.length; i++) { 
                                geojson.push(new google.maps.LatLng(r[i][1],r[i][0]));
                              }
                        }else{
                          $.each(grafica_pz[0], function (i) {
                              geojson.push(new google.maps.LatLng(grafica_pz[0][i][1], grafica_pz[0][i][0]));
                          });
                        } 
        }

        var mapOptions = {
          zoom: 5,
          center: new google.maps.LatLng(-9.933844,-76.2439148),
          gestureHandling: 'greedy',
          mapTypeId: google.maps.MapTypeId.ROADMAP

        };    
          
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);



        var cuadrangular = new google.maps.Polygon({
          paths: geojson,
          strokeColor: color_mapa,
          strokeOpacity: 0.8,
          strokeWeight: 1,
          fillColor: color_mapa,
          fillOpacity: 0.35
        });

        cuadrangular.setMap(map);
        contador++;
}//El que envia valor a graficar geometria


function enviar_data_bd(pais_region,distrito_local,datos,link_insertado,color_mapa){
  //console.log(color_mapa);
  //console.log(datos['display_name']);
  //console.log(datos[0].boundingbox);
  //console.log(datos[0].boundingbox.display_name);
  //console.log(datos[0]);
  //console.log(datos[0].display_name);

  /*
  //Para argentina
  if(datos[0].display_name == undefined){
      var nombre_multipoligon =  datos[0].display_name;
      console.log("Estas en el if de un multi sin hogar");
  }*/
  
  

  if(pais_region,distrito_local == undefined){
   
    //console.log("Function enviar_data_bd() manual");
    //Para patay rondos y peru
    
        //var nombre_mapa       = datos.names["name"];
        //var coordenadas_mapa  = datos.geometry.coordinates;
        //var boundingbox       = "Geometry";
        //var tipo_poligono     = datos.geometry["type"];
        

        enviar_data_bd_manual(link_insertado,color_mapa);
  
  }else{
    //console.log("Function enviar_data_bd() automatico");
    enviar_data_bd_automatica(pais_region,distrito_local,datos,color_mapa);
   
  }
      
 

}//El que pasa al servidor funciona


function enviar_data_bd_manual(link_insertado,color_mapa){  
          //console.log(color_mapa);
          //console.log(nombre_mapa,coordenadas_mapa,boundingbox,tipo_poligono);

                  //coordenadas_mapa     =   coordenadas_mapa.replace(/""/g, '');
                  //coordenadas_mapa     =   JSON.parse(coordenadas_mapa);
                  //console.log(tipo_poligono);

            $.ajax({
                          url: 'controlador_crud.php',
                          type: 'POST',
                          async: true,
                          data: {
                                opcion : 'guardar_pinta_mapa',
                                guardar_data:'manual',
                                color_mapa:color_mapa,
                                link_insertado:link_insertado
                                //nombre_mapa:nombre_mapa,
                                //coordenadas_mapa:coordenadas_mapa,
                                //boundingbox:boundingbox,
                                //tipo_poligono:tipo_poligono
                                },
                          dataType: 'json',
                          success: function(res){
                                  console.log(res);
                                  //console.log(  res[0].geojson.coordinates);
                                  if(res == ''){
                                    console.log("Sin resultado de la API");
                                  }
                              }//Fin del succes 
                      });//Fin de ajax
}

function enviar_data_bd_automatica(pais_region,distrito_local,datos,color_mapa){
          //console.log(color_mapa);

              $.ajax({
                        url: 'controlador_crud.php',
                        type: 'POST',
                        async: true,
                        data: {
                              opcion : 'guardar_pinta_mapa',
                              pais_region:pais_region,
                              distrito_local:distrito_local,
                              color_mapa:color_mapa,
                              tipo_busqueda:'automatica',
                              guardar_data:'automatica',
                              },
                        dataType: 'json',
                        success: function(respuesta){
                                console.log(respuesta);
                                //console.log(  respuesta[0].geojson.coordinates);
                                if(respuesta == ''){
                                  console.log("Sin resultado de la API");
                                }
                            }//Fin del succes 
                });//Fin de ajax
            
}

function ojos_chinos(data,color_mapa){
            console.log("A ojos chinos");
            //console.log(color_mapa);

                          if(contador == 0){           
                              //console.log("Si");
                          }else{
                              //console.log("No");
                              geojson = [];
                              dale123(geojson);  
                          }
                        

                          
                  
                                boundingbox = data[0].boundingbox;
                                if (data[0].geojson.type == 'Polygon') {
                                      $.each(data[0].geojson.coordinates[0], function (i) {
                                          geojson.push(new google.maps.LatLng(data[0].geojson.coordinates[0][i][1], data[0].geojson.coordinates[0][i][0]));
                                      });
                                //console.log("Estamos en == Polygon");
                                dale123(geojson,color_mapa);
                                
                                
                            /////////////////////////////////////////////////////////////
                            } else {
                                  $.each(data[0].geojson.coordinates[0][0], function (i) {
                                      geojson.push(new google.maps.LatLng(data[0].geojson.coordinates[0][0][i][1], data[0].geojson.coordinates[0][0][i][0]));
                                  });
                                  //console.log("Estamos en else == Multi-Polygon");
                                  dale123(geojson,color_mapa)
                            }//Fin else
                            contador++;                               
}//El que envia valor a graficar

function dale123(geojson,color_mapa) { 
          //console.log("Estas en dale123");
          //console.log(color_mapa);

                                    var map = new google.maps.Map(document.getElementById('map-canvas'), {
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });

                                    var infowindow = new google.maps.InfoWindow();

                                    var bermudaTriangle = new google.maps.Polygon({
                                        paths: geojson,
                                        strokeColor: color_mapa,
                                        strokeOpacity: 0.8,
                                        strokeWeight: 2,
                                        fillColor: color_mapa,
                                        fillOpacity: 0.35
                                    });
                                    //console.log(bermudaTriangle);
                                    bermudaTriangle.setMap(map);
                                    var a = new google.maps.LatLng(parseFloat(boundingbox[0]), parseFloat(boundingbox[2]));
                                    var b = new google.maps.LatLng(parseFloat(boundingbox[1]), parseFloat(boundingbox[3]));;
                                    var bounds = new google.maps.LatLngBounds();
                                    bounds.extend(a);
                                    bounds.extend(b);
                                    map.fitBounds(bounds);
                                
}//El que grafica con ayuda de ojos_chinos
                    
function cambiazo(){
        $('.automatica').hide();
        $('.manual').show();
        //console.log("Listo el cambiazo");
}//El que muestra view

function cantidad_graf(){
      //$('.cargar_data_table').show();
      $('#finalizador_perron').hide();

      let cantidad_graf = $('#cantidad_graf').val();

      if(!isNaN(cantidad_graf)){
              if(cantidad_graf <= 9){
                    if (cantidad_graf % 1 == 0) {
                            //alert ("Es un numero entero pase usted :)");
                            $('.insertacion_de_coordenadas').show();
                            $('.cantidad_graf').hide();
                    }else {
                        alert ("No se admite # decimal");
                    }
              }else{
                alert("Ingrese un numero menor o igual a 9");
              }
      }else{
          console.log("NO Es numero");
          alert("Ingrese un numero");
      }

      
}//El que verificador de mapas que se insertaram max 9

/*
function cargar_mapas_pintados(){
                                    $.ajax({
                                        type: "GET",
                                        async:false,
                                        url: 'controlador_crud.php',
                                        data: {
                                            opcion : 'cargar_mapas_pintados'
                                        },
                                        success: function (results) {
                                          //console.log(results);
                                          
                                            dataArr = JSON.parse(results);
                                            

                                            



                                            var str = '';
                                            $("#id_body").html(str);	  
                                            for(i=0;i<dataArr.length;i++)
                                            {
                                                str += '<tr>'+
                                                        '<td>'+dataArr[i].id+'</td>'+
                                                        '<td>'+dataArr[i].nombre_mapa+'</td>'+
                                                       
                                                    '</tr>';
                                            }
                                                
                                            $("#id_body").html(str);


                                            
                                            iniciador_pro(dataArr[0]);
                                            


                                        },
                                        error: function (request, status, error) {
                                                alert(request.responseText);
                                            }
                                    });
}//El que trae los datos en table para que verifique*/

function mostrar_mapa_final(mapas_ingresados){
  
                                    $('#map-canvas').show();                                 
  
                                    $.ajax({
                                        type: "GET",
                                        async:false,
                                        url: 'controlador_crud.php',
                                        data: {
                                            opcion : 'cargar_mapas_pintados'
                                        },
                                        success: function (results) {
                                        //console.log(results);
                                        //********************** CON JSON.parse *****************/    
                                        dataArr = JSON.parse(results);
                                            
                                        //console.log(dataArr);
                                          
                                        //iniciador_pro(dataArr[0]);
                                        //********************** CUALQUER CODIGO*****************/   
                                        var bounds = new google.maps.LatLngBounds();
                                        var geocoder;
                                        var map;
                                        var polygons = [];

                                        

                                        //console.log(tipo_poligono);

                                        music();
                                        function music() {
                                          map = new google.maps.Map(
                                              document.getElementById("map-canvas"), {
                                              center: new google.maps.LatLng(-9.933844,-76.2439148),
                                              zoom: 13,
                                              gestureHandling: 'greedy',
                                              mapTypeId: google.maps.MapTypeId.ROADMAP
                                            });
      //************************************************************************************************************************************************************************************************/                                            
                                                          
                                                              var data_1  = [];
                                                              var data_2  = [];
                                                              var data_3  = [];
                                                              var data_4  = [];
                                                              var data_5  = [];
                                                              var data_6  = [];
                                                              var data_7  = [];
                                                              var data_8  = [];
                                                              var data_9  = [];

      /*
      //// POLYGONO
      $.each(data[0].geojson.coordinates[0], function (i) { --------------->respuesta
            geojson.push(new google.maps.LatLng(data[0].geojson.coordinates[0][i][1], data[0].geojson.coordinates[0][i][0]));
      });
      //// MULTI - POLIGONO
      $.each(data[0].geojson.coordinates[0][0], function (i) {
                              geojson.push(new google.maps.LatLng(data[0].geojson.coordinates[0][0][i][1], data[0].geojson.coordinates[0][0][i][0]));
      });
      */   


    if(dataArr[0] != null){
          //console.log("Existe datos en dataArr[0] ");
          //console.log("Funciona dataArr[0]");

          var tipo_poligono =   dataArr[0]["tipo_poligono"];
          tipo_poligono     =   tipo_poligono.replace(/""/g, '');
          tipo_poligono     =   JSON.parse(tipo_poligono);
          
          data_bd_php       =   dataArr[0]["coordenadas"];
          data_bd_php       =   data_bd_php.replace(/[]/g, ',');
          data_bd_php       =   JSON.parse(data_bd_php);

          var color_mapa    =   dataArr[0]["color_mapa"];


                  if(tipo_poligono == 'Polygon'){
                        for(var i=0; i<data_bd_php.length; i++) { 
                            data_1.push(new google.maps.LatLng(data_bd_php[i][1],data_bd_php[i][0]));
                        }
                  }else if(tipo_poligono == 'MultiPolygon'){
                        $.each(data_bd_php[0], function (i) {
                            data_1.push(new google.maps.LatLng(data_bd_php[0][i][1], data_bd_php[0][i][0]));
                        });
                  }else if(tipo_poligono == 'LineString'){
                        for(var i=0; i<data_bd_php.length; i++) { 
                          data_1.push(new google.maps.LatLng(data_bd_php[i][1],data_bd_php[i][0]));
                        }
                  }else{
                      console.log("Falta rellenar campo tipo_poligono");
                  }

          polygons.push(new google.maps.Polygon({
              path: data_1,
              geodesic: false,
              strokeColor: color_mapa,
              strokeOpacity: 1.0,
              strokeWeight: 2,
              fillColor: color_mapa,
              fillOpacity: 0.35,
              map: map
          }));
                                  
    }//Exelente poligon y multi-poligon

    if(dataArr[1] != null ){
        //console.log("Existe datos en dataArr[1] ");
        //console.log("Funciona dataArr[1]");

        var tipo_poligono =   dataArr[1]["tipo_poligono"];
        tipo_poligono     =   tipo_poligono.replace(/""/g, '');
        tipo_poligono     =   JSON.parse(tipo_poligono);

        data_bd_php_2     =   dataArr[1]["coordenadas"];
        data_bd_php_2     =   data_bd_php_2.replace(/[]/g, ',');
        data_bd_php_2     =   JSON.parse(data_bd_php_2);

        var color_mapa    =   dataArr[1]["color_mapa"];
        

                  if(tipo_poligono == 'Polygon'){
                        for(var i=0; i<data_bd_php_2.length; i++) { 
                            data_2.push(new google.maps.LatLng(data_bd_php_2[i][1],data_bd_php_2[i][0]));
                        }
                  }else if(tipo_poligono == 'MultiPolygon'){
                        $.each(data_bd_php_2[0], function (i) {
                            data_2.push(new google.maps.LatLng(data_bd_php_2[0][i][1], data_bd_php_2[0][i][0]));
                        });
                  }else if(tipo_poligono == 'LineString'){
                        for(var i=0; i<data_bd_php_2.length; i++) { 
                          data_2.push(new google.maps.LatLng(data_bd_php_2[i][1],data_bd_php_2[i][0]));
                        }
                  }else{
                      console.log("Falta rellenar campo tipo_poligono");
                  }

          polygons.push(new google.maps.Polygon({
          path: data_2,
          geodesic: false,
          strokeColor: color_mapa,
          strokeOpacity: 1.0,
          strokeWeight: 2,
          fillColor: color_mapa,
          fillOpacity: 0.35,
          map: map
        }));
    }//Exelente poligon y multi-poligon

    if(dataArr[2] != null){
        //console.log("Existe datos en dataArr[2] ");
        //console.log("Funciona dataArr[2]");
    
        var tipo_poligono =   dataArr[2]["tipo_poligono"];
        tipo_poligono     =   tipo_poligono.replace(/""/g, '');
        tipo_poligono     =   JSON.parse(tipo_poligono);

        data_bd_php_3     =   dataArr[2]["coordenadas"];
        data_bd_php_3     =   data_bd_php_3.replace(/[]/g, ',');
        data_bd_php_3     =   JSON.parse(data_bd_php_3);

        var color_mapa    =   dataArr[2]["color_mapa"];

        

                  //console.log(tipo_poligono);
                  if(tipo_poligono == 'Polygon'){
                        for(var i=0; i<data_bd_php_3.length; i++) { 
                          data_3.push(new google.maps.LatLng(data_bd_php_3[i][1],data_bd_php_3[i][0]));
                        }
                  }else if(tipo_poligono == 'MultiPolygon'){
                        $.each(data_bd_php_3[0], function (i) {
                            data_3.push(new google.maps.LatLng(data_bd_php_3[0][i][1], data_bd_php_3[0][i][0]));
                        });
                  }else if(tipo_poligono == 'LineString'){
                        for(var i=0; i<data_bd_php_3.length; i++) { 
                          data_3.push(new google.maps.LatLng(data_bd_php_3[i][1],data_bd_php_3[i][0]));
                        }
                  }else{
                      console.log("Falta rellenar campo tipo_poligono");
                  }

        polygons.push(new google.maps.Polygon({
          path: data_3,
          geodesic: false,
          strokeColor: color_mapa,
          strokeOpacity: 1.0,
          strokeWeight: 2,
          fillColor: color_mapa,
          fillOpacity: 0.35,
          map: map
        }));
    }//Exelente poligon y multi-poligon

    if(dataArr[3] != null){
        //console.log("Existe datos en dataArr[3] ");
        //console.log("Cagado el dataArr[3]");

        var tipo_poligono =   dataArr[3]["tipo_poligono"];
        tipo_poligono     =   tipo_poligono.replace(/""/g, '');
        tipo_poligono     =   JSON.parse(tipo_poligono);

        data_bd_php_4     =   dataArr[3]["coordenadas"];
        data_bd_php_4     =   data_bd_php_4.replace(/[]/g, ',');
        data_bd_php_4     =   JSON.parse(data_bd_php_4);

        var color_mapa    =   dataArr[3]["color_mapa"];

        //console.log(data_bd_php_4);
                  
                  if(tipo_poligono == 'Polygon'){
                        for(var i=0; i<data_bd_php_4.length; i++) { 
                          data_4.push(new google.maps.LatLng(data_bd_php_4[i][1],data_bd_php_4[i][0]));
                        }
                  }else if(tipo_poligono == 'MultiPolygon'){
                        $.each(data_bd_php_4[0], function (i) {
                            data_4.push(new google.maps.LatLng(data_bd_php_4[0][i][1], data_bd_php_4[0][i][0]));
                        });
                  }else if(tipo_poligono == 'LineString'){
                        for(var i=0; i<data_bd_php_4.length; i++) { 
                          data_4.push(new google.maps.LatLng(data_bd_php_4[i][1],data_bd_php_4[i][0]));
                        }
                  }else{
                      console.log("Falta rellenar campo tipo_poligono");
                  }

                  polygons.push(new google.maps.Polygon({
                    path: data_4,
                    geodesic: false,
                    strokeColor: color_mapa,
                    strokeOpacity: 1.0,
                    strokeWeight: 2,
                    fillColor: color_mapa,
                    fillOpacity: 0.35,
                    map: map
                  }));


    }//Exelente poligon y multi-poligon

    if(dataArr[4] != null){
        //console.log("Existe datos en dataArr[4] ");

        var tipo_poligono =   dataArr[4]["tipo_poligono"];
        tipo_poligono     =   tipo_poligono.replace(/""/g, '');
        tipo_poligono     =   JSON.parse(tipo_poligono);

        data_bd_php_5     =   dataArr[4]["coordenadas"];
        data_bd_php_5     =   data_bd_php_5.replace(/[]/g, ',');
        data_bd_php_5     =   JSON.parse(data_bd_php_5);

        var color_mapa    =   dataArr[4]["color_mapa"];


                  if(tipo_poligono == 'Polygon'){
                        for(var i=0; i<data_bd_php_5.length; i++) { 
                                data_5.push(new google.maps.LatLng(data_bd_php_5[i][1],data_bd_php_5[i][0]));
                        }
                  }else if(tipo_poligono == 'MultiPolygon'){
                        $.each(data_bd_php_5[0], function (i) {
                            data_5.push(new google.maps.LatLng(data_bd_php_5[0][i][1], data_bd_php_5[0][i][0]));
                        });
                  }else if(tipo_poligono == 'LineString'){
                        for(var i=0; i<data_bd_php_5.length; i++) { 
                          data_5.push(new google.maps.LatLng(data_bd_php_5[i][1],data_bd_php_5[i][0]));
                        }
                  }else{
                      console.log("Falta rellenar campo tipo_poligono");
                  } 

                              polygons.push(new google.maps.Polygon({
                                path: data_5,
                                geodesic: false,
                                strokeColor: color_mapa,
                                strokeOpacity: 1.0,
                                strokeWeight: 2,
                                fillColor: color_mapa,
                                fillOpacity: 0.35,
                                map: map
                              }));

    }//Exelente poligon y multi-poligon

    if(dataArr[5] != null){
        //console.log("Existe datos en dataArr[5] ");

        var tipo_poligono =   dataArr[5]["tipo_poligono"];
        tipo_poligono     =   tipo_poligono.replace(/""/g, '');
        tipo_poligono     =   JSON.parse(tipo_poligono);

        data_bd_php_6     =   dataArr[5]["coordenadas"];
        data_bd_php_6     =   data_bd_php_6.replace(/[]/g, ',');
        data_bd_php_6     =   JSON.parse(data_bd_php_6);

        var color_mapa    =   dataArr[5]["color_mapa"];

                        if(tipo_poligono == 'Polygon'){
                          for(var i=0; i<data_bd_php_6.length; i++) { 
                                  data_6.push(new google.maps.LatLng(data_bd_php_6[i][1],data_bd_php_6[i][0]));
                          }
                        }else if(tipo_poligono == 'MultiPolygon'){
                              $.each(data_bd_php_6[0], function (i) {
                                  data_6.push(new google.maps.LatLng(data_bd_php_6[0][i][1], data_bd_php_6[0][i][0]));
                              });
                        }else if(tipo_poligono == 'LineString'){
                            for(var i=0; i<data_bd_php_6.length; i++) { 
                              data_6.push(new google.maps.LatLng(data_bd_php_6[i][1],data_bd_php_6[i][0]));
                        }
                        }else{
                            console.log("Falta rellenar campo tipo_poligono");
                        } 

                                polygons.push(new google.maps.Polygon({
                                  path: data_6,
                                  geodesic: false,
                                  strokeColor: color_mapa,
                                  strokeOpacity: 1.0,
                                  strokeWeight: 2,
                                  fillColor: color_mapa,
                                  fillOpacity: 0.35,
                                  map: map
                                }));

    }//Exelente poligon y multi-poligon

    if(dataArr[6] != null){
      //console.log("Existe datos en dataArr[6] ");

          var tipo_poligono =   dataArr[6]["tipo_poligono"];
          tipo_poligono     =   tipo_poligono.replace(/""/g, '');
          tipo_poligono     =   JSON.parse(tipo_poligono);

          data_bd_php_7     =   dataArr[6]["coordenadas"];
          data_bd_php_7     =   data_bd_php_7.replace(/[]/g, ',');
          data_bd_php_7     =   JSON.parse(data_bd_php_7);

          var color_mapa    =   dataArr[6]["color_mapa"];


                        if(tipo_poligono == 'Polygon'){
                          for(var i=0; i<data_bd_php_7.length; i++) { 
                                  data_7.push(new google.maps.LatLng(data_bd_php_7[i][1],data_bd_php_7[i][0]));
                          }
                        }else if(tipo_poligono == 'MultiPolygon'){
                              $.each(data_bd_php_7[0], function (i) {
                                  data_7.push(new google.maps.LatLng(data_bd_php_7[0][i][1], data_bd_php_7[0][i][0]));
                              });
                        }else if(tipo_poligono == 'LineString'){
                          for(var i=0; i<data_bd_php_7.length; i++) { 
                            data_7.push(new google.maps.LatLng(data_bd_php_7[i][1],data_bd_php_7[i][0]));
                          }
                        }else{
                            console.log("Falta rellenar campo tipo_poligono");
                        }


                        polygons.push(new google.maps.Polygon({
                          path: data_7,
                          geodesic: false,
                          strokeColor: color_mapa,
                          strokeOpacity: 1.0,
                          strokeWeight: 2,
                          fillColor: color_mapa,
                          fillOpacity: 0.35,
                          map: map
                        }));

    }//Exelente poligon y multi-poligon

    if(dataArr[7] != null){
      //console.log("Existe datos en dataArr[7] ");

          var tipo_poligono =   dataArr[7]["tipo_poligono"];
          tipo_poligono     =   tipo_poligono.replace(/""/g, '');
          tipo_poligono     =   JSON.parse(tipo_poligono);

          data_bd_php_8     =   dataArr[7]["coordenadas"];
          data_bd_php_8     =   data_bd_php_8.replace(/[]/g, ',');
          data_bd_php_8     =   JSON.parse(data_bd_php_8);

          var color_mapa    =   dataArr[7]["color_mapa"];

                        if(tipo_poligono == 'Polygon'){
                          for(var i=0; i<data_bd_php_8.length; i++) { 
                                  data_8.push(new google.maps.LatLng(data_bd_php_8[i][1],data_bd_php_8[i][0]));
                          }
                        }else if(tipo_poligono == 'MultiPolygon'){
                              $.each(data_bd_php_8[0], function (i) {
                                  data_8.push(new google.maps.LatLng(data_bd_php_8[0][i][1], data_bd_php_8[0][i][0]));
                              });
                        }else if(tipo_poligono == 'LineString'){
                          for(var i=0; i<data_bd_php_8.length; i++) { 
                            data_8.push(new google.maps.LatLng(data_bd_php_8[i][1],data_bd_php_8[i][0]));
                          }
                        }
                        else{
                            console.log("Falta rellenar campo tipo_poligono");
                        }


                        polygons.push(new google.maps.Polygon({
                          path: data_8,
                          geodesic: false,
                          strokeColor: color_mapa,
                          strokeOpacity: 1.0,
                          strokeWeight: 2,
                          fillColor: color_mapa,
                          fillOpacity: 0.35,
                          map: map
                        }));

    }//Exelente poligon y multi-poligon

    if(dataArr[8] != null){
      console.log("Existe datos en dataArr[8] ");
      


          var tipo_poligono =   dataArr[8]["tipo_poligono"];
          tipo_poligono     =   tipo_poligono.replace(/""/g, '');
          tipo_poligono     =   JSON.parse(tipo_poligono);


          data_bd_php_9     =   dataArr[8]["coordenadas"];
          data_bd_php_9     =   data_bd_php_9.replace(/[]/g, ',');
          data_bd_php_9     =   JSON.parse(data_bd_php_9);

          var color_mapa        =   dataArr[8]["color_mapa"];


                        if(tipo_poligono == 'Polygon'){
                          for(var i=0; i<data_bd_php_9.length; i++) { 
                                  data_9.push(new google.maps.LatLng(data_bd_php_9[i][1],data_bd_php_9[i][0]));
                          }
                        }else if(tipo_poligono == 'MultiPolygon'){
                              $.each(data_bd_php_9[0], function (i) {
                                  data_9.push(new google.maps.LatLng(data_bd_php_9[0][i][1], data_bd_php_9[0][i][0]));
                              });
                        }else if(tipo_poligono == 'LineString'){
                            for(var i=0; i<data_bd_php_9.length; i++) { 
                              data_9.push(new google.maps.LatLng(data_bd_php_9[i][1],data_bd_php_9[i][0]));
                            }
                        }else{
                            console.log("Falta rellenar campo tipo_poligono");
                        }


                                polygons.push(new google.maps.Polygon({
                                  path: data_9,
                                  geodesic: false,
                                  strokeColor: color_mapa,
                                  strokeOpacity: 1.0,
                                  strokeWeight: 2,
                                  fillColor: color_mapa,
                                  fillOpacity: 0.35,
                                  map: map
                                }));

    }//Exelente poligon y multi-poligon
/*
                                //paths: geojson,
                                //strokeColor: '#FF0000',
                                //strokeOpacity: 0.8,
                                //strokeWeight: 2,
                                fillColor: '#FF0000',
                                fillOpacity: 0.35
*/
  /////////////////////////////////////////////////////////////////////////////////////////////
    /*       
             
                      for(var i=0; i<data_bd_php_2.length; i++) { 
                          data_2.push(new google.maps.LatLng(data_bd_php_2[i][1],data_bd_php_2[i][0]));
                      }
           
                      
            
                      $.each(data_bd_php_3[0], function (i) {
                          data_3.push(new google.maps.LatLng(data_bd_php_3[0][i][1], data_bd_php_3[0][i][0]));
                      });
         
    */        
  //////////////////////////////////////////////////////////////////////////////////////////////
     

                                          for (var j = 0; j < polygons.length; j++) {
                                            for (var i = 0; i < polygons[j].getPath().getLength(); i++) {
                                              bounds.extend(polygons[j].getPath().getAt(i));
                                            }
                                          }
                                          map.fitBounds(bounds);
                                        }

                                        //google.maps.event.addDomListener(window, "load", initialize);



                                        },
                                        error: function (request, status, error) {
                                                alert(request.responseText);
                                            }
                                    });//ajax
}//mostrar_mapa_final  


//cargar_mapas_pintados();


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.12.6/sweetalert2.min.js" integrity="sha512-cNaY7ThUQSAxQRW5wvhRBLheHFFAVjnXFFD3K8H7gI1xq+W+tVz9ntPNyoioKpJFc7DyYLWCFem3KBthn7XJTQ==" crossorigin="anonymous"></script>