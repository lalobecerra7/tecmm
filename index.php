<?php
    session_start();

    if(isset($_SESSION['Usuario'])){
        header('Location: Aplicacion/');
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" charset="utf-8"/>
    <link rel="stylesheet" href="CSS/login.css" type="text/css" charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
</head>
<body>
	<div id="incorrecto" class="incorrecto">
    	<b>¡Datos incorrectos, intenta de nuevo!</b>
    </div>
	<section class="main">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 offset-md-3">
                	<form class="login" id="login">
                        <div class="form-group text-center">
                            <img src="Imagenes/logo.jpg" width="50%">
                        </div>
                    	<div class="form-group">               
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                <input class="form-control input-lg campo" type="text" id="usuario" required placeholder="Usuario"/> 
                        	</div>
                        </div>  
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                            <input class="form-control input-lg campo" type="password" id="contrasena" required placeholder="Contraseña"/>
                            </div>
                        </div>  
                        
                        <div class="form-group">
                        	<button type="submit" id="ingresar" class="btn btn-block ingresar"><b>Ingresar</b></button>
                        </div>                      
                    </form>
                </div>
        	</div>
        </div>
    </section>

<script type="text/javascript" src="JS/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="JS/login.js"></script>
</body>
</html>