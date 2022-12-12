<?php
$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Usuario.php";

$usuario = new Usuario();
$nuevo = $usuario->validarNuevo($id);
