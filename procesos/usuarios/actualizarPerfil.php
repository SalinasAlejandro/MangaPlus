<?php

if ($_POST['usuarioU'] == null || $_POST['correoU'] == null) {
    echo 3;
} else {
    if (!filter_var($_POST['correoU'], FILTER_VALIDATE_EMAIL)) {
        echo 4;
    } else {
        if (strlen($_POST['usuarioU']) < 3 || strlen($_POST['usuarioU']) > 25) {
            echo 5;
        } else {

            $direccion = dirname(__FILE__);
            require_once $direccion . "/../../clases/Usuario.php";
            $usuario = new Usuario();;

            $password = sha1($usuario::conexion()->real_escape_string(htmlentities($_POST['contraU'])));
            $datos = array(
                "id" => $_POST['idUsuario'],
                "usuario" => $usuario::conexion()->real_escape_string(htmlentities($_POST['usuarioU'])),
                "correo" =>  $usuario::conexion()->real_escape_string(htmlentities($_POST['correoU'])),
                "password" => $password
            );

            echo $usuario->actualizarUsuario($datos);

        }
    }
}
