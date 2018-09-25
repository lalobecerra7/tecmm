<?php 
include("../../conexion.php");
	if ($_POST["funcion"] == "InsertarUsuario") {
		$Insertar = "INSERT INTO usuario SET Nombre = '".$_POST["Usuario"]."', Contrasenia = '".$_POST["Contra"]."', FK_ID_Tipo_Usuario = '".$_POST["Tipo"]."', Activo = 1";
		if($con->query($Insertar)){
			$id=$con->lastInsertId();
			if ($Insertar) {
			$InsertarMaestro = $con->query("INSERT INTO maestros SET Nombre = '".$_POST["Nombre"]."', FK_ID_Usuario = $id");
				if ($InsertarMaestro) {
					echo "Guardado correctamente";
				}else{
					echo "Error al guardar";
				}
			}else{
				echo "Error al guardar";
			}
		}else{
				echo "Error al guardar";
			}
	}
	if ($_POST["funcion"] == "EliminarUsuario") {
		$borrar = $con->query("UPDATE usuario SET Activo = 0  WHERE ID_Usuario = '".$_POST["id"]."'");
		if ($borrar) {
			echo "Eliminado correctamente";
		}else{
			echo "Error al guardar";
		}
	}
 ?>