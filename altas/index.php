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

			<?php
      include("../Aplicacion/header2.php");
       ?>
     </head>
		 <style media="screen">
		 iframe{
	 	 border:0;
	 		}

			#menu1{
				  background-color:  #E6E6FA; color: black;

			}
			.button {
				position: relative;
			    text-decoration: none;
			    background-color:  #E6E6FA; color: black;
			    font-family: 'Yanone Kaffeesatz';
			    font-weight: 50px;
			    font-size: 30px;
			    display: block;
			    padding: 4px;
			    -webkit-border-radius: 8px;
			    -moz-border-radius: 8px;
			    border-radius: 8px;
			    -webkit-box-shadow: 0px 9px 0px rgba(169,169,169,1), 0px 9px 25px rgba(0,0,0,.7);
			    -moz-box-shadow: 0px 9px 0px rgba(169,169,169,1), 0px 9px 25px rgba(0,0,0,.7);
			    box-shadow: 0px 9px 0px rgba(169,169,169,1), 0px 9px 25px rgba(0,0,0,.7);
			    margin: 1px auto;
				width: 160px;
				text-align: center;

				-webkit-transition: all .1s ease;
				-moz-transition: all .1s ease;
				-ms-transition: all .1s ease;
				-o-transition: all .1s ease;
				transition: all .1s ease;
			}

			.button:active {
			    -webkit-box-shadow: 0px 9px 0px rgba(169,169,169,1), 0px 9px 25px rgba(0,0,0,.7);
			    -moz-box-shadow: 0px 9px 0px rgba(169,169,169,1), 0px 9px 25px rgba(0,0,0,.7);
			    box-shadow: 0px 9px 0px rgba(169,169,169,1), 0px 9px 25px rgba(0,0,0,.7);
			    position: relative;
			    top: 6px;
			}
		 </style>
  <body style="">

    <div class="row">
    	<div class="container-fluid">
    		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    		  <a class="navbar-brand"><img src="../Imagenes/ITMM copia.PNG" width="100px"></a>
    		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		    <span class="navbar-toggler-icon"></span>
    		  </button>

    		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    		    <ul class="navbar-nav navbar-left">
    		      <li class="nav-item">
    		        <a class="nav-link" href="../index.php"><b>Inicio</b></a>
    		      </li>
    		      <li class="nav-item">
								<a class="nav-link" href="index.php">Altas</a>

    		      </li>
    		      <li class="nav-item">
    		        <a class="nav-link" href="Bitacora/">Bitácora</a>
    		      </li>
    		      <li class="nav-item">
    		        <a class="nav-link" href="#">Parciales</a>
    		      </li>
    		      <li class="nav-item">
    		        <a class="nav-link" href="#">Planeaciones</a>
    		      </li>
    		      <li class="nav-item">
    		        <a class="nav-link" href="Practicas/">Prácticas</a>
    		      </li>
    		    </ul>
    		     <ul class="navbar-nav offset-lg-6">
    		       <li class="nav-item dropdown ">
    		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    		          <b><?php echo $_SESSION['Nombre']['Nombre'];?></b>
    		        </a>
    		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    		          <a class="dropdown-item" href="#">Configuración</a>
    		          <a class="dropdown-item" href="../Aplicacion/cerrarsesion.php">Salir</a>
    		           <?php
    	                echo $opcAgregar;
    	               ?>
    		      </div>
    		      </li>
    		    </ul>
    		  </div>
    		</nav>
    	</div>
    </div>
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


      </div>
		<script src="../librerias/notie-master/dist/notie.min.js"></script>
		<script src="../librerias/sweet/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../JS/jquery-3.2.1.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Bootstrap/js/bootstrap.js"></script>
  </body>
	<script type="text/javascript">
	var botones = document.getElementsByClassName("button"),
	    iframe = document.getElementById("cambio"),
	    sizeBotones = botones.length;

	for (i = 0; i < sizeBotones; i++){
	    botones[i].addEventListener("click", function(){
	        iframe.src = this.getAttribute("data-link");
	    }, false);
	}

	  document.addEventListener('DOMContentLoaded', function() {
	    var elems = document.querySelectorAll('.sidenav');
	    var instances = M.Sidenav.init(elems, options);
	  });

	  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
	  // var collapsibleElem = document.querySelector('.collapsible');
	  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

	  // Or with jQuery

	  $(document).ready(function(){
	    $('.sidenav').sidenav();
	  });

		window.onkeyup = compruebaTecla;
		function compruebaTecla(){
    var e = window.event;
    var tecla = (document.all) ? e.keyCode : e.which;
    if(tecla == 27){
        document.getElementById( $('.sidenav').sidenav()).style.display = "none";
    }
}

	</script>
</html>
