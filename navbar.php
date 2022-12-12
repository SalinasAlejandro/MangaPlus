<?php

$direccion = dirname(__FILE__);
require_once $direccion . "/procesos/index/todosLosMangas.php";
$array = array();
if ($todos) {
    while ($row = mysqli_fetch_array($todos)) {
        $equipo = utf8_encode($row['titulo']);
        array_push($array, $equipo); // equipos 
    }
}

?>
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" class="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="bazar.php"> <span class="fas fa-book"></span> Todos los mangas </a>
            </li>
            <?php
            if (isset($_SESSION['usuario'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="favs.php"> <span class="far fa-bookmark"></span> Favoritos </a>
                </li>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown avatar">
                            <a class="nav-link dropdown-toggle caja" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> <?php echo ' ' . $_SESSION['usuario'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-info caja" aria-labelledby="navbarDropdownMenuLink-4">
                                <a class="dropdown-item" href="perfil.php"><span class="fas fa-user"> Perfil</a>
                                <a class="dropdown-item" href="procesos/usuarios/cerrarSesion.php"><span class="fas fa-power-off"> Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <?php if ($_SESSION['tipo_usuario'] == 2) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="agregarManga.php"> <span class="far fa-bookmark"></span> Agregar Manga </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agregarCap.php"> <span class="far fa-bookmark"></span> Agregar Capítulo </a>
                    </li>
                <?php } ?>

            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="iniSesion.php"> <span class="fas fa-user"></span> Iniciar Sesión </a>
                </li>
            <?php } ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input id="tag" class="form-control mr-sm-2" type="search" placeholder="Buscar Manga" aria-label="Search">
        </form>
    </div>
</nav>