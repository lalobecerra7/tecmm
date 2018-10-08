<?php
  include("../../conexion.php");
  session_start();

  if(isset($_SESSION['Nombre'])==false){
        header('Location: ../../');
    }
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
      <h1>Grupo - Carrera</h1>
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
        <h5 class="modal-title" id="exampleModalLabel">Asignar una Carrera a un Grupo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                      <label for="datalistGrupo"><b>Grupo</b></label>
                      <select class="form-control" id="datalistGrupo">
                      </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                      <label for="datalistCarrera"><b>Carrera</b></label>
                      <select class="form-control" id="datalistCarrera">
                      </select>
                </div>
              </div>
        </div>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn  Guardar" id="guardarGruCar">Guardar Cambios</button>
        </div>
    </div>
  </div>
</div>
<br>
  <div class="row">
    <div class="container-fluid">
      <div class="col-lg-12">
        <table id="tablaGrupoCarrera" class="table dt-responsive" style="width: 100%;">
            <thead>
                <tr>
                  <td style="width: 120px;">Acciones</td>
                    <td>ID</td>
                    <td>Grupo</td>
                    <td>Carrera</td>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                   <td style="width: 120px;">Acciones</td>
                    <td>ID</td>
                    <td>Grupo</td>
                    <td>Carrera</td>
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
    <script src="../../JS/GrupoCarrera.js"></script>

</html>