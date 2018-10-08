<?php 
include("../../conexion.php");
	if ($_POST["funcion"] == "DataListGrupoCarrera") {
		$buscar = $con->query("SELECT FK_ID_Grupo_Carrera FROM materia_grupo WHERE FK_ID_Maestro = '".$_POST["IDMaestro"]."'");
		echo '<option value="0" disabled selected>Seleccione una opción</option>';
		foreach($buscar as $gpo){
			$buscarGrupo =  $con->query("SELECT ID_Grupo_Carrera, FK_ID_Grupo, FK_ID_Carrera, grupo.Semestre as nomSemes, grupo.Letra as letra, carrera.Nombre as NomCarrera FROM grupo_carrera INNER JOIN grupo ON grupo_carrera.FK_ID_Grupo = grupo.ID_Grupo INNER JOIN carrera ON grupo_carrera.FK_ID_Carrera =  carrera.ID_Carrera WHERE ID_Grupo_Carrera = '".$gpo["FK_ID_Grupo_Carrera"]."'");
			foreach ($buscarGrupo as $fila) {
				echo "<option value ='$fila[ID_Grupo_Carrera]'>$fila[NomCarrera] : $fila[nomSemes] - $fila[letra]</option>";
			} 
		}
	}
	if ($_POST["funcion"] == "DataListMateria") {
		$buscar = $con->query("SELECT ID_Materia_Grupo, FK_ID_Grupo_Carrera, FK_ID_Materia, materias.Nombre as NombreMat, materias.Codigo as CodMateria FROM materia_grupo INNER JOIN materias ON FK_ID_Materia = materias.ID_Materia WHERE FK_ID_Grupo_Carrera= '".$_POST["IDGrupoCarrera"]."' AND FK_ID_Maestro = '".$_POST["IDMaestro"]."'");
		echo '<option value="0" disabled selected>Seleccione una opción</option>';
		foreach ($buscar as $fila) {
			echo "<option value ='$fila[FK_ID_Materia]'>$fila[NombreMat]</option>";
		}
	}
	if ($_POST["funcion"] == "InsertarBitacora") {
		$buscar = $con->query("SELECT * FROM materia_grupo WHERE FK_ID_Grupo_Carrera = '".$_POST["IDGruCarr"]."' AND FK_ID_Materia = '".$_POST["IDMateria"]."' AND FK_ID_Maestro = '".$_POST["IDMaestro"]."'");
		foreach($buscar as $fila);
		$insertar = $con->query("INSERT INTO bitacora SET FK_ID_Materia_Grupo = '".$fila["ID_Materia_Grupo"]."', NoAlumnos	= '".$_POST["NumAlumno"]."', Software_utilizar = '".$_POST["ProgUtili"]."', Horario_entrada = '".$_POST["EntradaBitacora"]."', Horario_salida = '".$_POST["SalidaBitacora"]."', Fecha = '".$_POST["FechaBitacora"]."', Observaciones = '".$_POST["ObservacionesBita"]."'");
		if ($insertar) {
			echo "Guardado correctamente";
		}else{
			echo "Error al guardar";
		}
	}
?>