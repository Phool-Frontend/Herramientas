<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZkaCBIqm-teDz9cogkIxWYR13mjPznyk"></script>
<!--*******************************************************************************************************************************************************-->
<style>
	
	div#map_canvas {
		width: 100%;
		height: 75vh;
		position: relative;
		overflow: hidden;
	}
	select#negocios::after {
    content: 'gaaaaaa';
}

	body{
	background:cadetblue;
	padding: 10px;
	}
	#optener_ubicacion,#negocios{
		padding: 10px;
		margin-bottom: 10px;
	}
</style>


<body>
			<input id="optener_ubicacion" type="button" value="Obtener mi ubicacion" />
<!-- 
			<select disabled name="negocio" id="negocios" >
				<option value="">-- Elige una opción --</option>
				<option value="2_de_mayo">Rojas Sport - 2 de mayo</option>
				<option value="Pillco_marca">Rojas Sport - Pillco marca</option>
				<option value="Tingo">Rojas Sport - Tingo</option>
				<option value="colectora">Rojas Sport - Colectora</option>
			</select>
-->
			<select disabled name="negocio" id="negocios" >
					<option>-- Elige una opción --</option>		
			<select>

			<div id="map_canvas"></div>

</body>		
          
        
          


		


<script>
/////////////////////////// TRAEMOS CON PHP - AJAX - JSON LAS COORDENADAS SINO SE DA CON JAVASCRIPT
/////////////////////////// SE PUEDE CAMBIAR LA LINEA DEL PUNTO A - B strokeColor  9:13
var vMarker,map;
//var coordenada_x= -9.933844;
//var coordenada_y = -76.2439148; 


//Es para mostrar el mapa
map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 10,
				center: new google.maps.LatLng(-9.933844,-76.2439148),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            });
//Aqui es las coordenadas donde el puntero rojo de google maps aparecera
vMarker = new google.maps.Marker({
				//// ESTE SERA EL PUNTO A [click obtener ubicacion]
                position: new google.maps.LatLng(-9.933844,-76.2439148),
				draggable: true,
				animation: google.maps.Animation.DROP
				
			});
vMarker.setMap(map);

$("#optener_ubicacion").click(function () {
	//Checa el codigo del gilipoyas que trae ubicacion nada mas
	donde_estoy();
	cargar_datos();
	$('#optener_ubicacion').attr("disabled",true);
	$('#negocios').attr("disabled",false);
});//PUNTO A



$("#negocios").on('change',function () {

	var	coor_nego_x = $(this).find(':selected').data('latitud');	
	var	coor_nego_y = $(this).find(':selected').data('longitud');

		console.log("PUNTO B: Los datos de latitud y longitud son: ");
		//console.log($(this).find(':selected').data('latitud'));
		//console.log($(this).find(':selected').data('longitud'));
		//console.log($coor_nego_x);
		//console.log($coor_nego_y);
////////////////////////////////////////////////////////////////////
obteniendo_ruta(coor_nego_x,coor_nego_y);

});//Fin funcion anonima + change

/////////////////////////////////////////////////////////////////////////////////////////////////////
function donde_estoy(){
				navigator.geolocation.getCurrentPosition(function(location) {
				//console.log(location.coords.latitude);
				//console.log(location.coords.longitude);

				var map;
				var center = {lat: location.coords.latitude, lng: location.coords.longitude};
				function coordenadas_posicion_exacta() {
					map = new google.maps.Map(document.getElementById('map_canvas'), {
					center: center,
					zoom: 13
				});

				var marker = new google.maps.Marker({
				position: {lat: location.coords.latitude, lng: location.coords.longitude},
				map:map,
				//Para animar el puntero de google maps
				draggable: true,
    			animation: google.maps.Animation.DROP,
				title: 'Ubication'

				});
//////////////////////////////////////////////////////////
				toggleBounce();
				
				function toggleBounce() {//Este es el efecto que salta el gps
					marker.setAnimation(google.maps.Animation.BOUNCE);
				}
/////////////////////////////////////////////////////////
			}
			coordenadas_posicion_exacta();
		});


	//console.log("Donde estoy gaaa!!!!!!");
}//PUNTO A


