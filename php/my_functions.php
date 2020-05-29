<?php
	
	function validateUser($sUser, $sPassword){
		
		//Ejecuta y obtiene resultado en array bidimensional		
		$sql = "SELECT id_usuario FROM usuarios WHERE usuario = '$sUser' AND password ='$sPassword' LIMIT 1;";
		
		$recordsArray = sqlSelect($sql);
		$rowCount = count( $recordsArray );
				
		if( $rowCount > 0 ){
			$ret_val = $recordsArray[0]['id_usuario'];
		}else{
			$ret_val = 0;
			
		}		
		
		return $ret_val;
	}
	
	function getName($id_usser){
		$sql = "SELECT name FROM usuarios WHERE id_usuario = '$id_usser' ";
			return sqlSelect($sql);
	}
	function getLastName($id_usser){
		$sql = "SELECT last_name FROM usuarios WHERE id_usuario = '$id_usser' ";
			return sqlSelect($sql);
	}
	function getPuesto($id_usser){
		$sql = "SELECT puesto FROM usuarios WHERE id_usuario = '$id_usser' ";
			return sqlSelect($sql);
	}


	function insertVenta($fecha, $cliente, $empresa, $concepto, $monto, $validada, $id_usuario){
		$comision = getComision($id_usuario);
		$comision = $comision[0][0];
		$sql = "INSERT INTO ventas (fecha, cliente, empresa, concepto, monto, validada, id_usuario, comision) VALUES ('".$fecha."','".$cliente."','".$empresa."','".$concepto."', '".$monto."', '".$validada."', '".$id_usuario."', '".$comision."')";
		
		//echo $sql;
		return sqlInsert($sql);
	}
	function insertDelay($id_project, $id_activity, $text, $date){
		$sql = "INSERT INTO delay (id_project, id_activity, text, date) VALUES ('".$id_project."','".$id_activity."','".$text."', '".$date."')";
		//echo $sql;
		return sqlInsert($sql);
	}
	function insertPart($id_part, $material, $cut, $machining, $status, $status_cut, $id_project, $name_designer){
		$sql = "INSERT INTO parts (id_part, material, cut, machining, status,  status_cut, id_project, name_designer) VALUES ('".$id_part."','".$material."','".$cut."', '".$machining."', '".$status."', '".$status_cut."','".$id_project."','".$name_designer."')";
		//echo $sql;
		return sqlInsert($sql);
	}
	function insertActivity($due_date, $start_date, $name, $id_project, $status){
		$sql = "INSERT INTO activity (due_date, start_date, name, id_project, status) VALUES ('".$due_date."', '".$start_date."', '".$name."','".$id_project."',  '".$status."')";
		//echo $sql;
		return sqlInsert($sql);
	}
	function insertProject($due_date, $start_date, $name, $client, $description){
		$sql = "INSERT INTO project (due_date, start_date, name, client, description) VALUES ('".$due_date."', '".$start_date."', '".$name."','".$client."',  '".$description."')";
		//echo $sql;
		return sqlInsert($sql);
	}
	function insertPurchase($name, $cost, $id_project){
		$status = "Requiere";
		$sql = "INSERT INTO purchases (name, cost, id_project, status) VALUES ('".$name."', '".$cost."', '".$id_project."', '".$status."')";
		//echo $sql;
		return sqlInsert($sql);
	}
	function insertVendedor($id_usser, $comision, $nombre){
		$puesto = "Vendedor";
		$sql = "INSERT INTO vendedores (id_usuario, nombre, comision) VALUES ('".$id_usser."','".$nombre."','".$comision."')";
		//echo $sql;
		return sqlInsert($sql);
	}
	
	function updateStatusActivity($status, $id_activity){
		$sql = "UPDATE activity SET status = '".$status."' WHERE id_activity = '".$id_activity."' "; 
		return sqlInsert($sql);
}
	function updateCut($id_part){
		$status = "Complete";
	$sql = "UPDATE parts SET status_cut = '".$status."' WHERE id_part = '".$id_part."' "; 
	return sqlInsert($sql);
	}

	function updatePurchase($id_purchase){
		$status = "Done";
	$sql = "UPDATE purchases SET status = '".$status."' WHERE id_purchase = '".$id_purchase."' "; 
	return sqlInsert($sql);
	}

	function updateStatus($id_part){
		$status = "Complete";
	$sql = "UPDATE parts SET status = '".$status."' WHERE id_part = '".$id_part."' "; 
	return sqlInsert($sql);
	}
	//Funcion para buscar un libro con algun termino de busquedas


	
	function getSelect($sTableName, $sClass){
		$sql = "SELECT * FROM ".$sTableName;
		
		$selectData = sqlSelect($sql);
		
		$html = "<select class='".$sClass."' name='".$sTableName."'>";
		
		foreach( $selectData as $option ){
			$html .= "<option value='".$option[0]."'>".$option[1]."</option>";
		}
		
		$html .= "</select>";
		
		return $html;
	}

	function getSelectValidacion($id_ventas, $id_project){
		$sql = "SELECT validada FROM  ventas WHERE id_ventas = $id_ventas";
		$no = "No";
		$si = "Si";
		$selectData = sqlSelect($sql);

		if($selectData[0][0] == 'Si'){
			$html = "<form method='post' class='form-inline' name='myform' action='?id_project=".$id_project."'>";
			$html .= "<select class='form-control mb-2 mr-sm-2' name='valida'>";
			$html .= "<option value='Si'>".$selectData[0][0]."</option>";
			$html .= "<option value='No'>No</option>";
			$html .= "</select>";
			$html .= "<input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_ventas' value=".$id_ventas." id='id_ventas'>";
			$html .= "<input class='btn btn-primary mb-2' type='submit' name='validar' value='Validar'>";
			$html .= "</form>";
			return $html;
		}else{
			$html = "<form method='post' class='form-inline' name='myform' action='index.php'>";
			$html .= "<select class='form-control mb-2 mr-sm-2' name='valida'>";
			$html .= "<option value='No'>".$selectData[0][0]."</option>";
			$html .= "<option value='Si'>Si</option>";
			$html .= "</select>";
			$html .= "<input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_ventas' value=".$id_ventas." id='id_ventas'>";
			$html .= "<input class='btn btn-primary mb-2' type='submit' name='validar' value='Validar'>";
			$html .= "</form>";
			return $html;
		}
		
	}


	function getProjectListScreen(){
		$sql = "SELECT id_project FROM project";
		$id_projects = sqlSelect($sql);

		$html = "<ul>";
		foreach( $id_projects as $id_project ){
			$name = getNameProject($id_project[0]);
			$html .= "<li>";
			$html .= "<a href='../project/?id_project=".$id_project[0]."'>".$name[0][0]."</a>";
			$html .= "</li>";
		}
		$html .= "</ul>";
		return $html;
	}
	function getProjectList(){
		$sql = "SELECT id_project FROM project";
		$id_projects = sqlSelect($sql);

		$html = "<ul>";
		foreach( $id_projects as $id_project ){
			$name = getNameProject($id_project[0]);
			$html .= "<li>";
			$html .= "<a href='project/?id_project=".$id_project[0]."'>".$name[0][0]."</a>";
			$html .= "</li>";
		}
		$html .= "</ul>";
		return $html;
	}

	function getProjectCard(){
		$sql = "SELECT * FROM project";
		$projects = sqlSelect($sql);
		
		$html = "<div class='col-md-6'>";
		foreach( $projects as $project ){
		$html .= "<div class='row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>";
        $html .= "<div class='col p-4 d-flex flex-column position-static'>";
	
		$html .= "<strong class='d-inline-block mb-2 text-primary'>".$project[4]."</strong>";
          $html .= "<h3 class='mb-0'>".$project[3]."</h3>";
          $html .= "<p class='card-text mb-auto'>".$project[4]."</p>";
          $html .= "<a href='project/?id_project=".$project[0]."' class='stretched-link'>Go to project</a>";
		  $html .= "</div>";
        $html .= "<div class='col-auto d-none d-lg-block'>";
		$html .= "<svg class='bd-placeholder-img' width='200' height='250' xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='xMidYMid slice' focusable='false' role='img' aria-label='Placeholder: ".$project[3]."'><title>".$project[3]."</title><rect width='100%' height='100%' fill='#55595c'></rect><text x='50%' y='50%' fill='#eceeef' dy='.3em'>".$project[3]."</text></svg>";
		
		$html .= "</div>";
		$html .= "</div>";
		}
		$html .= "</div>";
		
		
		
		return $html;
	}
	function getPurchasesList(){
		$sql = "SELECT id_project FROM project";
		$id_projects = sqlSelect($sql);

		$html = "<ul>";
		foreach( $id_projects as $id_project ){
			$name = getNameProject($id_project[0]);
			$html .= "<li>";
			$html .= "<a href='purchases/purchasesList.php?id_project=".$id_project[0]."'>".$name[0][0]."</a>";
			$html .= "</li>";
		}
		$html .= "</ul>";
		return $html;
	}
	function getPurchasesListScreen(){
		$sql = "SELECT id_project FROM project";
		$id_projects = sqlSelect($sql);

		$html = "<ul>";
		foreach( $id_projects as $id_project ){
			$name = getNameProject($id_project[0]);
			$html .= "<li>";
			$html .= "<a href='../purchases/purchasesList.php?id_project=".$id_project[0]."'>".$name[0][0]."</a>";
			$html .= "</li>";
		}
		$html .= "</ul>";
		return $html;
	}
	function getProductionList(){
		$sql = "SELECT id_project FROM project";
		$id_projects = sqlSelect($sql);

		$html = "<ul>";
		foreach( $id_projects as $id_project ){
			$name = getNameProject($id_project[0]);
			$html .= "<li>";
			$html .= "<a href='production/?id_project=".$id_project[0]."'>".$name[0][0]."</a>";
			$html .= "</li>";
		}
		$html .= "</ul>";
		return $html;
	}
	function getProductionListScreen(){
		$sql = "SELECT id_project FROM project";
		$id_projects = sqlSelect($sql);

		$html = "<ul>";
		foreach( $id_projects as $id_project ){
			$name = getNameProject($id_project[0]);
			$html .= "<li>";
			$html .= "<a href='../production/?id_project=".$id_project[0]."'>".$name[0][0]."</a>";
			$html .= "</li>";
		}
		$html .= "</ul>";
		return $html;
	}

	function getActivityList($id_project){
		$sql = "SELECT * FROM activity WHERE id_project = $id_project";
		$activities = sqlSelect($sql);

		$html = "<ul class='list-group'>";
		foreach( $activities as $activity ){
			$html .= "<li class='list-group-item d-flex justify-content-between align-items-center'> ".$activity[1]."";
			$html .= "<span class ='font-weight-bold'> ".$activity[5]." </span>";
			$html .= "<form class='form-inline' method='Post' action='update.php?id_project=".$id_project."'>";
			$html .= "<select class='form-group mr-sm-1' name='status'>";
			$html .= "<option value='In-progress'>In-progress</option>";
			$html .= "<option value='Done'>Done</option>";
			$html .= "</select>";
			$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_activity' id='id_activity' value=".$activity[0].">";
			$html .= "<input type='submit' class='btn btn-primary name='actualizar' value='Actualizar'>";
			$html .= "</form>";
			$html .= "<form class='form-inline' method='Post' action='delay.php'>";
			$html .= " <input class='form-control mb-2 mr-sm-2'  type='text' name='text' id='text'>";
			$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_activity' id='id_activity' value=".$activity[0].">";
			$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_project' id='id_project' value=".$activity[4].">";
			$html .= "<input type='submit' class='btn btn-danger name='delay' value='Retraso'>";
			$html .= "</form>";
			$html .= "</li>";
		}
		$html .= "</ul>";
		return $html;
	}
	function getPurchaseGeneral(){
		$sql = "SELECT * FROM purchases";
		$purchases = sqlSelect($sql);

		$html = "<ul class='list-group'>";
		foreach( $purchases as $purchase ){
			$name = getNameProject($purchase[2]);
			$html .= "<li class='list-group-item d-flex justify-content-between align-items-center'> ".$purchase[1]."";
			$html .= "<span class ='font-weight-bold'> $".$purchase[3].".00 </span>";
			$html .= "<span class ='font-weight-bold'> ".$purchase[4]." </span>";
			$html .= "<span class ='font-weight-bold'> ".$name[0][0]." </span>";
			$html .= "</li>";
			$html .= "  <hr class='mb-4'>";
		}
		$html .= "</ul>";
		return $html;
	}
	function getPurchaseList($id_project){
		$sql = "SELECT * FROM purchases WHERE id_project = $id_project";
		$purchases = sqlSelect($sql);

		$html = "<ul class='list-group'>";
		foreach( $purchases as $purchase ){
			$html .= "<li class='list-group-item d-flex justify-content-between align-items-center'> ".$purchase[1]."";
			$html .= "<span class ='font-weight-bold'> $".$purchase[3].".00 </span>";
			$html .= "<span class ='font-weight-bold'> ".$purchase[4]." </span>";
			if($purchase[4] == 'Done'){
				
			}
			else{
				$html .= "<form class='form-inline' method='Post' action='updatePurchase.php'>";
				$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_purchase' id='id_purchase' value=".$purchase[0].">";
				$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_project' id='id_project' value=".$purchase[2].">";
				$html .= "<input type='submit' class='btn btn-primary name='actualizar' value='Actualizar'>";
				$html .= "</form>";
			}
			$html .= "</li>";
			$html .= "  <hr class='mb-4'>";
		}
		$html .= "</ul>";
		return $html;
	}
	function getPartsGeneral(){
		$sql = "SELECT * FROM parts";
		$parts = sqlSelect($sql);

		$html = "<ul class='list-group'>";
		foreach( $parts as $part ){
			$name = getNameProject($part[6]);
			$html .= "<li class='list-group-item d-flex justify-content-between align-items-center'> ".$part[0]."";
			$html .= "<span class ='font-weight-bold'> ".$part[1]." </span>";
			$html .= "<span class ='font-weight-bold'> ".$part[2]." </span>";
			$html .= "<span class ='font-weight-bold'> ".$part[5]." </span>";
			$html .= "<span class ='font-weight-bold'> ".$part[4]." </span>";
			$html .= "<span class ='font-weight-bold'> ".$name[0][0]." </span>";
			$html .= "</li>";
			$html .= "  <hr class='mb-4'>";
		}
		$html .= "</ul>";
		return $html;
	}
	function getPartsList($id_project){
		$sql = "SELECT * FROM parts WHERE id_project = $id_project";
		$parts = sqlSelect($sql);

		$html = "<ul class='list-group'>";
		foreach( $parts as $part ){
			$html .= "<li class='list-group-item d-flex justify-content-between align-items-center'> ".$part[0]."";
			$html .= "<span class ='font-weight-bold'> ".$part[1]." </span>";
			$html .= "<span class ='font-weight-bold'> ".$part[2]." </span>";
			$html .= "<span class ='font-weight-bold'> ".$part[5]." </span>";
			if($part[5] == "Complete"){

			}else{
				$html .= "<form class='form-inline' method='Post' action='updateCut.php'>";
				$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_project' id='id_project' value=".$part[6].">";
				$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_part' id='id_part' value=".$part[0].">";
				$html .= "<input type='submit' class='btn btn-primary name='actualizar' value='Actualizar'>";
				$html .= "</form>";
			}
			
			$html .= "<span class ='font-weight-bold'> ".$part[4]." </span>";
			if($part[4] == "Complete"){

			}else{
			$html .= "<form class='form-inline' method='Post' action='updateStatus.php'>";
			$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_project' id='id_project' value=".$part[6].">";
			$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_part' id='id_part' value=".$part[0].">";
			$html .= "<input type='submit' class='btn btn-primary name='actualizar' value='Actualizar'>";
			$html .= "</form>";
			}
			$html .= "</li>";
			$html .= "  <hr class='mb-4'>";
		}
		$html .= "</ul>";
		return $html;
	}
	

	function getActivity($id_project){
		$sql = "SELECT * FROM activity WHERE id_project = $id_project";
		$data = sqlSelect($sql);
		$html = "<ul class='chart-bars'>";
		foreach( $data as $value ){
			if($value[5] == 'Done'){
				$color = "#00AD43";
			}
			if($value[5] == 'In-progress'){
				$color = "#FEDF00";
			}
			if($value[5] == 'No initiated'){
				$color = "#ED2939";
			}
			$sql = "SELECT WEEKOFYEAR(due_date) FROM activity WHERE id_activity = $value[0]";
			$finish = sqlSelect($sql);
			$sql = "SELECT WEEKOFYEAR(start_date) FROM activity WHERE id_activity = $value[0]";
			$start = sqlSelect($sql);
			$html .= "<li data-duration='".$start[0][0]."-".$finish[0][0]."' data-color=".$color.">".$value[1]."</li>";
		}
		
		$html .= "</ul>";
		return $html;
	}

	function getWeeks($id_project){
		$sql = "SELECT WEEKOFYEAR(due_date) FROM project WHERE id_project = $id_project";
		$due_date = sqlSelect($sql);
		$sql = "SELECT WEEKOFYEAR(start_date) FROM project WHERE id_project = $id_project";
		$start_date = sqlSelect($sql);
		$html = "<ul class='chart-values'>";
		for($x = $start_date[0][0]; $x <= $due_date[0][0]; $x++){
			$html .= "<li>".$x."</li>";
		}
		$html .= "</ul>";
		return $html;
	}

	function getNameProject($id_project){
		$sql = "SELECT name FROM project WHERE id_project = '$id_project'";
		$name = sqlSelect($sql);
		return $name;
	}
	
	