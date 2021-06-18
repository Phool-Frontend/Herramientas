<footer>
Copyright  2020 - II
</footer>



<script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  
  <!-- CDN Listo -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js" integrity="sha256-GCAeRKCXFEtLTZ+gG1SCIrtGkYq1zZjMXkj+XUFNJqo=" crossorigin="anonymous"></script>

  <!-- CDN Listo -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha256-Ikk5myJowmDQaYVCUD0Wr+vIDkN8hGI58SGWdE671A8=" crossorigin="anonymous"></script>
  
  <!-- CDN Listo -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js" integrity="sha256-7sov0P4cWkfKMVHQ/NvnWVqcLSPYrPwxdz+MtZ+ahl8=" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  

  <!-- CDN Listo -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha256-jDnOKIOq2KNsQZTcBTEnsp76FnfMEttF6AV2DF2fFNE=" crossorigin="anonymous"></script>



<?php
		$archivo = basename($_SERVER['PHP_SELF']);
		$pagina = str_replace(".php","",$archivo);
		if($pagina == 'invitados' || $pagina == 'index'){
			echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js" integrity="sha256-QbxNT+iBOdbuiav8squsceFDDYXb/8C+fI9r029M7X4=" crossorigin="anonymous"></script>';
		}else if($pagina == 'conferencia'){
			echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js" integrity="sha256-CtKylYan+AJuoH8jrMht1+1PMhMqrKnB8K5g012WN5I=" crossorigin="anonymous"></script>';
		}
	?>





  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCogFfwBD0EGHzvCJoRnUGU5OSnrSWnfwk&callback=initMap"
    async defer></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  <!--Melchip Js-->
  <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us4.list-manage.com","uuid":"57ba255a24497d249aa7d2b4c","lid":"29bc8b3e47","uniqueMethods":true}) })</script>

</body>
</html