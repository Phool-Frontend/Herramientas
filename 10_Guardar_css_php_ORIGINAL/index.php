<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.php">
    <title>Document</title>
</head>
<script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.js" integrity="sha512-1aNp9qKP+hKU/VJwCtYqJP9tdZWbMDN5pEEXXoXT0pTAxZq1HHZhNBR/dtTNSrHO4U1FsFGGILbqG1O9nl8Mdg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.1/spectrum.min.css" integrity="sha512-KuSX+43gVS5MEIJD2ewtrFPOHqC1PJnL8o2f5ciggPC0JUZ8XV0QXlfArO1mSzKkVFdRjsBDfrTU96C5SuRfqQ==" crossorigin="anonymous" />
<body>
    <h1>Hola editando colores desde php</h1>

    <div class="miraPHP">
        <h2>Soy el puto amo</h2><br>
        <h3>Seleccion o pege el color al que decea cambiar:</h3>
        <input type="text" id="este_es_el_color">
    </div><br><br><br><br><br><br><br><br><br><br>


    <div id="color"><input type='text' class="colores" /> </div> 
        <script>
            $(".colores").spectrum({
                //Este inicia el color
                color: "#f00",
                //Para que se muestra la paleta de colores
                showPalette: true,
                palette: [
                    ['black', 'white', 'blanchedalmond'],
                    ['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
                ],
                change: function(color) {

                //Con esto capto el color,abririamos un ajax y lo metemos o lo mostramos en input
                var picker_color = color.toHexString();
                console.log(picker_color);
                $('#este_es_el_color').val(picker_color);
                //En input seria:

                //Con esto hago el cambio
                $('body').css("background-color",color.toHexString());
               

                }
            });
           
        </script>
<h1>De aqui ya lo enviamos por ajax a php :v o a la BD </h1>
</body>
</html>