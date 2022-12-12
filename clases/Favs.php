<?php

$direccion = dirname(__FILE__);
require_once $direccion . '/Conexion.php';

class Favs extends Conectar
{


    public static function buscarFavs($usuario, $manga)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT COUNT(*) as existeFav FROM t_favs WHERE idUsuario = '$usuario' AND idManga = '$manga' ";
        $result = mysqli_query($conexion, $sql);
        return mysqli_fetch_array($result)['existeFav'];
    }

    public function ponerFav($usuario, $manga)
    {
        $conexion = Conectar::conexion();
        $sql = "INSERT into t_favs (idUsuario, idManga) values (?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('ii', $usuario, $manga);

        $exito = $query->execute();
        $query->close();
        return $exito;
    }

    public function quitarFav($usuario, $manga)
    {
        $conexion = Conectar::conexion();

        $sql = "DELETE FROM t_favs WHERE idUsuario = '$usuario' AND idManga = '$manga'";

        echo $conexion->query($sql);
        $conexion->close();
    }

    public function mostrarFavs($usuario)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT t_manga.id_manga, t_manga.titulo, t_manga.autor, t_manga.cover, t_manga.descripcion
                FROM t_manga
                join t_favs ON t_manga.id_manga = t_favs.idManga
                WHERE t_favs.idUsuario = '$usuario'";
        return mysqli_query($conexion, $sql);
    }
    //
}
