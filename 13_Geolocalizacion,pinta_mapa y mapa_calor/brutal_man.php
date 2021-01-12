<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZkaCBIqm-teDz9cogkIxWYR13mjPznyk"></script>
<!--*******************************************************************************************************************************************************-->
<style>
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
        input#pais_region, #distrito_local, button,#link_insertado {
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
</style>
<!-- MI METODO NECESITA ARRAY PURO DURO DE MACHO -->
<!-- jsfiddle NECESITA  puro objeto ajax el mas gozu -->

<!--  OPCION 
      - HACER QUE GRAFIQUE MI METODO CON OBJETO JSON
      - OBTENER LA ID DEL CENTRO DE MI METODO DE BUSQUEDA
      - SEGUIR HACIENDO POR MI METODO DURO, PERO AHORA METER ARRAY PUSH PARA QUE ESAS COORDENADAS QUEDEN MAMADISIMAS
-->


<body> 
<div>
    <h3 class="atencion">Atencion:El sistema localiza cualquier parte del mundo.Pero solo grafica minimamente distritos, pueblitos NO!</h3>
    <div class="automatica">
      <fieldset>    
          <legend>POR BUSQUEDA:</legend>
          <input type="text"  id="pais_region" placeholder="INGRESE PAIS O REGION"><br>
          <input type="text"  id="distrito_local" placeholder="INGRESE DISTRITO O LOCAL"><br>
          <a onClick="cambiazo()" href="#">No encontraste lo que buscabas?...Haz click aqui</a><br>
          <button onClick="busca_automatica()">Buscar</button>
      </fieldset>
    </div>
    <div class="manual">
      <fieldset>
          <legend>POR URL:</legend>
          <input type="text"  id="link_insertado" placeholder="INGRESE URL Nominatim.openstreetmap"><br>
          <button onClick="busca_manual()">Buscar</button>
      </fieldset>
    </div><br><br>
</div>

<!---------------------------------------------------------------------------------------->
<div id="map_canvas" style="width:80%; height: 40vh;margin:0 auto"></div><br><br>                                    
<!---------------------------------------------------------------------------------------->
</body>
<script>
//******************************************************************************************/


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
                                        //********************** CON JSON.parse *****************/    
                                            dataArr = JSON.parse(results);
                                            
                                            //console.log(dataArr);
                                           
                                            //iniciador_pro(dataArr[0]);
                                       //********************** CUALQUER CODIGO*****************/   
                                        var bounds = new google.maps.LatLngBounds();
                                        var geocoder;
                                        var map;
                                        var polygons = [];

                                        function initialize() {
                                          map = new google.maps.Map(
                                            document.getElementById("map_canvas"), {
                                              center: new google.maps.LatLng(-9.933844,-76.2439148),
                                              zoom: 13,
                                              mapTypeId: google.maps.MapTypeId.ROADMAP
                                            });
      //************************************************************************************************************************************************************************************************/                                            
                                                          
                                                              var data_1 = [];
                                                              var data_2  = [];
                                                              var data_3  = [];

                                                             

                                                              data_bd_php       =   dataArr[0]["coordenadas"];
                                                              data_bd_php       = data_bd_php.replace(/[]/g, ',');
                                                              data_bd_php       = JSON.parse(data_bd_php);                      


                                                              data_bd_php_2     =   dataArr[1]["coordenadas"];
                                                              data_bd_php_2     = data_bd_php_2.replace(/[]/g, ',');
                                                              data_bd_php_2     = JSON.parse(data_bd_php_2);   

                                                              data_bd_php_3     =   dataArr[2]["coordenadas"];
                                                              data_bd_php_3     = data_bd_php_3.replace(/[]/g, ',');
                                                              data_bd_php_3     = JSON.parse(data_bd_php_3);  

                             
                                                              ////////////////////////////////////////////////////////////////////////////////

                                                              for(var i=0; i<data_bd_php.length; i++) { 
                                                                  data_1.push(new google.maps.LatLng(data_bd_php[i][1],data_bd_php[i][0]));
                                                              }

                                                              for(var i=0; i<data_bd_php_2.length; i++) { 
                                                                  data_2.push(new google.maps.LatLng(data_bd_php_2[i][1],data_bd_php_2[i][0]));
                                                              }

                                                              for(var i=0; i<data_bd_php_3.length; i++) { 
                                                                  data_3.push(new google.maps.LatLng(data_bd_php_3[i][1],data_bd_php_3[i][0]));
                                                              }

                                                              ///////////////////////////////////////////////////////////////////////////////////
      //************************************************************************************************************************************************************************************************/                                            
                                          polygons.push(new google.maps.Polygon({
                                            path: data_1,
                                            geodesic: false,
                                            strokeColor: '#FF0000',
                                            strokeOpacity: 1.0,
                                            strokeWeight: 1,
                                            map: map
                                          }));

                                          polygons.push(new google.maps.Polygon({
                                            path: data_2,
                                            geodesic: false,
                                            strokeColor: '#FF0000',
                                            strokeOpacity: 1.0,
                                            strokeWeight: 1,
                                            map: map
                                          }));

                                          polygons.push(new google.maps.Polygon({
                                            path: data_3,
                                            geodesic: false,
                                            strokeColor: '#FF0000',
                                            strokeOpacity: 1.0,
                                            strokeWeight: 1,
                                            map: map
                                          }));


                                          for (var j = 0; j < polygons.length; j++) {
                                            for (var i = 0; i < polygons[j].getPath().getLength(); i++) {
                                              bounds.extend(polygons[j].getPath().getAt(i));
                                            }
                                          }
                                          map.fitBounds(bounds);
                                        }
                                        google.maps.event.addDomListener(window, "load", initialize);



                                        },
                                        error: function (request, status, error) {
                                                alert(request.responseText);
                                            }
                                    });//ajax
}//cargar_mapas_pintados  

cargar_mapas_pintados();

//******************************************************************************************/

</script>

