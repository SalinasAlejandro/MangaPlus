<?php
session_start();
if (!isset($_SESSION['tipo_usuario'])) {
    header("location:index.php");
} else {
    if ($_SESSION['tipo_usuario'] != 2) {
        header("location:index.php");
    } else {
?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <title>Agregar Manga</title>
            <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <link rel="stylesheet" type="text/css" href="css/registro.css">
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="librerias/fontawesome/css/all.css">
        </head>

        <body>

            <?php
            $direccion = dirname(__FILE__);
            require_once $direccion . "/navbar.php";
            ?>

            <div class="container registro">
                <h1 class="text-center">Registro de Manga</h1>
                <hr>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <form id="frmManga" method="POST" onsubmit=" return agregarMangaNuevo()" autocomplete="off">
                            <label>Título del manga</label>
                            <input type="text" name="manga" id="manga" class="form-control" placeholder="Ingrese el título del manga">
                            <label>Autor</label>
                            <input type="text" name="autor" id="autor" class="form-control" placeholder="Ingrese el nombre del autor/mangaka">
                            <label>Cover</label>
                            <input type="file" name="cover" id="cover" class="form-control-file" id="exampleFormControlFile1">
                            <label>Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Agregue la descripción"></textarea>
                            <br>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <a href="index.php" class="btn btn-success iniSesion">Cancelar</a>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button class="btn btn-primary registrar">Agregar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
            $direccion = dirname(__FILE__);
            require_once $direccion . "/librerias.php";
            ?>
            <script src="js/agregarManga.js"></script>

        </body>

        </html>
<?php
    }
}
?>