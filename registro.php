<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Manga PLus</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/registro.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="librerias/fontawesome/css/all.css">
</head>

<body>

    <?php
    $direccion = dirname(__FILE__);
    require_once $direccion . "/navbar.php";
    ?>

    <div class="container registro">
        <h1 class="text-center">Registro de Usuario</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form id="frmRegistro" method="POST" onsubmit=" return agregarUsuarioNuevo()" autocomplete="off">
                    <label>Nombre de usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese un Nombre de Usuario">
                    <small>Mínimo 3 caracteres, máximo 25 caracteres</small><br>
                    <label>Correo</label>
                    <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingrese algún Correo electrónico valido">
                    <label>Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese alguna Contraseña">
                    <small>Mínimo 8 caracteres, máximo 30 caracteres</small><br>
                    <label>Confirmar Contraseña</label>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Repita su contraseña">
                    <br>
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <a href="iniSesion.php" class="btn btn-success iniSesion">Iniciar Sesión</a>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-primary registrar">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    $direccion = dirname(__FILE__);
    require_once $direccion . "/librerias.php";
    ?>
    <script src="js/registro.js"></script>


</body>

</html>