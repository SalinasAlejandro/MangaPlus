<?php
session_start();

if (!isset($_GET['manga']) || !isset($_GET['capitulo'])) {
    header("location:index.php");
} else {
    $_POST['manga'] = $_GET['manga'];
    $_POST['capitulo'] = $_GET['capitulo'];
    $direccion = dirname(__FILE__);
    require_once $direccion . "/procesos/capitulos/verCap.php";
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Manga PLus</title>
        <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/capitulo.css">
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

        <div class="contenido">

            <article style="height: auto;">
                <div class="headpost">
                    <h1><?php echo $_GET['titulo'] ?></h1>
                    <div class="allc">
                        Mirar todos los capítulos disponibles de <a href="manga.php?id=<?php echo $_POST['manga'] ?>"><?php echo $_GET['titulo'] ?></a>
                    </div>
                </div>
                <div class="bodypost">
                    <div class="chnav ctop">
                        <span class="selector">
                            <div>
                                <select name="cbCap" id="cbCap">
                                    <option value="-1">Escoger Capítulo</option>
                                    <?php
                                    while ($mostrar = mysqli_fetch_array($combo)) {
                                    ?>
                                        <option value="<?php echo $mostrar['numCap'] ?>">Capítulo <?php echo $mostrar['numCap'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </span>
                        <span class="npv r">
                            <div class="nextprev">
                                <?php echo capAnt($ant); ?>
                                <?php echo capSig($sig); ?>
                            </div>
                        </span>
                    </div>
                    <div id="readerarea">
                        <?php
                        $i = 1;
                        while ($mostrar = mysqli_fetch_array($hojas)) {
                        ?>
                            <img class="ts-main-image" data-index="<?php echo $i ?>" src="<?php echo $mostrar['pagina']; ?>">
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                    <div class="chnav cbot">
                        <span class="selector">
                            <div>
                                <select name="cbCap" id="cbCap2">
                                    <option value="-1">Escoger Capítulo</option>
                                    <?php
                                    while ($mostrar = mysqli_fetch_array($combo2)) {
                                    ?>
                                        <option value="<?php echo $mostrar['numCap'] ?>">Capítulo <?php echo $mostrar['numCap'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </span>
                        <span class="npv r">
                            <div class="nextprev">
                                <?php echo capAnt($ant); ?>
                                <?php echo capSig($sig); ?>
                            </div>
                        </span>
                    </div>
                </div>
            </article>

        </div>

        <div class="container">
            <!-- Disqus -->
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

        <?php
        $direccion = dirname(__FILE__);
        require_once $direccion . "/librerias.php";
        ?>

        <script type="text/javascript">
            $("#cbCap").change(function() {
                var capitulo = $(this).children(":selected").val();
                window.location = "capitulo.php?manga=<?php echo $_POST['manga'] ?>&capitulo=" + capitulo + "&titulo=<?php echo $_GET['titulo'] ?>";
            });

            $("#cbCap2").change(function() {
                var capitulo = $(this).children(":selected").val();
                window.location = "capitulo.php?manga=<?php echo $_POST['manga'] ?>&capitulo=" + capitulo + "&titulo=<?php echo $_GET['titulo'] ?>";
            });
        </script>

    </body>

    </html>
<?php
}
?>