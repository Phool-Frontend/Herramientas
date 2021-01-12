<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mapa de calor</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 

  <style type="text/css">
            div#map{
                width: 100%;
                height: 55vh;
                position: relative;
                overflow: hidden;
            }

            body{
            padding: 10px;
            background-color: lightgoldenrodyellow;
            }

    </style>
  </head>

  <body>

  
        <label>Agrandar calor</label>
        <input type="number" value="10" id="agrandar_calor"><br><br>
        
 


    <div id="map">
      
    </div>


    <script>
//headmap google maps jsfiddle js    -------> aqui se encuentra buenos ejemplos de APIS,ETC en javascrip mejor que codepen

          var map; 
          var array_declarado = [];
          


function iniciamos_google_maps(){
                      map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 13,
                      center: {lat: -9.933844, lng:-76.2439148},
                      gestureHandling: 'greedy'
            })
      
            
            cargar_coordenadas();
             $('#agrandar_calor').click(function(){
                  var intensidad_calor = $('#agrandar_calor').val();
                  mapa_calor(intensidad_calor);
             });    
                  
            
            function cargar_coordenadas(){
              $.ajax({
                url: 'controlador_crud.php',
                type: 'GET',
                data: {opcion : 'cargar_calor_metod_github'},
                dataType: 'json',
                //Metemos a un objeto => para luego salga a funcion
                success: function(r){
                r.forEach(m=>{
                    let lat = m.latitud;
                    let lon = m.longitud;
                    creando_coordenadas(lat,lon);
                  });
                  mapa_calor();


                }



              });
            }
            
            function creando_coordenadas(lat, lng){
              let latLng = {
                            location: new google.maps.LatLng(lat,lng), 
                            //Ancho de la bola de calor,exactamente el color verde
                            weight:7
                          };
              //Pasamos el objeto latLng a la variable array_declarado
              array_declarado.push(latLng);
            }

            function mapa_calor(intensidad_calor){
                var ra = intensidad_calor;
                var gradient = [
                  'rgba(0, 255, 255, 0)',
                  'rgba(0, 255, 255, 1)',
                  'rgba(0, 191, 255, 1)',
                  'rgba(0, 127, 255, 1)',
                  'rgba(0, 63, 255, 1)',
                  'rgba(0, 0, 255, 1)',
                  'rgba(0, 0, 223, 1)',
                  'rgba(0, 0, 191, 1)',
                  'rgba(0, 0, 159, 1)',
                  'rgba(0, 0, 127, 1)',
                  'rgba(63, 0, 91, 1)',
                  'rgba(127, 0, 63, 1)',
                  'rgba(191, 0, 31, 1)',
                  'rgba(255, 0, 0, 1)'
                ]
                new google.maps.visualization.HeatmapLayer(
                  {
                  map:map, 
                  data: array_declarado, 
                  maxIntensity:5, 
                  opacity:1,
                  //gradient:gradient, 
                  radius:ra,
                  
                  });
            }
}



          

    </script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZkaCBIqm-teDz9cogkIxWYR13mjPznyk&callback=iniciamos_google_maps&signed_in=true&libraries=visualization&callback=iniciamos_google_maps"></script>

</body>
</html>

