<?php

$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Favs.php";
$fav = new Favs;
$fav->quitarFav($_POST['usuario'], $_POST['manga']);
