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
	if ($_POST["funcion"] == "MostrarUsuario") {
		$buscar = $con->query("SELECT * FROM usuario WHERE ID_Usuario = '".$_POST["ID"]."'");
		foreach ($buscar as $fila);
		$buscarMaestro = $con->query("SELECT * FROM maestros WHERE FK_ID_Usuario = '".$_POST["ID"]."'");
		foreach ($buscarMaestro as $fila1);
		echo '  

			<input type="button" id="IDUsu" value="'.$fila["ID_Usuario"].'" style="display:none">
			<div class="form-group">
              <label for="NombreUsuario"><b>Nombre Completo</b></label>
              <input type="text" class="form-control" id="NombreCompletoUsuarioE" value="'.$fila1["Nombre"].'" required>
            </div>
            <div class="form-group">
              <label for="NombreUsuario"><b>Nombre de Usuario</b></label>
              <input type="text" class="form-control" id="NombreUsuarioE" value="'.$fila["Nombre"].'" required>
            </div>
            <div class="form-group">
              <label for="ContraUsuario"><b>Contraseña</b></label>
              <input type="password" class="form-control" id="ContraUsuarioE" value="'.$fila["Contrasenia"].'" required>
            </div>
            <div class="form-group">
              <label for="tipoUsuario"><b>Tipo de Usuario</b></label>
              <select class="form-control" id="tipoUsuarioE" required>';
                if ($fila["FK_ID_Tipo_Usuario"] == "1") {
                echo '<option value="0" disabled>Seleccione una opción</option>
					  <option value="1" selected>Administrador</option>
                	  <option value="2">Maestro</option>
                ';
                }else if ($fila["FK_ID_Tipo_Usuario"] == "2"){
 				echo '<option value="0" disabled>Seleccione una opción</option>
					  <option value="1" >Administrador</option>
                	  <option value="2" selected>Maestro</option>
                ';
                }else{
                echo '<option value="0" selected disabled>Seleccione una opción</option>
					  <option value="1" >Administrador</option>
                	  <option value="2">Maestro</option>
                ';	
                }      
              echo '</select>
            </div>	

		'	;
	}
	if ($_POST["funcion"] == "ModificarUsuario") {
		$modificar = $con->query("UPDATE usuario SET Nombre = '".$_POST["Usuario"]."', Contrasenia = '".$_POST["Contra"]."', FK_ID_Tipo_Usuario = '".$_POST["Tipo"]."', Activo = 1 WHERE ID_Usuario = '".$_POST["ID"]."'");
		$modMaestro = $con->query("UPDATE maestros SET Nombre = '".$_POST["Nombre"]."' WHERE FK_ID_Usuario = '".$_POST["ID"]."'");
		
		if ($modificar && $modMaestro) {
			echo "Guardado correctamente";
		}else{
			echo "Error al guardar";
		}
	}
	
 ?>