<?php

$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Favs.php";
$mangas = new Favs;
$cont = $mangas->mostrarFavs($_SESSION['id']);
$todos = $mangas->mostrarFavs($_SESSION['id']);
