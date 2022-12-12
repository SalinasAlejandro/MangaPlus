<?php

$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Favs.php";
$fav = new Favs;
if ($fav->ponerFav($_POST['usuario'], $_POST['manga']) == 1) {
    echo '<button id="quitarFav"> <i class="fas fa-heart"></i> Quitar de Favoritos </button>';
}
