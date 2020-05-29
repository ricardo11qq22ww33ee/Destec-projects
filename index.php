<?php
	include("php/db_manager.php");
	include("php/my_functions.php");
	
	//Validacion de sesion abierta
	session_start();
	$id_usuario = $_SESSION['id_user'];
  $puesto = $_SESSION['puesto'];
  $name = $_SESSION['name'];
  $last_name = $_SESSION['last_name'];

  if($id_usuario == 0){		
		header( "Location:user/logout.php" );
	}
  //-----------------------------
  
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <script src="js/main.js"></script>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta name="theme-color" content="#fafafa">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
  <link href="blog.css" rel="stylesheet">
  <link rel="stylesheet" href="./Destec-projects/css/ivm.css">
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
  </style>  
</head>

<body style="background-image: url(https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fpacificaircargo.com%2Fwp-content%2Fuploads%2F2014%2F10%2Flight-grey-abstract-background-hd-cool-7-2.jpg&f=1&nofb=1);background-size: cover;">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <?php include("screens/sidebar.php") ?>
  <!-- <p>Hello world! This is HTML5 Boilerplate. <?php echo $last_name[0][0] ?> </p> -->
  
 <div class="container">
    <header class="blog-header py-3 line-separator">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 text-center">
          <H1 class="blog-header-logo text-dark text-center" href="index.php"> Hello <?php echo $name[0][0] ?></h1>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="text-muted" href="screens/form.php" aria-label="Plus">
            <img class="mb-4" src="https://image.flaticon.com/icons/svg/1828/1828930.svg" width="20" height="20" fill="none" stroke="currentColor">
          </a>
        </div>
      </div>
    </header>
    <hr class="mb-4">
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Projects On Going today <?php echo date('y-m-d') ?> </h1>
        <p class="lead my-3">
          This platform is made for a company Destec, which help to control the automatiation projects, in the part of activities, production and purchases.
        </p>
      </div>
    </div>
    <div class="row mb-2">
    <?php echo getProjectCard(); ?>
  </div>


  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
