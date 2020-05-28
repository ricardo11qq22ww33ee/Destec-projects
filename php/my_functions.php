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
	function insertUsuarioVendedor($usuario, $pass){
		$puesto = "Vendedor";
		$sql = "INSERT INTO usuarios (usuario, password, puesto) VALUES ('".$usuario."','".$pass."','".$puesto."')";
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
		$sql = "UPDATE `activity` SET status = '".$status."' WHERE `id_activity` = $id_activity "; 
		return(sqlInsert($sql));
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

	function getSelectValidacion($id_ventas){
		$sql = "SELECT validada FROM  ventas WHERE id_ventas = $id_ventas";
		$no = "No";
		$si = "Si";
		$selectData = sqlSelect($sql);

		if($selectData[0][0] == 'Si'){
			$html = "<form method='post' class='form-inline' name='myform' action='index.php'>";
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

	function getComision($id_usser){
		$sql = "SELECT comision FROM vendedores WHERE id_usuario = '$id_usser' ";
			return sqlSelect($sql);
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
			$html .= "<span class ='font-weight-bold'> ".$activity[7]." </span>";
			$html .= "<form class='form-inline' method='post' action='index.php'>";
			$html .= "<select class='form-group mr-sm-1' name='status'>";
			$html .= "<option value='In-progress'>In-progress</option>";
			$html .= "<option value='Done'>Done</option>";
			$html .= "</select>";
			$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_activity' id='id_activity' value=$activity[0]>";
			$html .= "<input type='submit' class='btn btn-primary name='actualizar' value='Actualizar'>";
			$html .= "</form>";
			$html .= "<form class='form-inline' method='post'>";
			$html .= " <input class='form-control mb-2 mr-sm-2'  type='text' name='text' id='text' value='Escriba el retraso'>";
			$html .= " <input class='form-control mb-2 mr-sm-2'  type='hidden' name='id_activity' id='id_activity' value=".$activity[0].">";
			$html .= "<input type='submit' class='btn btn-danger name='delay' value='Retraso'>";
			$html .= "</form>";
			$html .= "</li>";
		}
		$html .= "</ul>";
		return $html;
	}
	

	function getActivity($id_project){
		$sql = "SELECT * FROM activity WHERE id_project = $id_project";
		$data = sqlSelect($sql);
		$html = "<ul class='chart-bars'>";
		foreach( $data as $value ){
			if($value[7] == 'Done'){
				$color = "#00AD43";
			}
			if($value[7] == 'In-progress'){
				$color = "#FEDF00";
			}
			if($value[7] == 'No initiated'){
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
	function getClientes($sTableName, $sClass){
		$sql = "SELECT * FROM ".$sTableName;
		
		$selectData = sqlSelect($sql);
		
		$html = "<select class='".$sClass."' name='".$sTableName."'>";
		
		foreach( $selectData as $option ){
			$html .= "<option value='".$option[1]."'>".$option[2]."</option>";
		}
		
		$html .= "</select>";
		
		return $html;
	}

	function showTable($res){
		
		if( count($res) > 0 ){
			$html = "<table class='table'>";

			//Genera primer fila de encabezados en tabla
			$keys = array_keys($res[0]);
			$html .= "<tr>";

			foreach($keys as $key){
				if ($key == "id_ventas"){

				}				
				else{

					if( is_string ( $key )){
						if ($key == "id_usuario"){
							$html .= "<th>VENDEDOR</th>";
						}
						else{
							$html .= "<th>".strtoupper($key)."</th>";
						}	
						
					}
				}
				
			}

			$html .= "</tr>";
			//--------------------------------------

			//Genera filas de datos en tabla
			foreach($res as $row) {
				$html .= "<tr>";

				foreach($row as $key=>$valor){
					if ($key == "id_ventas"){
						$id_ventas = $valor;
					}
					else{
						if ($key == "empresa"){
							if( is_string ( $key )){
								$empresa = getEmpresa($valor);
							$empresa = $empresa[0][0];
							$html .= "<td>".$empresa."</td>";
							}
							
						}
						else{
							if ($key == "id_usuario"){
								if( is_string ( $key )){
									$empresa = getVendedor($valor);
								$empresa = $empresa[0][0];
								$html .= "<td>".$empresa."</td>";
								}
							}
							else{
								if ($key == "cliente"){
									if( is_string ( $key )){
										$cliente = getCliente($valor);
									$cliente = $cliente[0][0];
									$html .= "<td>".$cliente."</td>";
									}
								}
								else{
									if($key == 'validada'){
										$sino =  getSelectValidacion($id_ventas);
										$html.= "<td>".$sino."</td>";
									}
									else{
										if( is_string ( $key )){
											$html .= "<td>".$valor."</td>";
										}
									}
									
								}
								
							}
							
						}
						
					}
					
				}

				$html .= "</tr>";			
			}
			//-------------------------------------

			$html .= "</table>";
		}else{
			$html = "<p>No hay registros encontrados...</p>";
		}
		
		return $html;
	}

	function showTable2($res){
		
		if( count($res) > 0 ){
			$html = "<table class='table'>";

			//Genera primer fila de encabezados en tabla
			$keys = array_keys($res[0]);
			$html .= "<tr>";

			foreach($keys as $key){
				if (($key == "id_ventas") ||  ($key == "id_usuario")){
				}				
				else{

					if( is_string ( $key )){
						if ($key == "id_usuario"){
							$html .= "<th>VENDEDOR</th>";
						}
						else{
							$html .= "<th>".strtoupper($key)."</th>";
						}	
						
					}
				}
				
			}

			$html .= "</tr>";
			//--------------------------------------
			$monto = 0;
			$montoComision = 0;
			$acesso = 'no';
			//Genera filas de datos en tabla
			foreach($res as $row) {
				$html .= "<tr>";

				foreach($row as $key=>$valor){
					
					if (($key == "id_ventas") ||  ($key == "id_usuario")){
					}

					
					else{
						if ($key == "empresa"){
							if( is_string ( $key )){
								$empresa = getEmpresa($valor);
							$empresa = $empresa[0][0];
							$html .= "<td>".$empresa."</td>";
							}
						}

						else{
							if ($key == "id_usuario"){
								if( is_string ( $key )){
								$vendedor = getVendedor($valor);
								$vendedor = $vendedor[0][0];
								$html .= "<td>".$vendedor."</td>";
								}
							}
							else{
								if ($key == "cliente"){
									if( is_string ( $key )){
										$cliente = getCliente($valor);
									$cliente = $cliente[0][0];
									$html .= "<td>".$cliente."</td>";
									}
								}
								else{
									if ($key == "monto"){
										$monto = $valor + $monto;
										$comision = $valor;
										}
									if ($key == "validada"){
										if ($valor == "Si"){
											$acesso = 'si';
											}
										}
									if ($key == "comision"){
										if($acesso == 'si'){
										$comision = $comision * ($valor/100);
										$montoComision = $comision + $montoComision;
										$acesso = 'no';
										$comision = 0;
										}
									}
										if( is_string ( $key )){
											$html .= "<td>".$valor."</td>";
									}
									
								}
								
								
							}
							
						}
						
					}
					
				}

				$html .= "</tr>";
			}
			$html .= "<tr>";
			$html .= "<td></td><td></td><td></td><td>total de ventas:</td><td>".$monto."</td><td>total de ventas con comision:</td><td>".$montoComision."</td>";
			$html .= "</tr>";
				$html.="<br>";
			//-------------------------------------


			$html .= "</table>";
			
		}
		else{
			$html = "<p>No hay registros encontrados...</p>";
		}
		
		return $html;
	}
?>