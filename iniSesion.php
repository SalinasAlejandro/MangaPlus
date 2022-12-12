<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Manga PLus</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/iniSesion.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="librerias/fontawesome/css/all.css">
</head>

<body>

    <?php
    $direccion = dirname(__FILE__);
    require_once $direccion . "/navbar.php";
    ?>

    <div>

        <div class="wrapper">
            <div id="formContent">
                <div>
                    <img src="img/logo.png" id="icon" />
                    <h1>Iniciar Sesión</h1>
                </div>
                <form method="POST" id="frmLogin" onsubmit="return logear()" autocomplete="off">
                    <input type="text" id="login" name="login" placeholder="Nombre de usuario">
                    <input type="password" id="password" name="password" placeholder="Contraseña">
                    <input type="submit" value="Entrar">
                </form>
                <div>
                    <a class="registro" href="registro.php">¿No tienes cuenta? Registrese</a>
                </div>

            </div>
        </div>


        <?php
        $direccion = dirname(__FILE__);
        require_once $direccion . "/librerias.php";
        ?>
        <script src="js/iniSesion.js"></script>

</body>

</html>