<?php
$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Manga.php";
$mangas = new Manga;
$manga = $mangas->buscador($_GET['equipo']);
while ($id = mysqli_fetch_array($manga)) {
    echo $id['id_manga'];
}