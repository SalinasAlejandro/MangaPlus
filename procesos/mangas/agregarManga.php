<?php

if ($_POST['manga'] == null || $_POST['autor'] == null || $_POST['descripcion'] == null) {
    echo 3;
} else {
    if ($_FILES['cover']['size'] > 0) {
        $direccion = dirname(__FILE__);
        require_once $direccion . "/../../clases/Manga.php";
        $manga = new Manga();

        $carpetaCrear = "../../img/mangasCover";
        if (!file_exists($carpetaCrear)) {
            mkdir($carpetaCrear, 0777, true);
        }
        $carpetaCover = "img/mangasCover";

        $mi = microtime();
        $micro = explode(' ', $mi);

        $nombreArchivo = $_FILES['cover']['name'];
        $explode = explode('.', $nombreArchivo);
        $nombreArchivo = $explode[0] . $micro[0] . '.' . $explode[1];
        $tipoArchivo = array_pop($explode);
        $rutaAlmacenamiento = $_FILES['cover']['tmp_name'];
        $rutaFinal = $carpetaCover . "/" . $nombreArchivo;

        $datos = array(
            "titulo" => $manga::conexion()->real_escape_string(htmlentities($_POST['manga'])),
            "autor" =>  $manga::conexion()->real_escape_string(htmlentities($_POST['autor'])),
            "cover" => $rutaFinal,
            "descripcion" =>  $manga::conexion()->real_escape_string(htmlentities($_POST['descripcion']))
        );

        $rutaTemp = '../../' . $rutaFinal;
        if (move_uploaded_file($rutaAlmacenamiento, $rutaTemp)) {
            $respuesta = $manga->agregarManga($datos);
        }

        echo $respuesta;
    } else {
        echo 4;
    }
}
