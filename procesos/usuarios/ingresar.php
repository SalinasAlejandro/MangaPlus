<?php

    session_start();
    $direccion = dirname(__FILE__);
    require_once $direccion . "/../../clases/Usuario.php";

    $usuario = $_POST['login'];
    $password = sha1($_POST['password']);

    $usuarioObj = new Usuario();
    echo $usuarioObj->ingresar($usuario, $password);

?>