<?php 
include("../../conexion.php");
	if ($_POST["funcion"] == "DataListGrupoCarrera") {
		$buscar = $con->query("SELECT ID_Grupo_Carrera, FK_ID_Grupo, FK_ID_Carrera, grupo.Semestre as nomSemes, grupo.Letra as letra, carrera.Nombre as NomCarrera FROM grupo_carrera INNER JOIN grupo ON grupo_carrera.FK_ID_Grupo = grupo.ID_Grupo INNER JOIN carrera ON grupo_carrera.FK_ID_Carrera =  carrera.ID_Carrera WHERE Activo = 1");
		if ($buscar) {
			echo '<option value="0" disabled selected>Seleccione una opción</option>';
			foreach ($buscar as $fila) {
				echo "<option value ='$fila[ID_Grupo_Carrera]'>$fila[NomCarrera] : $fila[nomSemes] - $fila[letra]</option>";
			} 
		}else{
				echo "Problemas en la consulta";
		}
	}
	if ($_POST["funcion"] == "DataListMateria") {
		$buscar = $con->query("SELECT ID_Materia, Nombre, Codigo FROM materias");
		if ($buscar) {
			echo '<option value="0" disabled selected>Seleccione una opción</option>';
			foreach ($buscar as $fila) {
				echo "<option value ='$fila[ID_Materia]'>$fila[Nombre] : $fila[Codigo]</option>";
			} 
		}else{
				echo "Problemas en la consulta";
		}
	}
	if ($_POST["funcion"] == "datalistLaboratorio") {
		$buscar = $con->query("SELECT ID_Laboratorio, Nombre, Capacidad FROM laboratorio WHERE Activo = 1");
		print("SELECT ID_Laboratorio, Nombre, Capacidad FROM laboratorio WHERE Activo = 1");
		if ($buscar) {
			echo '<option value="0" disabled selected>Seleccione una opción</option>';
			foreach ($buscar as $fila) {
				echo "<option value ='$fila[ID_Laboratorio]'>$fila[Nombre] - Capacidad: $fila[Capacidad]</option>";
			} 
		}else{
				echo "Problemas en la consulta";
		}
	}
?>