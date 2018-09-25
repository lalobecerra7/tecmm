 <?php 
    error_reporting(0);
    include("../../conexion.php");
    $query = "SELECT ID_Usuario, usuario.Nombre as NombreUsuario, Contrasenia, tipo_usuario.Nombre as NombreTipo, maestros.Nombre as NombreMaestro FROM usuario LEFT JOIN tipo_usuario ON FK_ID_Tipo_Usuario = ID_Tipo_Usuario INNER JOIN maestros ON FK_ID_Usuario = ID_Usuario WHERE Activo = 1";
    $registroUsuario = $con->query($query);
    //CREAMOS ARRAY
    $i=0;
    $tablaUsuario = "";
    foreach ($registroUsuario as $row) {
        $tablaUsuario.='{"ID":"'.$row['ID_Usuario'].'","Nombre completo":"'.$row['NombreMaestro'].'","Nombre":"'.$row['NombreUsuario'].'","Contraseña":"'.$row['Contrasenia'].'","Tipo":"'.$row['NombreTipo'].'"},';     
    }
         
    $tablaUsuario = substr($tablaUsuario,0, strlen($tablaUsuario) - 1);
    echo '{"data":['.$tablaUsuario.']}';   
?>