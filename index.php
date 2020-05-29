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
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
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

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <?php include("screens/sidebar.php") ?>
 <div class="container">
    <header class="blog-header py-3 line-separator">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 text-center">
          <H1 class="blog-header-logo text-dark text-center" href="index.php"> Hello <?php echo $name[0][0] ?></h1>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="text-muted" href="#" aria-label="Plus">
            <img class="mb-4" src="https://image.flaticon.com/icons/svg/1828/1828930.svg" width="20" height="20" fill="none" stroke="currentColor">
          </a>
        </div>
      </div>
    </header>
    <hr class="mb-4">
    <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="#">Algo</a>
        <a class="p-2 text-muted" href="#">Algo2</a>
        <a class="p-2 text-muted" href="#">Algo3</a>
        <a class="p-2 text-muted" href="#">Algo4</a>
        <a class="p-2 text-muted" href="#">Algo5</a>
        <a class="p-2 text-muted" href="#">Algo6</a>
      </nav>
    </div>
    <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
      <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Project On Going: *Insertar php para nombre del proyecto* </h1>
        <p class="lead my-3">
          The Project: *Insert Project from php*, was requested by the Company: *Insert company name from php*.
          *Insert name of project* consists of a web page project whose motive is to implement a high level landing page 
          for the company. 
        </p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Go To Project</a></p>
      </div>
    </div>
    <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">*Actividad Control php*</strong>
          <h3 class="mb-0">Featured Releases</h3>
          <div class="mb-1 text-muted">*Insert date of release php*</div>
          <p class="card-text mb-auto">There was a step back in the Control ctegory.Important roadblock in a task.</p>
          <a href="#" class="stretched-link">Go to Control</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
    <?php echo getProjectCard(); ?>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">*Actividad Design php*</strong>
          <h3 class="mb-0">Featured Releases</h3>
          <div class="mb-1 text-muted">*Insert date of release php*</div>
          <p class="mb-auto">There was an update in the Design ctegory. We finished a main task.</p>
          <a href="#" class="stretched-link">Go to Design</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
  </div>



  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
