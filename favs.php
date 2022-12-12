<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:index.php");
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Manga PLus</title>
        <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
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
        $direccion = dirname(__FILE__);
        require_once $direccion . "/procesos/mangas/mostrarFavs.php";
        ?>
        <img src="img/header.png" class="headerImg">

        <?php
        $i = 0;
        while ($mostrar = mysqli_fetch_array($cont)) {
            $i++;
            break;
        }
        if ($i > 0) {
        ?>
            <h1 class="styles-module_title_3gUV9 HorizontalTitleList-module_featuredTitle_Q9zOW">Favoritos</h1>
            <div class="UpdatedTitles-module_gridContainer_mw8H9">
                <!-- Mangas nuevos -->
                <?php
                while ($mostrar = mysqli_fetch_array($todos)) {
                    $id = $mostrar['id_manga'];
                ?>
                    <div class="UpdatedTitle-module_titleWrapper_2EQIT">
                        <a href="manga.php?id=<?php echo $id ?>">
                            <div class="AllTitle-module_allTitle_1CIUC">
                                <img alt="Lea el manga <?php echo $mostrar['titulo'] ?> totalmente gratis" class="img-animate AllTitle-module_image_JIEI9" src="<?php echo $mostrar['cover'] ?>">
                                <p class="AllTitle-module_title_20PzS"><?php echo $mostrar['titulo'] ?></p>
                                <p class="AllTitle-module_author_2rV8i"><?php echo $mostrar['autor'] ?></p>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        } else {
        ?>
            <h1 class="styles-module_title_3gUV9 HorizontalTitleList-module_featuredTitle_Q9zOW" style="margin: auto; width: 50%;  padding: 10px;">No tienes Favoritos</h1>
        <?php
        }
        ?>

        <?php
        $direccion = dirname(__FILE__);
        require_once $direccion . "/librerias.php";
        ?>
        <script src="js/index.js"></script>
    </body>
<?php
}
?>