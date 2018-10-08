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
      <h1>Materia - Grupo</h1>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="container-fluid">
    <div class="col-auto">
        <button class="btn btnAgregar btn-block" data-toggle="modal" data-target="#ModalGrupoCarrera"><b>Asignar</b></button>
    </div>
  </div>  
</div>

<!--MODAL DE BITACORAS-->
<div class="modal fade" id="ModalGrupoCarrera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header headerModal">
        <h5 class="modal-title" id="exampleModalLabel">Asignar una Materia a un Grupo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                        <label for="datalistGrupoCarrera"><b>Grupo - Carrera</b></label>
                        <select class="form-control" id="datalistGrupoCarrera">
                        </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                        <label for="datalistMateria"><b>Materia</b></label>
                        <select class="form-control" id="datalistMateria">
                        </select>
                  </div>
                </div>
          </div>
          <div class="row">
             <div class="col-lg-6">
               <div class="form-group">
                    <label>Maestro</label>
                    <input type="text" class="form-control" value="<?php echo $NombreMaestro['Nombre'] ?>" disabled>
               </div>
             </div>
             <div class="col-lg-6" style="display: none;">
               <div class="form-group">
                    <label>ID</label>
                    <input type="text" id="IDMaestro" class="form-control" value="<?php echo $NombreMaestro['ID_Maestro'] ?>" disabled>
               </div>
             </div>
            <div class="col-lg-6">
               <div class="form-group">
                    <label>Cantidad</label>
                    <input type="number" class="form-control" id="CantidadMatGrupo" value="" min="0">
               </div>
             </div>
          </div>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn  Guardar" id="GuardarMatGrupo">Guardar Cambios</button>
        </div>
    </div>
  </div>
</div>
<br>
  <div class="row">
    <div class="container-fluid">
      <div class="col-lg-12">
        <table id="tablaMateriaGrupo" class="table dt-responsive" style="width: 100%;">
            <thead>
                <tr>
                  <td style="width: 120px;">Acciones</td>
                    <td>ID</td>
                    <td>Maestro</td>
                    <td>Carrera</td>
                    <td>Grupo</td>
                    <td>Materia</td>
                    <td>Cantidad</td>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                   <td style="width: 120px;">Acciones</td>
                    <td>ID</td>
                    <td>Maestro</td>
                    <td>Carrera</td>
                    <td>Grupo</td>
                    <td>Materia</td>
                    <td>Cantidad</td>
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
    <script src="../../JS/MateriaGrupo.js"></script>

</html>