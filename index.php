<?php
session_start();
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
    ?>
    <img src="img/header.png" class="headerImg">

    <div class="Updates-module_flexContainer_1FDso">

        <main class="maxWidth">

            <div>
                <h1 class="styles-module_title_3gUV9 HorizontalTitleList-module_featuredTitle_Q9zOW">Mangas Recien Agregados</h1>
                <div class="UpdatedTitles-module_gridContainer_mw8H9">
                    <!-- Mangas nuevos -->
                    <?php
                    $direccion = dirname(__FILE__);
                    require_once $direccion . "/procesos/index/datos.php";
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
            </div>

            <div>
                <h1 class="styles-module_title_3gUV9 HorizontalTitleList-module_featuredTitle_Q9zOW">Capítulos nuevos</h1>
                <div class="UpdatedTitles-module_gridContainer_mw8H9">

                    <?php
                    while ($mostrar = mysqli_fetch_array($newCaps)) {
                        $id = $mostrar['id_manga'];
                    ?>
                        <div class="UpdatedTitle-module_titleWrapper_2EQIT">
                            <a href="manga.php?id=<?php echo $id ?>" class="">
                                <div class="UpdatedTitle-module_title_2KlMr">
                                    <img alt="Lea el manga <?php echo $mostrar['titulo'] ?> totalmente gratis" class="img-animate UpdatedTitle-module_titleImage_3DBmi" src="<?php echo $mostrar['cover'] ?>">
                                    <div class="UpdatedTitle-module_titleDescription_Cf0hO">
                                        <p class="UpdatedTitle-module_titleName_1QO_s"><?php echo $mostrar['titulo'] ?></p>
                                    </div>
                                </div>
                            </a>
                            <div class="UpdatedTitle-module_chapter_XrLgd">
                                <a href="capitulo.php?manga=<?php echo $id ?>&capitulo=<?php echo $mostrar['numCap'] ?>&titulo=<?php echo $mostrar['titulo'] ?>">
                                    <div class="UpdatedTitle-module_chapterTitleWrapper_3rnA_">
                                        <p class="UpdatedTitle-module_chapterTitle_kZUrz">#<?php echo $mostrar['numCap'] ?></p>
                                    </div>
                                    <p class="UpdatedTitle-module_chapterDescription_riZF7">Capítulo <?php echo $mostrar['numCap'] ?></p>
                                    <p class="UpdatedTitle-module_latest_2HLFG">Leer el último capítulo</p>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>

            <div>
                <h1 class="styles-module_title_3gUV9 HorizontalTitleList-module_featuredTitle_Q9zOW">Mangas más vistos</h1>
                <div class="UpdatedTitles-module_gridContainer_mw8H9">
                    <!-- Mangas nuevos -->
                    <?php
                    while ($mostrar = mysqli_fetch_array($masViews)) {
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
            </div>

        </main>
        <aside class="izquierda">

            <social class="Updates-module_socials_2DpDY">
                <a href="https://discord.gg/yhneaVX" target="_blank">Discord</a>
                <a href="https://www.facebook.com/mangaplus.es/" target="_blank">Facebook</a>
            </social>

            <div>
                <h1 class="styles-module_title_3gUV9 HorizontalTitleList-module_featuredTitle_Q9zOW">Manga Random</h1>
                <div class="UpdatedTitles-module_gridContainer_mw8H9">
                    <?php
                    while ($mostrar = mysqli_fetch_array($random)) {
                        $id = $mostrar['id_manga'];
                    ?>
                        <div class="UpdatedTitle-module_titleWrapper_2EQIT">
                            <a href="manga.php?id=<?php echo $id ?>">
                                <div class="AllTitle-module_rand">
                                    <img alt="Lea el manga <?php echo $mostrar['titulo'] ?> totalmente gratis" class="img-animate AllTitle-rand" src="<?php echo $mostrar['cover'] ?>">
                                    <p class="AllTitle-module_title_20PzS"><?php echo $mostrar['titulo'] ?></p>
                                    <p class="AllTitle-module_author_2rV8i"><?php echo $mostrar['autor'] ?></p>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </aside>

    </div>

    <?php
    $direccion = dirname(__FILE__);
    require_once $direccion . "/librerias.php";
    ?>
    <script src="js/index.js"></script>

</body>

</html>