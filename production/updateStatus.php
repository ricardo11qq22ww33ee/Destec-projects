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
	
			$id_part = $_POST['id_part'];
			$id_project = $_POST['id_project'];
			if( updateStatus($id_part)){
				echo'<script type="text/javascript">
		alert("Actividad actualizada '.$id_project.'");
        </script>';
        header("location:index.php?id_project=$id_project");
			}else{
                header("location:index.php?id_project='.$id_project.'");
				echo'<script type="text/javascript">
		alert("Error al actualizar actividad");
		</script>';
			}
		
?>