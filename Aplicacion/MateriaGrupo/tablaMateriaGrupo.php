 <?php 
    error_reporting(0);
    include("../../conexion.php");
    $id = $_GET["IDMA"];
    $query = "SELECT ID_Materia_Grupo, FK_ID_Grupo_Carrera, FK_ID_Maestro, maestros.Nombre as NombreMaes, FK_ID_Materia, materias.Nombre as NombreMat, materias.Codigo AS CodiMat, Cantidad FROM materia_grupo INNER JOIN maestros ON FK_ID_Maestro = maestros.ID_Maestro INNER JOIN materias ON FK_ID_Materia = materias.ID_Materia WHERE FK_ID_Maestro = $id";
    
    $registroUsuario = $con->query($query);
    //CREAMOS ARRAY
    $i=0;
    $tablaMatGrupo = "";
    foreach ($registroUsuario as $row) {

        $buscar = $con->query("SELECT `FK_ID_Grupo`, `FK_ID_Carrera`, grupo.Semestre as Semestre, grupo.Letra AS letra, carrera.Nombre as Carrera FROM `grupo_carrera` INNER JOIN grupo ON FK_ID_Grupo = grupo.ID_Grupo INNER JOIN carrera ON FK_ID_Carrera = carrera.ID_Carrera WHERE ID_Grupo_Carrera = $row[FK_ID_Grupo_Carrera]");
        foreach ($buscar as $fila) {

             $tablaMatGrupo.='{"ID":"'.$row['ID_Materia_Grupo'].'","Maestro":"'.$row['NombreMaes'].'","Carrera":"'.$fila['Carrera'].'","Grupo":"'.$fila['Semestre']." - ".$fila['letra'].'","Materia":"'.$row['NombreMat'].'","Cantidad":"'.$row['Cantidad'].'"},';                 
        }

    }
         
    $tablaMatGrupo = substr($tablaMatGrupo,0, strlen($tablaMatGrupo) - 1);
    echo '{"data":['.$tablaMatGrupo.']}';   
?>