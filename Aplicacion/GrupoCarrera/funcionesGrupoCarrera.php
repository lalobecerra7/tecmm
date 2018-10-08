<?php 
include("../../conexion.php");
	if ($_POST["funcion"] == "DataListGrupo") {
		$buscar = $con->query("SELECT ID_Grupo, Semestre, Letra FROM grupo");
		if ($buscar) {
			echo '<option value="0" disabled selected>Seleccione una opción</option>';
			foreach ($buscar as $fila) {
				echo "<option value ='$fila[ID_Grupo]'>$fila[Semestre] : $fila[Letra]</option>";
			} 
		}else{
				echo "Problemas en la consulta";
		}
	}
	if ($_POST["funcion"] == "DataListCarrera") {
		$buscar = $con->query("SELECT ID_Carrera, Nombre, Plan_estudios FROM carrera");
		if ($buscar) {
			echo '<option value="0" disabled selected>Seleccione una opción</option>';
			foreach ($buscar as $fila) {
				echo "<option value ='$fila[ID_Carrera]'>$fila[Nombre] : $fila[Plan_estudios]</option>";
			} 
		}else{
				echo "Problemas en la consulta";
		}
	}
	if ($_POST["funcion"] == "InsertarRelacion") {
		$buscar = $con->query("SELECT * FROM grupo_carrera WHERE FK_ID_Grupo = $_POST[grupo] AND FK_ID_Carrera = $_POST[carrera]");
		$fila=0;
		foreach ($buscar as $fila);
			if ($fila[1] == $_POST["grupo"] && $fila[2] == $_POST["carrera"]) {
				echo "Error al guardar";
			}else{
				$insertar = $con->query("INSERT INTO grupo_carrera SET FK_ID_Grupo = '".$_POST["grupo"]."', FK_ID_Carrera = '".$_POST["carrera"]."'");
				if ($insertar) {
					    echo "Guardado correctamente";
				}else{
						echo "Error al guardar";
				}
			}
		
	}
	if ($_POST["funcion"] == "EliminarGrupoCarrera") {
		$borrar = $con->query("UPDATE grupo_carrera SET Activo = 0 WHERE ID_Grupo_Carrera = '".$_POST["id"]."'");
		if ($borrar) {
			 echo "Guardado correctamente";
		}else{
			echo "Error al guardar";
		}
	}
 ?>		
