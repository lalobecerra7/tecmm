<?php
	include("../conexion.php");
	session_start();

	if(isset($_SESSION['Nombre'])==false){
        header('Location: ../');
    }else{
      if ($_SESSION["Nombre"]["FK_ID_Tipo_Usuario"] == "1") {
        $opcAgregar = '<a class="dropdown-item" href="Usuarios">Agregar Usuario</a>';
        $opcMatGrupo = '<a class="dropdown-item" href="GrupoCarrera"> Grupo - Carrera</a>';
        $opcMateriaGrupo = '<a class="dropdown-item" href="MateriaGrupo"> Materia - Grupo</a>';
      }else{
        $opcAgregar = '';
      	 $opcMatGrupo = '';
      	 $opcMateriaGrupo ='';
      }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
      <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" charset="utf-8"/>
      <link rel="stylesheet" href="../CSS/login.css" type="text/css" charset="utf-8"/>
			<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" charset="utf-8"/>
			<link rel="stylesheet" href="../CSS/login.css" type="text/css" charset="utf-8"/>
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
			<link rel="stylesheet" href="../librerias/sweet/dist/sweetalert2.min.css">
			<?php
      include("../Aplicacion/header2.php");
       ?>
    <title></title>
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
					<div class="card card-secondary">
					<div class="card-header bg-secondary text-center" style="color:#000000";>Altas De Materias</div>
						<div class="card-body">
					<h6 class="text-left">Materia</h6>
					<div class="input-group">
						<span class="input-group-text"><i class="fas fa-id-badge"></i></span>
						<input type="text" class="form-control control"name=""  placeholder="Nombre de la materia" value="">
					</div><br>
					<h6 class="text-left">Codigo</h6>
					<div class="input-group">
						<span class="input-group-text"><i class="fas fa-hashtag"></i></span>
						<input type="text" class="form-control control"name=""  placeholder="Codigo de la materia" value="">
					</div><br>
					<h6 class="text-left">Horas</h6>
					<div class="input-group">
						<span class="input-group-text"><i class="fas fa-business-time"></i></span>
						<input type="text" class="form-control control"name=""  placeholder="Cantidad de horas" value="">
					</div><br><br>
					<div class="" align="center">
					  <button type="button" class="btn btn-default" id="Guardar">Aceptar</button>
					</div>
        </div>
			</div>
		</div>

        <div class="col-md-4">


        </div>

      </div>
    </div>
		<script src="../librerias/notie-master/dist/notie.min.js"></script>
		<script src="../librerias/sweet/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../JS/jquery-3.2.1.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.js"></script>
  </body>
	<script type="text/javascript">
		$(document).ready(function(e) {
			$(document).on("click","#Guardar",function(){
				swal({
				  title: 'Estas Seguro?',
				  text: "el registro de maestros sera Guardado",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Si Guardar!'
				}).then((result) => {
				  if (result.value) {
				    swal(
				      'Guardado!',
				      'Su registro esta Guardado.',
				      'success'
				    )
				  }
				})
			});//boton
		});//function
	</script>
</html>
