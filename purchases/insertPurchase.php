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
	
			$name = $_POST['name'];
			$cost = $_POST['cost'];
			$id_project = $_POST['id_project'];
			if( insertPurchase($name, $cost, $id_project)){
				echo'<script type="text/javascript">
		alert("Retraso registrado '.$id_project.'");
        </script>';
        header("location:purchasesList.php?id_project=$id_project");
			}else{
                header("location:purchasesList.php?id_project='.$id_project.'");
				echo'<script type="text/javascript">
		alert("Retraso no registrado");
		</script>';
			}
		
?>