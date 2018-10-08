<?php
  include("../../conexion.php");
  session_start();

  if(isset($_SESSION['Nombre'])==false){
        header('Location: ../../');
    }

  $Maestro = $con->query("SELECT * FROM maestros WHERE FK_ID_Usuario = '".$_SESSION['Nombre']['ID_Usuario'] ."'");
  foreach($Maestro as $NombreMaestro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  include("../header.php");
   ?>
   <link rel="stylesheet" href="../../CSS/estilo.css">
</head>
<body>
 <?php 
 include("../../menu.php");
  ?>
<br>
<div class="row">
  <div class="container-fluid">
    <div class="text-center">
      <h1>Prácticas</h1>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="container-fluid">
    <div class="col-auto">
        <button class="btn btnAgregar btn-block" data-toggle="modal" data-target="#ModalPractica"><b>Agregar Práctica</b></button>
    </div>
  </div>  
</div>
<!--:::::::::::::::::::::::::::::::::::::::::::::MODAL DE AGREGAR PRACTICAS::::::::::::::::::::::::::::::::::::::::::::::-->
<div class="modal fade" id="ModalPractica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header headerModal">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Práctica</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="FormUsuario">
        <div class="modal-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                        <label for="datalistGrupoCarreraP"><b>Grupo - Carrera</b></label>
                        <select class="form-control" id="datalistGrupoCarreraP">
                        </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                        <label for="datalistMateriaP"><b>Materia</b></label>
                        <select class="form-control" id="datalistMateriaP">
                        </select>
                  </div>
                </div>
                <div class="col-lg-6" style="display: none;">
                   <div class="form-group">
                        <label>ID</label>
                        <input type="text" id="IDMaestro" class="form-control" value="<?php echo $NombreMaestro['ID_Maestro'] ?>" disabled>
                   </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                        <label for="datalistLaboratorio"><b>Laboratorios</b></label>
                        <select class="form-control" id="datalistLaboratorio">
                        </select>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                        <label for="UnidadPractica"><b>Unidad</b></label>
                        <input type="text" id="UnidadPractica" class="form-control">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-group">
                        <label for="CantidadPractica"><b>Cantidad</b></label>
                        <input type="text" id="CantidadPractica" class="form-control">
                  </div>
                </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn Guardar">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>


</body>
 <?php 
  include("../footer.php");
   ?>
    <script src="../../JS/practicas.js"></script>

</html>