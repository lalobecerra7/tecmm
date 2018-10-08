<?php
  include("../../conexion.php");
  session_start();

  if(isset($_SESSION['Nombre'])==false){
        header('Location: ../../');
    }
    $buscarMa = $con->query("SELECT * FROM maestros WHERE FK_ID_Usuario = '".$_SESSION['Nombre']['ID_Usuario']."'");
    foreach($buscarMa as $fila);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  include("../header.php");
   ?>
</head>
<body>
 <?php 
 include("../../menu.php");
  ?>
<br>
<div class="row">
  <div class="container-fluid">
    <div class="text-center">
      <h1>Bitácoras</h1>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="container-fluid">
    <div class="col-auto">
        <button class="btn btnAgregar btn-block" data-toggle="modal" data-target="#ModalBitacoras"><b>Agregar Bitácora</b></button>
    </div>
  </div>  
</div>

<!--MODAL DE BITACORAS-->
<div class="modal fade" id="ModalBitacoras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header headerModal">
        <h5 class="modal-title" id="exampleModalLabel">Bitácora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="FormBitacora">
        <div class="modal-body">
            <input type="text" class="form-control" id="IDMaestro" value="<?php echo $fila["ID_Maestro"] ?>" style="display: none;">
            <div class="row">
                  <div class="col-lg-6">
                  <div class="form-group">
                        <label for="datalistGrupoCarreraB"><b>Grupo - Carrera</b></label>
                        <select class="form-control" id="datalistGrupoCarreraB">
                        </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                        <label for="datalistMateriaB"><b>Materia</b></label>
                        <select class="form-control" id="datalistMateriaB">
                        </select>
                  </div>
                </div>
            </div>
            <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="numeroAlumnos"><b>N° Alumnos</b></label>
                      <input type="number" min="0" class="form-control" id="numeroAlumnos" placeholder="Numero de alumnos" required>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label for="ProgramaUtilizar"><b>Programa a utilizar</b></label>
                      <input type="text" class="form-control" id="ProgramaUtilizar" placeholder="¿Qué software/Programa utilizarás?" required>
                    </div>
                  </div>
            </div>
             <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="FechaBitacora"><b>Fecha</b></label>
                      <input type="date" class="form-control" id="FechaBitacora" required>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="EntradaBitacora"><b>Entrada</b></label>
                      <input type="time" class="form-control" id="EntradaBitacora" required value="07:00" min="07:00" max="21:00">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="SalidaBitacora"><b>Salida</b></label>
                      <input type="time" class="form-control" id="SalidaBitacora" required value="21:59"  min="07:00" max="21:00">
                    </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-12">
                    <textarea class="form-control" rows="5" placeholder="Observaciones" id="ObservacionesBita"></textarea>
                  </div>
            </div>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn  Guardar">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
<br>
  <div class="row">
    <div class="container-fluid">
      <div class="col-lg-12">
        <table id="tablaBitacora" class="table dt-responsive" style="width: 100%;">
            <thead>
                <tr>
                  <td style="width: 120px;">Acciones</td>
                    <td>ID</td>
                    <td>Grupo</td>
                    <td>Carrera</td>
                    <td>Materia</td>
                    <td>Alumnos</td>
                    <td>Programa utilizado</td>
                    <td>Hora de entrada</td>
                    <td>Hora de salida</td>
                    <td>Fecha</td>
                    <td>Observaciones</td>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                  <td style="width: 120px;">Acciones</td>
                    <td>ID</td>
                    <td>Grupo</td>
                    <td>Carrera</td>
                    <td>Materia</td>
                    <td>Alumnos</td>
                    <td>Programa utilizado</td>
                    <td>Hora de entrada</td>
                    <td>Hora de salida</td>
                    <td>Fecha</td>
                    <td>Observaciones</td>
                </tr>
            </tfoot>
        </table>
      </div>
    </div>  
  </div>

</body>
 <?php 
  include("../footer.php");
   ?>
   <script src="../../JS/bitacora.js"></script>
   <script src="../../wickedpicker-master/src/wickedpicker.js"></script>
</html>