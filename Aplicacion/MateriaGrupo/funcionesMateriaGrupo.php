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
	if ($_POST["funcion"] == "InsertarRelacion") {
		$buscar = $con->query("SELECT * FROM materia_grupo WHERE FK_ID_Grupo_Carrera = $_POST[IDGruCarr] AND FK_ID_Materia = $_POST[IDMate] AND FK_ID_Maestro = $_POST[IDMaestro]");
		$fila=0;
		foreach ($buscar as $fila);
			if ($fila[1] == $_POST["IDGruCarr"] && $fila[2] == $_POST["IDMate"] && $fila[3] == $_POST["IDMaestro"]) {
				echo "Error al guardar";
			}else{
				$insertar = $con->query("INSERT INTO materia_grupo SET FK_ID_Grupo_Carrera = '".$_POST["IDGruCarr"]."', FK_ID_Materia = '".$_POST["IDMate"]."', FK_ID_Maestro = '".$_POST["IDMaestro"]."', Cantidad = '".$_POST["Cantidad"]."'");
				if ($insertar) {
					    echo "Guardado correctamente";
				}else{
						echo "Error al guardar";
				}
			}
		
	}
	if ($_POST["funcion"] == "EliminarMatGrupo") {
		$borrar = $con->query("DELETE FROM materia_grupo WHERE ID_Materia_Grupo = '".$_POST["id"]."'");
		if ($borrar) {
			echo "Eliminado Correctamente";
		}else{
			echo "Error al eliminar";
		}
	}
 ?>		
