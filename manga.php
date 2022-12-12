<?php
session_start();

if (!isset($_GET['id'])) {
    header("location:index.php");
} else {
    $_POST['id'] = $_GET['id'];
    $direccion = dirname(__FILE__);
    require_once $direccion . "/procesos/mangas/obtenerManga.php";
    $mostrar = mysqli_fetch_array($manga);
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title><?php echo $mostrar['titulo'] ?></title>
        <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/manga.css">
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

        <div class="container">
            <!-- Cabezada -->
            <div class="row arriba">
                <div class="col-lg-3 mb--30 center">
                    <img class="img-fluid " src="<?php echo $mostrar['cover'] ?>" alt="imagen de <?php echo $mostrar['titulo'] ?>">
                </div>
                <div class="col-lg-9">
                    <div class="pl-lg ">
                        <br>
                        <h1 class="titulo"><?php echo $mostrar['titulo'] ?></h1>
                        <p class="autor"><?php echo $mostrar['autor'] ?></p>
                        <div class="rating-widget">
                            <div class="rating-block">
                                <?php
                                if (isset($_SESSION['usuario'])) {
                                    $direccion = dirname(__FILE__);
                                    require_once $direccion . "/procesos/mangas/buscarFav.php";
                                ?>
                                    <input type="hidden" id="usuario" name="usuario" value="<?php echo $_SESSION['id']; ?>">
                                    <input type="hidden" id="manga" name="manga" value="<?php echo $_POST['id']; ?>">
                                    <div id="btnFav">
                                        <?php
                                        if ($existe > 0) {
                                        ?>
                                            <button id="quitarFav" class="btnFavQuit">
                                                <i class="fas fa-heart"></i> Quitar de Favoritos
                                            </button>
                                            <button id="ponerFav" class="btnFavAgreg">
                                                <i class="far fa-heart"></i> Agregar a Favoritos
                                            </button>
                                        <?php
                                        } else {
                                        ?>
                                            <button id="quitarFav" class="btnFavQuit">
                                                <i class="fas fa-heart"></i> Quitar de Favoritos
                                            </button>
                                            <button id="ponerFav" class="btnFavAgreg">
                                                <i class="far fa-heart"></i> Agregar a Favoritos
                                            </button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <a href="iniSesion.php">
                                        <button class="btnFavAgreg">
                                            <i class="far fa-user"></i> Inicia sesión para marcar este manga como fav
                                        </button>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="review-widget">
                                <br>
                            </div>
                        </div>
                        <article class="product-details-article">
                            <p><?php echo $mostrar['descripcion'] ?></p>
                        </article>
                    </div>
                </div>
            </div>
            <!-- Lista de caps -->
            <div class="row">
                <div class="col-lg-9">
                    <ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1" href="#tab-1" role="tab" aria-controls="tab-1">
                                Lista de Capítulos
                            </a>
                        </li>
                    </ul>
                    <div class="bixbox">
                        <div id="listaCap">
                            <ul>

                                <?php
                                $direccion = dirname(__FILE__);
                                require_once $direccion . "/procesos/capitulos/listaCaps.php";
                                while ($lis = mysqli_fetch_array($lista)) {
                                    $id = $lis['id_manga'];
                                ?>
                                    <li>
                                        <div class="chbox">
                                            <div class="epNum">
                                                <a href="capitulo.php?manga=<?php echo $id ?>&capitulo=<?php echo $lis['numCap'] ?>&titulo=<?php echo $mostrar['titulo'] ?>">
                                                    <span class="numCap">Capítulo <?php echo $lis['numCap'] ?></span>
                                                    <span class="fechaCap"><?php echo $lis['fecha'] ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Disqus -->
            <div>
                <div id="disqus_thread"></div>
                <script>
                    /**
                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document,
                            s = d.createElement('script');
                        s.src = 'https://manga-plus-1.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </div>
        </div>

        <?php
        $direccion = dirname(__FILE__);
        require_once $direccion . "/librerias.php";
        ?>
        <script src="js/manga.js"></script>
        <script type="text/javascript">
            <?php
            if ($existe > 0) {
            ?>
                $("#ponerFav").hide();
            <?php
            } else {
            ?>
                $("#quitarFav").hide();
            <?php
            }
            ?>
        </script>

    </body>

    </html>

<?php
}
?>