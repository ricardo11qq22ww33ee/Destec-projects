<?php
	include("../php/db_manager.php");
	include("../php/my_functions.php");
	
	//Validacion de sesion abierta
	session_start();
	$id_usuario = $_SESSION['id_user'];
  $puesto = $_SESSION['puesto'];
  $name = $_SESSION['name'];
  $last_name = $_SESSION['last_name'];

	
	if($id_usuario == 0){		
		header( "Location:../user/logout.php" );
	}
	//-----------------------------
	
			$name = $_POST['name'];
			$client = $_POST['client'];
            $due_date = $_POST['due_date'];
            $start_date = $_POST['start_date'];
            $description = $_POST['description'];
			if( insertProject($due_date, $start_date, $name, $client, $description)){
				echo'<script type="text/javascript">
		alert("Proyecto registrado");
		</script>';
		header("location:../");
			}else{

				echo'<script type="text/javascript">
		alert("Proyecto no registrado");
		</script>';
		header("location:../");
			}
		
?>