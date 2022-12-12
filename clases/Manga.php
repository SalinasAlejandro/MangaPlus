<?php

$direccion = dirname(__FILE__);
require_once $direccion . '/Conexion.php';

class Manga extends Conectar
{

    public function agregarManga($datos)
    {
        if (self::buscarMangaRepetido($datos['titulo'], $datos['autor'])) {
            return 2;
        } else {
            $conexion = Conectar::conexion();
            $sql = "INSERT into t_manga (titulo, autor, cover, descripcion) values (?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssss', $datos["titulo"], $datos["autor"], $datos["cover"], $datos["descripcion"]);

            $exito = $query->execute();
            $query->close();
            return $exito;
        }
    }

    public static function buscarMangaRepetido($titulo, $autor)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT titulo FROM t_manga WHERE titulo = '$titulo' AND autor = '$autor'";
        $result = mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_array($result);

        $datos2 = isset($datos['titulo']);
        if ($datos2 == true) {
            return 1;
        } else return 0;
    }

    public function obtenerMangasNew()
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT id_manga, titulo, autor, cover, descripcion
                FROM t_manga
                order by fecha DESC LIMIT 6";
        return mysqli_query($conexion, $sql);
    }

    public function obtenerManga($id)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT id_manga, titulo, autor, cover, descripcion
                FROM t_manga
                WHERE id_manga = '$id'";
        return mysqli_query($conexion, $sql);
    }

    public function sumarView($id)
    {
        $conexion = Conectar::conexion();

        $sql = "UPDATE t_manga SET vistas = vistas + 1
                WHERE id_manga = '$id'";
        return mysqli_query($conexion, $sql);
    }

    public function obtenerMangasNombre()
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT id_manga, titulo
                FROM t_manga";
        return mysqli_query($conexion, $sql);
    }

    public function todosLosMangas()
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT id_manga, titulo, autor, cover, descripcion
                FROM t_manga
                ORDER BY titulo";
        return mysqli_query($conexion, $sql);
    }

    public function buscador($manga)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT id_manga
                FROM t_manga
                WHERE titulo = '$manga'";
        return mysqli_query($conexion, $sql);
    }

    public function capsNew()
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT t_manga.id_manga, t_manga.titulo, t_lista.numCap, t_manga.cover
                FROM t_manga
                join t_lista ON t_manga.id_manga = t_lista.id_manga
                order by t_lista.fecha DESC LIMIT 6";
        return mysqli_query($conexion, $sql);
    }

    public function masVistos()
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT id_manga, titulo, autor, cover
                FROM t_manga
                ORDER BY vistas DESC LIMIT 6";
        return mysqli_query($conexion, $sql);
    }

    public function mangaRand()
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT id_manga, titulo, autor, cover
                FROM t_manga
                ORDER BY RAND() LIMIT 1";
        return mysqli_query($conexion, $sql);
    }
    //
}
