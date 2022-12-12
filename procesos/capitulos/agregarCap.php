<?php
if ($_POST['manga'] < 0 || $_POST['numero'] == null) {
    echo 2;
} else {
    if ($_POST['numero'] < 0) {
        echo 3;
    } else {

        $files_post = $_FILES['file'];

        $files = array();
        $file_count = count($files_post['name']);
        $file_key = array_keys($files_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_key as $key) {
                $files[$i][$key] = $files_post[$key][$i];
            }
        }
        if ($files[0]['name'] == "") {
            echo 4;
        } else {

            $direccion = dirname(__FILE__);
            require_once $direccion . "/../../clases/Capitulo.php";
            $cap = new Capitulo();

            if ($cap->buscarCapRepetido($_POST['manga'], $_POST['numero']) > 0) {
                echo 5;
            } else {

                $carpeta = "img/capitulos/" . $_POST['manga'] . "/" . $_POST['numero'];
                $carpetaCrear = "../../" . $carpeta;
                if (!file_exists($carpetaCrear)) {
                    mkdir($carpetaCrear, 0777, true);
                }

                $datos = array(
                    "manga" =>  $_POST['manga'],
                    "numero" => $_POST['numero'],
                    "pagina" => "",
                );
                $i = 1;
                foreach ($files as $fileId => $file) {
                    $fileContent = file_get_contents($file['tmp_name']);
                    file_put_contents($carpetaCrear . "/página" . $i . ".jpg", $fileContent);

                    $datos['pagina'] = $carpeta . "/página" . $i . ".jpg";

                    if ($cap->agregarCap($datos) == false) {
                        echo 6;
                        break;
                    }

                    $i++;
                }
                $cap->añadirList($datos);
                echo 1;
            }
        }
    }
}
