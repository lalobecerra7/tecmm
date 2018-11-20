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

		if($_POST["funcion"]=="RegistrarEncuestas"){
			try{
					 $conexion = new PDO('mysql:host=localhost;dbname=tecmm', 'root', '45431319');
			}catch(PDOException $prueba_error){
					echo "Error: " . $prueba_error->getMessage();
			}

		  $p1 = $_POST['Maestros'];
		  $p2 = $_POST['Usuario1'];
		  $sql_con ="INSERT INTO maestros SET  Nombre='$p1', FK_ID_Usuario='$p2'";
		  $stmt = $conexion->prepare($sql_con);
		  $stmt->execute();
		  if($stmt->errorCode() == 0) {

		  }
		  echo "Registro+";

		  $stmt=null;
		  $conexion=null;

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
	</style>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
					<div class="card card-secondary">
						<div class="card-header bg-secondary text-center" style="color:#000000";>Altas De Maestros</div>
						<div class="card-body">
								<h6 class="text-left">Nombre del Maestro</h6>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
            <input id="Maestros" type="text" autofocus="autofocus" required class="form-control control" name="NomMaestro"  onkeypress="return soloLetras(event)" onblur="limpia()" placeholder="Nombre Del Maestro" autocomplete="off">
						<button type="submit"class="btn btn-default" id="limpiar"name="button"><i class="far fa-times-circle"></i></button>
					</div><br><br>
					<h6 class="text-left">Especialidad</h6>
		<div class="input-group">
			<span class="input-group-text"><i class="fas fa-address-card"></i></span>
			<input id="Especialidad" type="text" required class="form-control control" name="Especialidad"  onkeypress="return soloLetras(event)"  placeholder="Especialidad" autocomplete="off"  >
			<button type="submit"class="btn btn-default" id="limpiar2"name="button"><i class="far fa-times-circle"></i></button>

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
					  <button type="button" class="btn btn-default" id="Guardar">Aceptar</button>
					</div>
        </div>
			</div>
			</div>
        <div class="col-md-7">
					<div class="card card-secondary">
						<div class="card-body">
							<h4 align="center"><strong>Maestros</strong></h4>
							<div class="row">
								<div class="container-fluid">
									<div class="col-lg-12">
										<table id="tablaUsuarios" class="table dt-responsive" style="width: 100%;">
												<thead>
														<tr>
															<td style="width: 120px;">Acciones</td>
																<td>Nombre Del Maestro</td>
																<td>Especialidad</td>
																<td>Estado</td>
														</tr>
												</thead>
												<tbody></tbody>
												<tfoot>
														<tr>
															<td style="width: 120px;">Acciones</td>
															<td>Nombre Del Maestro</td>
															<td>Especialidad</td>
															<td>Estado</td>
														</tr>
												</tfoot>
										</table>
									</div>
								</div>
							</div>


				</div>
			</div>
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

			});//boton
		});//function

		$(document).ready(function() {
			$('#limpiar').click(function() {
			$('input[type="text"]').val('');
			});
			$('#limpiar2').click(function() {
			$('input[type="text"]').val('');
			});
			$(document).on("click","#Guardar",function(){
				if ($("#Maestros").val()=="") {
					swal({
					title: 'Maestros Vacio',
					text: 'Favor de llenar el campo!',
					animation: false,
					customClass: 'animated tada'
				})
			}else
			if ($("#Usuario1").val()=="0") {
								swal({
								title: 'Usuario Vacio',
								text: 'Favor de llenar el campo!',
								animation: false,
								customClass: 'animated tada'
							})
						}else {
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
									$.ajax({
										type: "POST",
										url: "<?=$_SERVER["PHP_SELF"] ?>",
										data: ({
											funcion : "RegistrarEncuestas",
											Maestros : $("#Maestros").val(),
											Usuario1 : $("#Usuario1").val()

										}),
										dataType: "html",
										async:false
									});
									swal(
										'Guardado!',
										'Su registro esta Guardado.',
										'success'
									).then((value) => {
										swal(location.reload());
									});
								}
							})

						}
			});
		});

		function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpia() {
    var val = document.getElementById("Maestros").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("Maestros").value = '';
    }
}


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
					"Giovana Berenice Torres Huerta",
					"Luis Francisco Garcia Lopez",
					"Arturo X. Ibarra Castillon",
					"Javier Isaac Contreras Ochoa",
					"Abraham Hernandez Cobarrubias",
					"Adrian Salvador Garcia",
					"Agustin Jaime Delgadillo Mercado",
					"Araceli Ortiz Godinez",
					"Carlos Omar Garcia Esparza",
					"Cruz Rodolfo Mulgado Campos",
					"Denicia Guadalupe Orozco Valadez",
					"Eduardo Augusto Aleman Hernandez",
					"Eduardo Couder Pimentel",
					"Erick Ibarra Gomez",
					"Francisco Miguel Gonzalez Jimenez",
					"Guillermo Rodriguez Nuñez",
					"Jose Guadalupe Lopez Jauregui",
					"Jose Salvador Barragan Hernandez",
					"Luis Alonso Aguayo Vazquez ",
					"Luis Ernesto Lopez Gonzalez",
					"Mayra Lopez Garcia",
					"Misael Adrian Arias Andrade",
					"Norberto Santiago Olivares",
					"Rocio Ramirez Navarro",
					"Rosendo Velazquez Ortiz",
					"Saul Garcia Jimenez",
					"Sergio Hugo Cruz Sanchez",
					"Dalia Yahaira Oropeza Dominguez",
					"Andres Salomon Enriquez Ochoa",
					"Antonio Daniel Garcia Gutierrez",
					"Enrique Esqueda Perez",
					"Georgina Anguiano Hernandez",
					"Gerardo Abel agurre Espinoza",
					"Hugo Filiberto Sotelo Marquez",
					"Jose Luis Gonzalez Martinez",
					"Jose Trinidad Navarro Coronado",
					"Juan Alberto Lopez Hernandez",
					"Maria Oliva Perez Cervantes",
					"Maritza Macias Cordero",
					"Noemi Alejandra Garcia Gamiño",
					"Ruben Padilla Arriaga",
					"Sandra Brambila Ramirez",
					"Sergio Escobedo Reyes",
					"Victor Alonso Quiroz Rivas",
					"Celina Beltran Hernandez",
					"Fabiola Guadalupe Arriaga Lopez",
					"Isela Sanchez Ramirez",
					"Maira Bibiana Plascencia Garcia",
					"Maria del Pilar Camacho Vazquez del Mercado",
					"Rocio del Carmen Parra Torres",
					"Rosa Maria Chavez Camarena",
					"Edgardo Martinez Orozco",
					"Gustavo Rene Arias Partida",
					"Jose Miguel Vazquez",
					"Julian Gonzalez Gonzalez",
					"Lorenzo Zamorano Olvera",
					"Luis Alberto Gonzalez Vivanco",
					"Rafael Morales Morales",
					"Ricardo Padilla Rolon",
					"Roberto Jose Velasco Monroy",
					"Victor Hugo Hernandez Vargas",
					"Ramiro Morales Galindo",
					"Paola Jea"
				];

				/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
				autocomplete(document.getElementById("Maestros"), countries);


	</script>
</html>
