<?php
	include("conexion.php");
	$res= "";
	session_start();
	sleep(1);
	
	$usuario = $con->quote($_POST["usuario"]);
	$contra = $con->quote($_POST["contra"]);

	$select = ("SELECT * FROM usuario WHERE Nombre = $usuario AND Contrasenia = $contra AND Activo = 1");
	if($select){
		foreach($con->query($select) as $res);
		if($res == ""){
			echo "Error";
		}else{
			$_SESSION['Nombre'] = $res;
		}
	}else{
		echo "Error al consultar los datos";
	}
	$con=null;
?>