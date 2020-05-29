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
            $due_date = $_POST['due_date'];
            $start_date = $_POST['start_date'];
            $id_project = $_POST['id_project'];
            $status = "No initiated";
			if( insertActivity($due_date, $start_date, $name, $id_project, $status)){
				echo'<script type="text/javascript">
		alert("Proyecto registrado");
		</script>';
		header("location:index.php?id_project=".$id_project."");
			}else{

				echo'<script type="text/javascript">
		alert("Proyecto no registrado");
		</script>';
		header("location:../");
			}
		
?>