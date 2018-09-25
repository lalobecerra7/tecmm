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
  <link rel="stylesheet" href="../../CSS/usuarios.css">

 </head>
<body>
 <?php 
 include("../../menu.php");
  ?>
<br>
<div class="row">
  <div class="container-fluid">
    <div class="col-lg-12">
        <button class="btn btn-block btnUsu" data-toggle="modal" data-target="#ModalBitacoras"><b>Agregar Usuario</b></button>
    </div>
  </div>  
</div>
<br>
  <div class="row">
    <div class="container-fluid">
      <div class="col-lg-12">
        <table id="tablaUsuarios" class="table dt-responsive" style="width: 100%;">
            <thead>
                <tr>
                  <td style="width: 120px;">Acciones</td>
                    <td>ID</td>
                    <td>Nombre completo</td>
                    <td>Nombre</td>
                    <td>Contraseña</td>
                    <td>Tipo</td>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                  <td style="width: 120px;">Acciones</td>
                    <td>ID</td>
                    <td>Nombre completo</td>
                    <td>Nombre</td>
                    <td>Contraseña</td>
                    <td>Tipo</td>
                </tr>
            </tfoot>
        </table>
      </div>
    </div>  
  </div>

<!--MODAL DE BITACORAS-->
<div class="modal fade" id="ModalBitacoras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-success" role="document">
    <div class="modal-content">
      <div class="modal-header headerModal">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="FormUsuario">
        <div class="modal-body">
            <div class="form-group">
              <label for="NombreUsuario"><b>Nombre Completo</b></label>
              <input type="text" class="form-control" id="NombreCompletoUsuario" placeholder="Ingrese nombre completo" required>
            </div>
            <div class="form-group">
              <label for="NombreUsuario"><b>Nombre de Usuario</b></label>
              <input type="text" class="form-control" id="NombreUsuario" placeholder="Ingrese nombre de usuario" required>
            </div>
            <div class="form-group">
              <label for="ContraUsuario"><b>Contraseña</b></label>
              <input type="password" class="form-control" id="ContraUsuario" placeholder="Ingrese contraseña" required>
            </div>
            <div class="form-group">
              <label for="tipoUsuario"><b>Tipo de Usuario</b></label>
              <select class="form-control" id="tipoUsuario" required>
                <option value="0" selected disabled>Seleccione una opción</option>
                <option value="1">Administrador</option>
                <option value="2">Maestro</option>
              </select>
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
  <script src="../../JS/usuarios.js"></script>

</html>