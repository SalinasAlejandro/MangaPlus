<?php

$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Capitulo.php";
$cap = new Capitulo;
$lista = $cap->listaCaps($_POST['id']);
