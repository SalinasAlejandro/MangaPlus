<?php

$direccion = dirname(__FILE__);
require_once $direccion . "/../../clases/Capitulo.php";
$cap = new Capitulo;
$hojas = $cap->verCap($_POST['manga'], $_POST['capitulo']);
$combo = $cap->llenarCombo($_POST['manga']);
$combo2 = $cap->llenarCombo($_POST['manga']);
$ant = false;
$sig = false;
if ($cap->capAnt($_POST['manga'], $_POST['capitulo']) > 0) {
    $ant = true;
}
if ($cap->capSig($_POST['manga'], $_POST['capitulo']) > 0) {
    $sig = true;
}

function capAnt($ant)
{
    if ($ant == true) {
        $antCap = $_POST['capitulo'] - 1;
        echo '<a class="ch-prev-btn" href="capitulo.php?manga=' . $_POST['manga'] . '&capitulo=' . $antCap . '&titulo=' . $_GET['titulo'] . '" rel="prev">
        <i class="fas fa-angle-left"></i> Prev
    </a>';
    } else {
        echo '<a class="ch-prev-btn disabled" rel="prev">
        <i class="fas fa-angle-left"></i> Prev
    </a>';
    }
}
function capSig($sig)
{
    if ($sig == true) {
        $sigCap = $_POST['capitulo'] + 1;
        echo '<a class="ch-next-btn" href="capitulo.php?manga=' . $_POST['manga'] . '&capitulo=' . $sigCap . '&titulo=' . $_GET['titulo'] . '" rel="next">
        Next <i class="fas fa-angle-right"></i>
    </a>';
    } else {
        echo '<a class="ch-next-btn disabled" href="" rel="next">
        Next <i class="fas fa-angle-right"></i>
    </a>';
    }
}
