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
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../CSS/altas.css" type="text/css" charset="utf-8"/>

		<?php
      include("../Aplicacion/header2.php");
       ?>
    <title></title>
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
					<div class="card-header bg-secondary text-center" style="color:#000000";>Altas De Materias</div>
						<div class="card-body">
					<h6 class="text-left">Materia</h6>
					<div class="input-group">
						<span class="input-group-text"><i class="fas fa-id-badge"></i></span>
						<input type="text" id="Materia" class="form-control control"name="" onkeypress="return soloLetras(event)"  placeholder="Nombre de la materia" value="">
					</div><br>
					<h6 class="text-left">Codigo</h6>
					<div class="input-group">
						<span class="input-group-text"><i class="fas fa-hashtag"></i></span>
						<input type="text" id="codigo" class="form-control control"name=""  placeholder="Codigo de la materia" value="">
					</div><br>
					<h6 class="text-left">Horas</h6>
					<div class="input-group">
						<span class="input-group-text"><i class="fas fa-business-time"></i></span>
						<input type="text" class="form-control control"name="" maxlength="1" max="8" min="1" id="Horas" placeholder="Cantidad de horas" value="1">
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

		<script src="../librerias/notie-master/dist/notie.min.js"></script>
		<script src="../librerias/sweet/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../JS/jquery-3.2.1.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.js"></script>
		 <script src="../altas/funciones/funciones.js"></script>
  </body>
	<script type="text/javascript">
		$(document).ready(function(e) {
				$(document).on("click","#Guardar",function precionar(){
					if ($("#Materia").val()=='') {
						swal({
						type: 'warning',
							title: 'Oops...',
								text: 'hay campos Vacios',
							})		.then((value) => {
									$("#Materia").focus();
								});

					}
					else if($("#codigo").val()==''){
						swal({
						type: 'warning',
							title: 'Oops...',
								text: 'hay campos Vacios',
							})		.then((value) => {
									$("#codigo").focus();
								});

					}	else if(($("#Horas").val()='1')||($("#Horas").val()='8')){
							swal({
							type: 'warning',
								title: 'Seguro de este valor',
									text: 'Son las horas que deseas??',
								})		.then((value) => {
										$("#Horas").focus();
									});
						}else {

						}


				});//boton

			$(document).on("blur","#Horas",function(){
				validaN();
			});
			function validaN(){
			  if($("#Horas").val()<1){
			    $("#Horas").val(1);

			  }else if($("#Horas").val()>8){
			    $("#Horas").val(8);
			  }
			    tecla = (document.all) ? e.keyCode : e.which;
			    //Tecla de retroceso para borrar, siempre la permite
			    if (tecla==8){
			        return true;
			    }
			    // Patron de entrada, en este caso solo acepta numeros
			    patron =/[0-9]/;
			    tecla_final = String.fromCharCode(tecla);
			    return patron.test(tecla_final);
			}
		});//function
	</script>
</html>
