 <?php 
    error_reporting(0);
    include("../../conexion.php");
    $query = "SELECT ID_Grupo_Carrera, FK_ID_Grupo, FK_ID_Carrera, grupo.Semestre as Semestre, grupo.Letra as Letra, carrera.Nombre as NombreCarr FROM grupo_carrera INNER JOIN grupo ON FK_ID_Grupo = grupo.ID_Grupo INNER JOIN carrera ON FK_ID_Carrera = carrera.ID_Carrera WHERE Activo = 1";
    $registroGrupoCarrera = $con->query($query);
    //CREAMOS ARRAY
    $i=0;
    $tablaGrupoCarrera = "";
    foreach ($registroGrupoCarrera as $row) {
        $tablaGrupoCarrera.='{"ID":"'.$row['ID_Grupo_Carrera'].'","Grupo":"'.$row['Semestre'].' - '.$row['Letra'].'","Carrera":"'.$row['NombreCarr'].'"},';     
    }
         
    $tablaGrupoCarrera = substr($tablaGrupoCarrera,0, strlen($tablaGrupoCarrera) - 1);
    echo '{"data":['.$tablaGrupoCarrera.']}';   
?>