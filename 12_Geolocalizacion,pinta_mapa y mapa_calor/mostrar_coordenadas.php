<!DOCTYPE html>
<html>
  <head>
    <title>Segmentacion de clientes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZkaCBIqm-teDz9cogkIxWYR13mjPznyk&callback=iniciamos_google_maps&libraries=&v=weekly"defer></script>

    <style type="text/css">
      
      #mytable {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        border: solid 2px black;
        }

        #mytable td, #mytable th {
        border: 2px solid black;
        padding: 8px;
        }


        #mytable tr:hover {background-color: #ddd;}

        #mytable th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
        }
        /***************************************************************/
    
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


                <table id="mytable">
                        <thead> 
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Distrito</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                        </thead>

                        <tbody id="id_body">

                        </tbody>

                        </table>

                <br>
                <br>
                <br>

                <div id="map"></div>



  </body>
</html>




<script language="javascript">

    function iniciamos_google_maps() {
              
                cargar_datos();
                //Captacion del enfoque de camara del mapa
                var center = {lat:-9.933844, lng:-76.2439148};

                //Capta el div donde mostrar el zoom y el enfoque de camara para proyectar
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 9,
                    center: center,
                    gestureHandling: 'greedy'
                });
 
                //********************************************************************************************/
                        function cargar_datos(){
                                    $.ajax({
                                        type: "GET",
                                        async:true,
                                        url: 'controlador_crud.php',
                                        data: {
                                            opcion : 'cargar_datos'
                                        },
                                        success: function (results) {

                                        //********************** CON JSON.parse *****************/    
                                            dataArr = JSON.parse(results);
                                            var str = '';
                                            $("#id_body").html(str);	  
                                            for(i=0;i<dataArr.length;i++)
                                            {
                                                str += '<tr>'+
                                                        '<td>'+dataArr[i].nombre+'</td>'+
                                                        '<td>'+dataArr[i].direccion+'</td>'+
                                                        '<td>'+dataArr[i].ciudad+'</td>'+
                                                        '<td>'+dataArr[i].distrito+'</td>'+
                                                        '<td>'+dataArr[i].lat+'</td>'+
                                                        '<td>'+dataArr[i].lng+'</td>'+
                                                    '</tr>';
                                            }
                                                
                                            $("#id_body").html(str);	  
                                        //********************** SIN JSON.parse *****************/  
                                        //Objeto que pasa el servidor si JSON.parse son coordenadas que admite ese formato
                                        console.log(dataArr);
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
    }

   
 
</script>
