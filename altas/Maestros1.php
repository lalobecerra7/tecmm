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
			<link rel="stylesheet" href="../CSS/altas.css" type="text/css" charset="utf-8"/>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css" charset="utf-8"/>
		<link rel="stylesheet" href="../CSS/login.css" type="text/css" charset="utf-8"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
		<link rel="stylesheet" href="../librerias/sweet/dist/sweetalert2.min.css">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
						<?php
      include("../Aplicacion/header2.php");
       ?>
  </head>
  <body style="overflow:hidden">
<?php
  include("../altas/MenuAltas.php");
 ?>

      <div class="row">
				<div class="col-md-2" align="center">
					<br><br>
					<button type="button" name="button" onClick="window.location.href='../altas/Maestros1.php'" class="button" id="Grupo"><i class="fas fa-users"></i> &nbsp; &nbsp; Maestros</button>
				 <br><br>
				 <button type="button" name="button" onClick="window.location.href='../altas/Materias1.php'"class="button" id="Materia"><i class="fas fa-address-book"> </i>&nbsp; &nbsp; Materia </button>
				 <br><br>
				 <button type="button" name="button"onClick="window.location.href='Carrera1.php'" class="button" id="carreras"><i class="fas fa-id-card-alt"></i>&nbsp; &nbsp;Carreras</button>
				 <br><br>
				 <button type="button" name="button" onClick="window.location.href='../altas/Laboratorios1.php'" class="button" id="Laboratorio"><i class="fas fa-vials"></i>&nbsp; &nbsp;Laboratorio</button>


					</div>
					<div class="col-md-2">

					</div>
        <div class="col-md-4"><br><br>
					<div class="card card-secondary">
						<div class="card-header bg-secondary text-center" style="color:#000000";>Altas De Maestros</div>
						<div class="card-body">
								<h6 class="text-left">Nombre del Maestro</h6>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
            <input id="Maestros" type="text" autofocus="autofocus" required class="form-control control LimMaestro1" name="NomMaestro"  onkeypress="return soloLetras(event)" onblur="limpia()" placeholder="Nombre Del Maestro" autocomplete="off">
						<button type="submit"class="btn btn-default" id="LimMaestro1"name="button"><i class="far fa-times-circle"></i></button>
					</div><br><br>
					<h6 class="text-left">Especialidad</h6>
		<div class="input-group">
			<span class="input-group-text"><i class="fas fa-address-card"></i></span>
			<input id="Especialidad" type="text" required class="form-control control LimMaestro2" name="Especialidad"  onkeypress="return soloLetras(event)"  placeholder="Especialidad" autocomplete="off"  >
			<button type="submit"class="btn btn-default" id="LimMaestro2"name="button"><i class="far fa-times-circle"></i></button>

		</div><br><br>
					<h6 class="text-left">Estado del Maestro</h6>
					<div class="input-group">
						<span class="input-group-text"><i class="fas fa-user-secret"></i></span>
						<select class="form-control control" name="" id="Usuario">
							<option value="0">Seleccione Un Campo</option>
							<option value="1">Activo</option>
							<option value="2">Inactivo</option>

						</select>
					</div><br><br>
					<div class="" align="center">
					  <button type="button" class="btn btn-default" id="GuardarMaestros">Aceptar</button>
					</div>
        </div>
			</div>
			</div>
        <div class="col-md-4"><br><br>

        </div>
      </div>

		<script src="../librerias/notie-master/dist/notie.min.js"></script>
		<script src="../librerias/sweet/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../JS/jquery-3.2.1.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.js"></script>
		 <script src="../altas/funciones/funciones.js"></script>
  </body>
	<script type="text/javascript">
	$(document).ready(function(e) {
		$(document).on("click","#GuardarMaestros",function precionar(){
			if ($("#Maestros").val()=='') {
				swal({
				type: 'warning',
					title: 'Oops...',
						text: 'hay campos Vacios',
					})		.then((value) => {
							$("#NombreLab").focus();
						});

			}
			else if($("#Especialidad").val()==''){
				swal({
				type: 'warning',
					title: 'Oops...',
						text: 'hay campos Vacios',
					})		.then((value) => {
							$("#CapacidadLab").focus();
						});

			}	else if($("#Usuario").val()=='0'){
					swal({
					type: 'warning',
						title: 'Oops...',
							text: 'hay campos Vacios',
						})		.then((value) => {
								$("#CapacidadLab").focus();
							});
				}else {
					
				}


		});//boton
	});//function



	</script>
</html>
