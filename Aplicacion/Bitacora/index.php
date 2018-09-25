<?php
  include("../../conexion.php");
  session_start();

  if(isset($_SESSION['Nombre'])==false){
        header('Location: ../../');
    }else{
      if ($_SESSION["Nombre"]["FK_ID_Tipo_Usuario"] == "1") {
        $opcAgregar = '<a class="dropdown-item" href="../Usuarios">Agregar Usuario</a>';
      }else{
        $opcAgregar = '';
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
  include("../header.php");
   ?>
  <link rel="stylesheet" href="../../CSS/bitacora.css">
</head>
<body>
 <?php 
 include("../../menu.php");
  ?>
<br>
<div class="row">
  <div class="container-fluid">
    <div class="col-lg-12">
        <button class="btn btnBitacora btn-block" data-toggle="modal" data-target="#ModalBitacoras"><b>Agregar Bitácora</b></button>
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
            <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="NombreUsuario"><b>N° Alumnos</b></label>
                      <input type="number" min="0" class="form-control" id="NombreCompletoUsuario" placeholder="Numero de alumnos" required>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label for="NombreUsuario"><b>Programa a utilizar</b></label>
                      <input type="text" class="form-control" id="NombreCompletoUsuario" placeholder="¿Qué software/Programa utilizarás?" required>
                    </div>
                  </div>
            </div>
             <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="NombreUsuario"><b>Fecha</b></label>
                      <input type="date" class="form-control" id="NombreCompletoUsuario" required>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="NombreUsuario"><b>Entrada</b></label>
                      <input type="time" class="form-control" id="NombreCompletoUsuario" required>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label for="NombreUsuario"><b>Salida</b></label>
                      <input type="time" class="form-control" id="NombreCompletoUsuario" required>
                    </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-12">
                    <textarea class="form-control" rows="5" placeholder="Observaciones"></textarea>
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
</body>
 <?php 
  include("../footer.php");
   ?>
  <script src="../../JS/bitacora.js"></script>
</html>