<?php

if ($_POST['usuario'] == null || $_POST['correo'] == null || $_POST['password'] == null || $_POST['password2'] == null) {
    echo 3;
} else {
    if ($_POST['password'] != $_POST['password2']) {
        echo 4;
    } else {
        if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
            echo 5;
        } else {
            if (strlen($_POST['usuario']) < 3 || strlen($_POST['usuario']) > 25) {
                echo 6;
            } else {
                if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 30) {
                    echo 7;
                } else {

                    $direccion = dirname(__FILE__);
                    require_once $direccion . "/../../clases/Usuario.php";
                    $usuario = new Usuario();;

                    $password = sha1($usuario::conexion()->real_escape_string(htmlentities($_POST['password'])));
                    $datos = array(
                        "usuario" => $usuario::conexion()->real_escape_string(htmlentities($_POST['usuario'])),
                        "correo" =>  $usuario::conexion()->real_escape_string(htmlentities($_POST['correo'])),
                        "password" => $password
                    );


                    $newUsua = $usuario->agregarUsuario($datos);

                    if ($newUsua == 1) {
                        require 'correo.php';
                    }

                    echo $newUsua;
                }
            }
        }
    }
}
