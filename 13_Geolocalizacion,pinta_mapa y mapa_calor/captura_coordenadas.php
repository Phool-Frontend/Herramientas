<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
 
div#map_canvas {
    width: 100%;
    height: 55vh;
    position: relative;
    overflow: hidden;
}

body{
  background:cadetblue;
  padding: 10px;
}

.centrado {
    width: 100%;
    margin: 0 auto;
    padding: 10px;
    background: cadetblue;
    border: solid 4px;
}
.centrado  input{
  width: 70%;
  margin: 0 auto;
  margin-bottom:10px;
}
.ga{
  text-align: center;
}
</style>
</head>
<body>
  

<div class="centrado">                
                <div>
                    <input type="text" id="nombre" class="form-control" placeholder="nombre">    
                </div>

                <div>
                    <input type="text" id="direccion" class="form-control" placeholder="direccion">    
                </div>
                    
                <div>
                    <input type="text" id="ciudad" class="form-control" placeholder="ciudad">
                </div>
                
                <div>
                    <input type="text" id="distrito" class="form-control" placeholder="distrito">
                </div>
                
                <div>
                    <input type="text" id="latitud" class="form-control" placeholder="latitude" disabled>
                </div>
                
                <div>
                    <input type="text" id="longitud" class="form-control" placeholder="longitud" disabled>
                </div>
              


                <div class="ga">
                        <a href="#edit" class="btn btn-success" onClick="agregar('');"><i class="material-icons"></i> <span>Agregar Nuevo</span></a>
                </div>

</div><br><br>

            <div id="map_canvas"></div>

          
        
          
    
    
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZkaCBIqm-teDz9cogkIxWYR13mjPznyk"></script>

    <script>
        var vMarker,map
            //Es para mostrar el mapa
            map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 9,
                center: new google.maps.LatLng(-9.933844,-76.2439148),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            //Aqui es para que muestre el puntero rojo de google maps
            vMarker = new google.maps.Marker({
                position: new google.maps.LatLng(-9.933844,-76.2439148),
                draggable: true
            });
            google.maps.event.addListener(vMarker, 'dragend', function (evt) {
                $("#latitud").val(evt.latLng.lat().toFixed(6));
                $("#longitud").val(evt.latLng.lng().toFixed(6));

                map.panTo(evt.latLng);
            });
            map.setCenter(vMarker.position);
            vMarker.setMap(map);

            $("#ciudad, #distrito, #direccion").change(function () {
                movePin();
            });

            function movePin() {
            var geocoder = new google.maps.Geocoder();
            var textSelectM = $("#ciudad").text();
            var textSelectE = $("#distrito").val();
            var inputAddress = $("#direccion").val() + ' ' + textSelectM + ' ' + textSelectE;
            geocoder.geocode({
                "address": inputAddress
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    vMarker.setPosition(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                    map.panTo(new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()));
                    $("#latitud").val(results[0].geometry.location.lat());
                    $("#longitud").val(results[0].geometry.location.lng());
                }

            });
        }
        </script>



<!--***********************************************************************************************************-->        
<script language="javascript">


      function agregar(){
            $.ajax({
              type: "POST",
              async:true,
              url: 'controlador_crud.php',
              data: {
                opcion : 'agregar',
                nombre : $("#nombre").val(),
                direccion    : $("#direccion").val(),
                ciudad    : $("#ciudad").val(),
                distrito    : $("#distrito").val(),
                latitud    : $("#latitud").val(),
                longitud    : $("#longitud").val(),
                id         : $("#id").val() 
              },
              success: function (results) {
                  $("#nombre").val(''),
                  $("#direccion").val(''),
                  $("#ciudad").val(''),
                  $("#distrito").val(''),
                  $("#latitud").val(''),
                  $("#longitud").val('')
                  //cargar_datos();
              },
              error: function (request, status, error) {
                  alert(request.responseText);
                }
            });
      }
        
</script>


</body>
</html>


  