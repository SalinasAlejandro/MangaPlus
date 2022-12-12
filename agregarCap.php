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
            <title>Agregar Capítulo</title>
            <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="css/main.css">
            <link rel="stylesheet" type="text/css" href="css/registro.css">
            <link rel="stylesheet" type="text/css" href="css/agregarCap.css">
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
                <h1 class="text-center">Registro de Capítulo</h1>
                <hr>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <form method="post" enctype="multipart/form-data" id="fmCap" autocomplete="off">
                            <label>Seleccione el manga</label><br>
                            <select name="manga" id="manga" class="select-css">
                                <option value="-1">Selecciona un manga</option>
                                <?php
                                $direccion = dirname(__FILE__);
                                require_once $direccion . "/procesos/mangas/seleccionarManga.php";
                                while ($mostrar = mysqli_fetch_array($todos)) {
                                    $id = $mostrar['id_manga'];
                                ?>
                                    <option value="<?php echo $id ?>"><?php echo $mostrar['titulo'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <label>Numero del capítulo</label>
                            <input type="number" name="numero" id="numero" min="0" class="form-control" placeholder="Ingrese el número del capítulo">
                            <label>Seleccionar páginas</label>
                            <input type="file" name="file[]" class="form-control" multiple>
                            <br>
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <a href="index.php" class="btn btn-success iniSesion">Cancelar</a>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button type="button" onclick="subir()" class="btn btn-primary registrar">Agregar</button>
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
            <script src="js/agregarCap.js"></script>

        </body>

        </html>
<?php
    }
}
?>