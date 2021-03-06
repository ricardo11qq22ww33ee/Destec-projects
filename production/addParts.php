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

	
	if($id_usuario == 0){		
		header( "Location:../user/logout.php" );
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

<body class="container" style="background-image: url(https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.argylechurch.org%2Fwp-content%2Fuploads%2F2015%2F09%2Fwhite-triangles.jpg&f=1&nofb=1);background-size: cover;">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <?php include("../screens/sidebar-screen.php") ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add more Parts</h1>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Enter The New Part Information Below</h4>
        <form class="needs-validation" novalidate="" method= "post" action="insertPart.php">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">ID Part</label>
              <input type="text" class="form-control" id="firstName" name="id_part" placeholder="Insert your Part Id" value="" required="">
            </div>

            <div class="col-md-6 mb-3">
              <label for="lastName">Designer</label>
              <input type="text" class="form-control" id="lastName" placeholder="Name of the Designer"name="name_designer" value="" required="">
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Material<span class="text-muted"></span></label>
            <input type="email" class="form-control" id="email" name="material" placeholder="Material of the Part">
          </div>

          <div class="mb-3">
            <label for="address">Cut</label>
            <input type="text" class="form-control" id="address" name="cut" placeholder="What is the type of the Cut" required="">
          </div>

          <div class="mb-3">
            <label for="address2">Machining<span class="text-muted"></span></label>
            <input type="text" class="form-control" id="address2" name="machining" placeholder="Insert the Process">
          </div>
          <input  class="form-control" id="address2" name="id_project"type="hidden" value=<?php echo $id_project; ?>>
          <input  class="form-control" id="address2" name="status" type="hidden" value="Incomplete">
          <input  class="form-control" id="address2" name="status_cut" type="hidden" value="Incomplete">
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit">Add Part</button>
        </form>
      </div>
      <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="535" height="225" style="display: block; width: 535px; height: 225px;"></canvas> 
    </main> 

</div>
  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