function obteniendo_ruta(coor_nego_x,coor_nego_y){
				//console.log(coor_nego_x);
				//console.log(coor_nego_y);

				navigator.geolocation.getCurrentPosition(function(location) {
				var map;
				var center = {lat: location.coords.latitude, lng: location.coords.longitude};

				function ultimo_paso(coor_nego_x,coor_nego_y) {
				//INICIO A - B////////////////////////////////////////////////////////////////////////////
						
				/////////////////////////////////////////////////////////////////////////////////////////
											console.log(coor_nego_x,coor_nego_y);
											var mi_casa_x = location.coords.latitude;
											var mi_casa_y = location.coords.longitude;

											//var negocio_x = -9.9188963;
											//var negocio_y = -76.2272357;

											//console.log(mi_casa_x);
											//console.log(mi_casa_y );

											var pointA = new google.maps.LatLng(mi_casa_x,mi_casa_y),
											pointB = new google.maps.LatLng(coor_nego_x,coor_nego_y),
											myOptions = {
												zoom: 7,
												center: pointA
											},
											map = new google.maps.Map(document.getElementById('map_canvas'), myOptions),
											// Instantiate a directions service.
											directionsService = new google.maps.DirectionsService,
											directionsDisplay = new google.maps.DirectionsRenderer({
												//Este es para el color de la ruta A - B
												//polylineOptions: { strokeColor: "black" },
												map: map
											}),
											markerA = new google.maps.Marker({
												position: pointA,
												//title: "point A",
												//label: "YO",
												//draggable: true,
    											//animation: google.maps.Animation.DROP,
												//map: map
											}),
											markerB = new google.maps.Marker({
												position: pointB,
												//La etiqueta duplicada se borra borrando map
												
											});

						// get route from A to B
						calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);
					}
				// FUNCION CALCULA A - B////////////////////////////////////////////////////////////////////////////
				function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
							directionsService.route({
								origin: pointA,
								destination: pointB,
								avoidTolls: true,
								avoidHighways: false,
								travelMode: google.maps.TravelMode.DRIVING
							}, function (response, status) {
								if (status == google.maps.DirectionsStatus.OK) {
									directionsDisplay.setDirections(response);
								} else {
									window.alert('Directions request failed due to ' + status);
								}
							});
				}
				ultimo_paso(coor_nego_x,coor_nego_y);
			});
}

function cargar_datos(){
                                    $.ajax({
                                        type: "GET",
                                        async:true,
                                        url: 'controlador_crud.php',
                                        data: {
                                            opcion : 'cargar_llegar_local'
                                        },
                                        success: function (results) {

                                        //********************** CON JSON.parse *****************/    
                                            dataArr = JSON.parse(results);
                                            var str = '';
                                            $("#negocios").html(str);
											 
                                            for(i=0;i<dataArr.length;i++)
                                            {
                                                str += '<option data-latitud='+dataArr[i].lat+' data-longitud='+dataArr[i].lng+'>'+dataArr[i].nombre+'</option>';
                                            }
                                            $("#negocios").html(str);
											$("#negocios").prepend('<option>- Seleccionar -</option>');
											$("#negocios").val($("#negocios option:first").val()); 	  
                                        //********************** SIN JSON.parse *****************/  
                                        //Objeto que pasa el servidor si JSON.parse son coordenadas que admite ese formato
                                        //console.log(dataArr);
                                        //El json de las coordenadas buclea para añadir al mapa 
                                            for(i=0;i < dataArr.length;i++){
                                                var marker = new google.maps.Marker({
                                                position:dataArr[i],
                                                map:map,
                                                icon:'icono_mapa.png'
                                                }) 
                                            }
                                        //********************************************************/
                                    
                                        },
                                        error: function (request, status, error) {
                                                alert(request.responseText);
                                            }
                                    });//ajax
}//cargar_datos   

</script>