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

			<?php
      include("../Aplicacion/header2.php");
       ?>
    <title></title>
  </head>
	<style media="screen">
	* {
	  box-sizing: border-box;
	}

	body {
	  font: 16px Arial;
	}

	.autocomplete {
	  /*the container must be positioned relative:*/
	  position: relative;
	  display: inline-block;
	}

	input {
	  border: 1px solid transparent;
	  background-color: #f1f1f1;
	  padding: 10px;
	  font-size: 16px;
	}

	input[type=text] {
	  background-color: #f1f1f1;
	  width: 100%;
	}

	input[type=submit] {
	  background-color: DodgerBlue;
	  color: #fff;
	  cursor: pointer;
	}

	.autocomplete-items {
	  position: absolute;
	  border: 1px solid #d4d4d4;
	  border-bottom: none;
	  border-top: none;
	  z-index: 99;
	  /*position the autocomplete items to be the same width as the container:*/
	  top: 100%;
	  left: 0;
	  right: 0;
	}

	.autocomplete-items div {
	  padding: 10px;
	  cursor: pointer;
	  background-color: #fff;
	  border-bottom: 1px solid #d4d4d4;
	}

	.autocomplete-items div:hover {
	  /*when hovering an item:*/
	  background-color: #e9e9e9;
	}

	.autocomplete-active {
	  /*when navigating through the items using the arrow keys:*/
	  background-color: DodgerBlue !important;
	  color: #ffffff;
	}
	iframe{
	border:0;
	 }
	</style>
  <body style="overflow:hidden">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
										<div class="card card-secondary">
					  				<div class="card-header bg-secondary text-center" style="color:#000000";>Altas De Semestre</div>
					  					<div class="card-body">
												<h6>Semestre</h6>
											  <div class="input-group">
							            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
							           <select class="form-control control" id="Semestre" name="">
							           	<option value="0">Seleccione Un Semestre</option>
													<option value="Primer Semestre">Primer Semestre</option>
													<option value="Segundo Semestre">Segundo Semestre</option>
													<option value="Tercer Semestre">Tercer Semestre</option>
													<option value="Cuarto Semestre">Cuarto Semestre</option>
													<option value="Quinto Semestre">Quinto Semestre</option>
											 		<option value="Sexto Semestre">Sexto Semestre</option>
													<option value="Septimo Semestre">Septimo Semestre</option>
													<option value="Octavo Semestre">Octavo Semestre</option>
													<option value="Noveno Semestre">Noveno Semestre</option>
							           </select>
														<button type="submit"class="btn btn-default" id="limpiar"name="button"><i class="far fa-times-circle"></i></button>
												</div><br><br>
													<h6>Letra del Grupo</h6>
												<div class="input-group">
							            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
													<select class="form-control control" id="Letra" name="">
														<option value="0">Seleccionar la letra</option>
														<option value="A">A</option>
														<option value="B">B</option>
													</select>
												</div><br><br>
												<br><br>
												<div class="" align="center">
												  <button type="button" class="btn btn-default" id="Guardar">Aceptar</button>
												</div><br>
					  				</div>
										</div>

        </div>
        <div class="col-md-6">
					

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

		$(document).ready(function() {
  $('#limpiar').click(function() {
    $('input[type="text"]').val('');
  });
});
	</script>
</html>
