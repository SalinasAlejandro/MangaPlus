<?php

$direccion = dirname(__FILE__);
require_once $direccion . '/Conexion.php';

class Capitulo extends Conectar
{


    public static function buscarCapRepetido($manga, $cap)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT COUNT(*) as existeCap FROM t_lista WHERE id_manga = '$manga' AND numCap = '$cap'";
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_array($result)['existeCap'];
    }

    public function agregarCap($datos)
    {
        $conexion = Conectar::conexion();
        $sql = "INSERT into t_capitulo (id_manga, numCap, pagina) values (?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('iis', $datos["manga"], $datos["numero"], $datos["pagina"]);

        $exito = $query->execute();
        $query->close();
        return $exito;
    }

    public function añadirList($datos)
    {
        $conexion = Conectar::conexion();
        $sql = "INSERT into t_lista (id_manga, numCap) values (?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('ii', $datos["manga"], $datos["numero"]);

        $exito = $query->execute();
        $query->close();
        return $exito;
    }

    public function listaCaps($manga)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT id_manga, numCap, fecha
                FROM t_lista
                WHERE id_manga = '$manga'";
        return mysqli_query($conexion, $sql);
    }

    public function verCap($manga, $cap)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT id, pagina
                FROM t_capitulo
                WHERE id_manga = '$manga'
                AND numCap = '$cap'";
        return mysqli_query($conexion, $sql);
    }

    public function llenarCombo($manga)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT numCap
                FROM t_lista
                WHERE id_manga = '$manga'";
        return mysqli_query($conexion, $sql);
    }

    public function capAnt($manga, $cap)
    {
        $conexion = Conectar::conexion();

        $nCap = $cap - 1;
        $sql = "SELECT COUNT(*) as existeCap FROM t_lista WHERE id_manga = '$manga' AND numCap = '$nCap'";
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_array($result)['existeCap'];
    }

    public function capSig($manga, $cap)
    {
        $conexion = Conectar::conexion();

        $nCap = $cap + 1;
        $sql = "SELECT COUNT(*) as existeCap FROM t_lista WHERE id_manga = '$manga' AND numCap = '$nCap'";
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_array($result)['existeCap'];
    }
    //
}
