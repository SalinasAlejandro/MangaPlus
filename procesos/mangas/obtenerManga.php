<?php

$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Manga.php";
$mangas = new Manga;
$manga = $mangas->obtenerManga($_POST['id']);
$mangas->sumarView($_POST['id']);
