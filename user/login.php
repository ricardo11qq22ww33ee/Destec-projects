<?php
		
	include("../php/db_manager.php");
	include("../php/my_functions.php");
	if(isset($_POST['user'])){
    $my_user = $_POST['user'];
  }
  if(isset($_POST['pass'])){
    $my_pass = $_POST['pass'];
  }
	 if((isset($my_pass))&&(isset($my_user))){
    if( ($my_user <> "" ) && ( $my_pass <> "" ) ){	
      $id_user = validateUser($my_user, $my_pass);
      
        if( $id_user <> 0 ){
          session_start();
          $name = getName($id_user);
          $last_name = getLastName($id_user);
          $puesto = getPuesto($id_user);
          $_SESSION['id_user'] = $id_user;
          $_SESSION['name'] = $name;
          $_SESSION['puesto'] = $puesto;
          $_SESSION['last_name'] = $last_name;
          header( "Location:../index.php" );
        }else{
          $label = "Error de Usuario y/o Password!";
        }
      }
   }
	
	
?>

<!doctype html>
<html>
<head>

<title>Login</title>
<meta charset="utf-8">
  
  <!-- RENDERING CORRECTO DEPENDIENDO DEL TAMANO DE LA PANTALLA -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- LLAMA REFERENCIAS CDN DE BOOTSTRAP Y LIBRERIAS REQUERIDAS POR BOOTSTRAP -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</style>
</head>
<body class="body">

<p align="center"><?php if(isset($label)) {echo $label;} ?></p>
<div style="margin: 0 auto; width: 200px; height: 150px; padding:30px;">
    <form id="form1" name="form1" method="post" action="login.php">
      <p>
        <label for="textfield">Usuario:</label>
        <br />
		<input type="text" name="user" id="user" />
      </p>
      <p>
        <label for="password">Password:</label>
        <br />
		<input type="password" name="pass" id="pass" />
      </p>
      <p>
        <input type="submit" name="submit" id="submit" value="Submit" />
      </p>
    </form>
</div>

</body>
</html>