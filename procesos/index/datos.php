<?php

$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Manga.php";
$mangas = new Manga;
$todos = $mangas->obtenerMangasNew();
$newCaps = $mangas->capsNew();
$masViews = $mangas->masVistos();
$random = $mangas->mangaRand();
