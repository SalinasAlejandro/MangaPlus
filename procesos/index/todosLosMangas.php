<?php

$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Manga.php";
$mangas = new Manga;
$todos = $mangas->todosLosMangas();
