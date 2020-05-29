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
			$material = $_POST['material'];
            $cut = $_POST['cut'];
            $machining = $_POST['machining'];
            $status = $_POST['status'];
            $status_cut = $_POST['status_cut'];
            $id_project = $_POST['id_project'];
            $name_designer = $_POST['name_designer'];
			if( insertPart($id_part, $material, $cut, $machining, $status, $status_cut, $id_project, $name_designer)){
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