 <?php 
    error_reporting(0);
    include("../../conexion.php");
    $id = $_GET["IDMA"];
    $query = "SELECT ID_Bitacora, FK_ID_Materia_Grupo, NoAlumnos, Software_utilizar, Horario_entrada, Horario_salida, Fecha, Observaciones, Activo FROM bitacora WHERE Activo = 1";
    $registroBitacora = $con->query($query);
    //CREAMOS ARRAY
    $i=0;
    $tablaBitacora = "";
    foreach ($registroBitacora as $row) {
        
        $buscar = $con->query("SELECT ID_Materia_Grupo, FK_ID_Grupo_Carrera, FK_ID_Materia, materias.Nombre as NomMateria, FK_ID_Maestro, maestros.Nombre as NomMaestro FROM materia_grupo INNER JOIN materias ON FK_ID_Materia = materias.ID_Materia INNER JOIN maestros ON FK_ID_Maestro = maestros.ID_Maestro WHERE ID_Materia_Grupo = $row[FK_ID_Materia_Grupo] AND FK_ID_Maestro = $id");

            foreach ($buscar as $fila) {

               $buscarGrupoCarrera = $con->query("SELECT ID_Grupo_Carrera, FK_ID_Grupo, FK_ID_Carrera, Activo, grupo.Semestre as NomSemes, grupo.Letra as NomLetra, carrera.Nombre as NomCarrera FROM grupo_carrera INNER JOIN grupo ON FK_ID_Grupo = grupo.ID_Grupo INNER JOIN carrera ON FK_ID_Carrera = carrera.ID_Carrera WHERE Activo = 1 AND ID_Grupo_Carrera = $fila[FK_ID_Grupo_Carrera]");

                    foreach ($buscarGrupoCarrera as $fila2) {

                         $tablaBitacora.='{"ID":"'.$row['ID_Bitacora'].'","Grupo":"'.$fila2['NomSemes'].' - '.$fila2['NomLetra'].'","Carrera":"'.$fila2['NomCarrera'].'","Materia":"'.$fila['NomMateria'].'","Alumnos":"'.$row['NoAlumnos'].'","Programa utilizado":"'.$row['Software_utilizar'].'","Hora de entrada":"'.$row['Horario_entrada'].'","Hora de salida":"'.$row['Horario_salida'].'","Fecha":"'.$row['Fecha'].'","Observaciones":"'.$row['Observaciones'].'"},';                        
                    }

            }
            
    }
         
    $tablaBitacora = substr($tablaBitacora,0, strlen($tablaBitacora) - 1);
    echo '{"data":['.$tablaBitacora.']}';   
?>