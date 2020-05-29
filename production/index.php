<?php
	include("../php/db_manager.php");
	include("../php/my_functions.php");
	
	//Validacion de sesion abierta
	session_start();
	$id_usuario = $_SESSION['id_user'];
  $puesto = $_SESSION['puesto'];
  $name = $_SESSION['name'];
  $last_name = $_SESSION['last_name'];
  $id_project = $_GET['id_project'];
  // $id_project = $_GET['id_project'];

	
	if($id_usuario == 0){		
		header( "Location:../user/logout.php" );
	}
	//-----------------------------
	
	if(isset($_POST['actualizar'])){
		if($_POST['actualizar']){
			$activity = $_POST['id_activity'];
			$status = $_POST['status'];
			if( updateStatusActivity($status, $activity)){
				echo'<script type="text/javascript">
		alert("Actividad actualizada");
		</script>';
			}else{
				echo'<script type="text/javascript">
		alert("Error al actualizar actividad");
		</script>';
			}
			
		}
	}

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
  <script src="../js/main.js"></script>
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/main.css">
  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="../js/plugins.js"></script>
  <script src="../js/main.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <meta name="theme-color" content="#fafafa">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>

<body class="container" style="background-image: url(https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.mutualpensions.com.au%2Fwp-content%2Fuploads%2F2018%2F03%2Fabstract-light-grey-3d-polygonal-motion-background-for-modern-reports-and-presetations-4k-seamless-loop-animation-prores_s7sptfhc_thumbnail-full01.png&f=1&nofb=1);background-size: cover;">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header class="blog-header py-3 line-separator">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 text-center">
          <H1 class="blog-header-logo text-dark text-center">Purchase list of project </h1>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="text-muted" href="addParts.php?id_project=<?php echo $id_project; ?>" aria-label="Plus">
            <img class="mb-4" src="https://image.flaticon.com/icons/svg/1828/1828930.svg" width="20" height="20" fill="none" stroke="currentColor">
          </a>
        </div>
      </div>
    </header>
  <hr class="mb-4">
  <?php include("../screens/sidebar-screen.php") ?>
<?php echo getPartsList($id_project); ?>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
