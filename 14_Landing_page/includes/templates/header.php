<!doctype html>
<html class="no-js" lang="Es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1″ />
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
  
  <link rel="manifest" href="site.webmanifest">
  <link rel="icon" type="image/png"  href="favicon.ico"/>

  <!-- Place favicon.ico in the root directory -->

  <!-- CDN LISTO-->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

<?php
		$archivo = basename($_SERVER['PHP_SELF']);
		$pagina = str_replace(".php","",$archivo);
		if($pagina == 'invitados' || $pagina == 'index'){
			echo '<link rel="stylesheet" href="css/colorbox.css">';
		}else if($pagina == 'conferencia'){
			echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />';
		}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" integrity="sha256-oSrCnRYXvHG31SBifqP2PM1uje7SJUyX0nTwO2RJV54=" crossorigin="anonymous" />
<link rel="stylesheet" href="css/main.css"/>

</head>

<body class="<?php	echo $pagina;	?>">
 
  <header>
  		<h1>Estas en el header</h1>
	
			<a href="admin/logueo.php"><button>Login</button></a>
		
  </header>
	 