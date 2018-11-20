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
     </head>

  <body  style="overflow:hidden">
		<?php
		  include("../altas/MenuAltas.php");
		 ?>

		      <div class="row">
						<br><br>
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
													<div class="card-header bg-secondary text-center" style="color:#000000";>Altas De Carreras</div>
														<div class="card-body">
															<h6>Carrera</h6>
															<div class="input-group">
																<span class="input-group-text"><i class="fas fa-address-card"></i></span>
																<input id="Carrera" type="text" class="form-control control Carrera" name="Carrera" placeholder="Nombre Del Carrera" onkeypress="return soloLetras(event)"  autocomplete="off" style="margin-right:5px;">
																	<button type="submit"class="btn btn-default" id="limpiarCarrera" name="button"><i class="far fa-times-circle"></i></button>
															</div><br>
															<h6>Plan de Estudios</h6>
															<div class="input-group">
																<span class="input-group-text"><i class="fas fa-address-card"></i></span>
																<input id="Plan" type="text" class="form-control control" name="Plan" placeholder="Codigo del plan de estudios" autocomplete="off" style="margin-right:5px;" ></input>
															</div><br>

															<br><br>
															<div class="" align="center">

																<button type="button"id="mostrar" name="boton1" class="btn btn-default">Alta Grupo</button>
															</div><br>
													</div>
													</div>

							</div>
							<div class="col-md-3"><br><br>

								<div class="card card-secondary"  id="target">
								<div class="card-header bg-secondary text-center"  id="target1" style="color:#000000";>Altas De Semestre <button type="button" class="close" data-dismiss="modal"id="ocultar" aria-label="Close"><span aria-hidden="true">&times;</span></button></button></div>
									<div class="card-body"  id="target2">
										<h6  id="target3">Semestre</h6>
										<div class="input-group" id="target4">
											<span  id="target5"class="input-group-text"><i class="fas fa-address-card"></i></span>
										 <select class="form-control control" id="Semestre" name="">
											<option value="0">Seleccione Un Semestre</option>
											<option value="1">Primer Semestre</option>
											<option value="2">Segundo Semestre</option>
											<option value="3">Tercer Semestre</option>
											<option value="4">Cuarto Semestre</option>
											<option value="5">Quinto Semestre</option>
											<option value="6">Sexto Semestre</option>
											<option value="7">Septimo Semestre</option>
											<option value="8">Octavo Semestre</option>
											<option value="9">Noveno Semestre</option>
										 </select>
										</div><br>
											<h6>Letra del Grupo</h6>
										<div class="input-group">
											<span class="input-group-text"><i class="fas fa-address-card"></i></span>
											<select class="form-control control" id="Letra" name="">
												<option value="0">Seleccionar la letra</option>
												<option value="A">A</option>
												<option value="B">B</option>
											</select>
										</div><br><br><br>
										<div class="" align="center">
											<button type="button" class="btn btn-default" id="Guardar">Aceptar</button>
										</div><br>
								</div>
								</div>

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

	$(document).ready(function(){
		$(document).on("click","#Guardar",function precionar(){
			if ($("#Carrera").val()=='') {
				swal({
				type: 'warning',
					title: 'Oops...',
						text: 'hay campos Vacios',
					})		.then((value) => {
							$("#Carrera").focus();
						});

			}
			else if($("#Plan").val()==''){
				swal({
				type: 'warning',
					title: 'Oops...',
						text: 'hay campos Vacios',
					})		.then((value) => {
							$("#Plan").focus();
						});

			}	else if($("#Semestre").val()=='0'){
					swal({
					type: 'warning',
						title: 'Oops...',
							text: 'hay campos Vacios',
						})		.then((value) => {
								$("#Semestre").focus();
							});
				}	else if($("#Letra").val()=='0'){
						swal({
						type: 'warning',
							title: 'Oops...',
								text: 'hay campos Vacios',
							})		.then((value) => {
									$("#Letra").focus();
								});
					}else {

				}


		});//boton
		$('#limpiarCarrera').click(function() {
		$('#Carrera').val('');
		});
		jQuery('#target').hide();
		$("#mostrar").on( "click", function() {
			$('.target').show(); //muestro mediante clase
			$('#target').show(); //muestro mediante clase
		 });
		$("#ocultar").on( "click", function() {
			$('#target').hide(); //oculto mediante id
			$('.target').hide(); //muestro mediante clase

		});
	});

			function autocomplete(inp, arr) {
			  /*the autocomplete function takes two arguments,
			  the text field element and an array of possible autocompleted values:*/
			  var currentFocus;
			  /*execute a function when someone writes in the text field:*/
			  inp.addEventListener("input", function(e) {
			      var a, b, i, val = this.value;
			      /*close any already open lists of autocompleted values*/
			      closeAllLists();
			      if (!val) { return false;}
			      currentFocus = -1;
			      /*create a DIV element that will contain the items (values):*/
			      a = document.createElement("DIV");
			      a.setAttribute("id", this.id + "autocomplete-list");
			      a.setAttribute("class", "autocomplete-items");
			      /*append the DIV element as a child of the autocomplete container:*/
			      this.parentNode.appendChild(a);
			      /*for each item in the array...*/
			      for (i = 0; i < arr.length; i++) {
			        /*check if the item starts with the same letters as the text field value:*/
			        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
			          /*create a DIV element for each matching element:*/
			          b = document.createElement("DIV");
			          /*make the matching letters bold:*/
			          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
			          b.innerHTML += arr[i].substr(val.length);
			          /*insert a input field that will hold the current array item's value:*/
			          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
			          /*execute a function when someone clicks on the item value (DIV element):*/
			          b.addEventListener("click", function(e) {
			              /*insert the value for the autocomplete text field:*/
			              inp.value = this.getElementsByTagName("input")[0].value;
			              /*close the list of autocompleted values,
			              (or any other open lists of autocompleted values:*/
			              closeAllLists();
			          });
			          a.appendChild(b);
			        }
			      }
			  });
			  /*execute a function presses a key on the keyboard:*/
			  inp.addEventListener("keydown", function(e) {
			      var x = document.getElementById(this.id + "autocomplete-list");
			      if (x) x = x.getElementsByTagName("div");
			      if (e.keyCode == 40) {
			        /*If the arrow DOWN key is pressed,
			        increase the currentFocus variable:*/
			        currentFocus++;
			        /*and and make the current item more visible:*/
			        addActive(x);
			      } else if (e.keyCode == 38) { //up
			        /*If the arrow UP key is pressed,
			        decrease the currentFocus variable:*/
			        currentFocus--;
			        /*and and make the current item more visible:*/
			        addActive(x);
			      } else if (e.keyCode == 13) {
			        /*If the ENTER key is pressed, prevent the form from being submitted,*/
			        e.preventDefault();
			        if (currentFocus > -1) {
			          /*and simulate a click on the "active" item:*/
			          if (x) x[currentFocus].click();
			        }
			      }
			  });
			  function addActive(x) {
			    /*a function to classify an item as "active":*/
			    if (!x) return false;
			    /*start by removing the "active" class on all items:*/
			    removeActive(x);
			    if (currentFocus >= x.length) currentFocus = 0;
			    if (currentFocus < 0) currentFocus = (x.length - 1);
			    /*add class "autocomplete-active":*/
			    x[currentFocus].classList.add("autocomplete-active");
			  }
			  function removeActive(x) {
			    /*a function to remove the "active" class from all autocomplete items:*/
			    for (var i = 0; i < x.length; i++) {
			      x[i].classList.remove("autocomplete-active");
			    }
			  }
			  function closeAllLists(elmnt) {
			    /*close all autocomplete lists in the document,
			    except the one passed as an argument:*/
			    var x = document.getElementsByClassName("autocomplete-items");
			    for (var i = 0; i < x.length; i++) {
			      if (elmnt != x[i] && elmnt != inp) {
			        x[i].parentNode.removeChild(x[i]);
			      }
			    }
			  }
			  /*execute a function when someone clicks in the document:*/
			  document.addEventListener("click", function (e) {
			      closeAllLists(e.target);
			  });
			}

			/*An array containing all the country names in the world:*/
			var countries = [
				"Ingenieria en Sistemas Computacionales","Ingenieria en Industrias Alimentarias","Ingenieria Ambiental",
				"Ingenieria Electromecanica","Ingenieria Industrial","Ingenieria en Gestion Empresarial"
			];

			/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
			autocomplete(document.getElementById("Carrera"), countries);
	</script>
</html>
