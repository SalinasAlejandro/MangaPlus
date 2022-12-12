<?php

    $direccion = dirname(__FILE__);
    require_once $direccion . "/../../clases/Usuario.php";

    $usuarioObj = new Usuario();
    $nFavs =  $usuarioObj->numFavs($id);