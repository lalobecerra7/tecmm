<?php
  include("../../conexion.php");

  if(isset($_SESSION['Nombre'])==false){
        header('Location: ../../index.php');
    }else{
      if ($_SESSION["Nombre"]["FK_ID_Tipo_Usuario"] == "1") {
        $opcAgregar = '<a class="dropdown-item" href="../Usuarios"> Agregar Usuario</a>';
      }else{
        $opcAgregar = '';
      }
    }
?>
<div class="row">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand"><img src="../../Imagenes/ITMM copia.PNG" width="100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav navbar-left">
            <li class="nav-item">
              <a class="nav-link" href="../"><b>Inicio</b></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Altas
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Maestros</a>
                <a class="dropdown-item" href="#">Grupo</a>
                <a class="dropdown-item" href="#">Materias</a>
                <a class="dropdown-item" href="#">Laboratorios</a>
                <a class="dropdown-item" href="#">Carrera</a>
                <a class="dropdown-item" href="#">Semestre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Bitacora/">Bitácora</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Parciales</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Planeaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Prácticas</a>
            </li>
          </ul>
          <ul class="navbar-nav offset-lg-6">
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <b><?php echo $_SESSION['Nombre']['Nombre'];?></b>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Configuración</a>
                <a class="dropdown-item" href="../cerrarsesion.php">Salir</a>
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
