<script type="text/javascript" src="//connect.facebook.net/en_US/all.js#xfbml=1&appId=159182002306380" id="facebook-jssdk"></script>

<!--Llama a una ventana emergente
  <script>
      FB.ui({
        method: 'share',
        href: 'https://developers.facebook.com/docs/'
    }, function(response){});
            
  </script>
 -->
<h1>https://graph.facebook.com/{facebookId}/picture?type=large&width=720&height=720</h1>
<button onclick="hola_mundo()">Abrir</button> 
 
<script>
    function hola_mundo(){
        FB.login(function(response) {
        if (response.authResponse) {
        console.log('Welcome!  Fetching your information.... ');
        FB.api('/me', function(response) {
        //console.log('Good to see you, ' + response.name + '.');
        console.log(response)
        });
        } else {
        console.log('User cancelled login or did not fully authorize.');
        }
    });
    }
        
</script>