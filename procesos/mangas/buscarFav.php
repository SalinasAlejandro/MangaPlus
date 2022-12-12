<?php

$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Favs.php";
$fav = new Favs;
$existe = $fav->buscarFavs($_SESSION['id'], $_POST['id']);
