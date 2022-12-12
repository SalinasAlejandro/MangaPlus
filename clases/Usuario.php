<?php

$direccion = dirname(__FILE__);
require_once $direccion . '/Conexion.php';

class Usuario extends Conectar
{

    public function agregarUsuario($datos)
    {
        if (self::buscarUsuarioRepetido($datos['usuario'])) {
            return 2;
        } else {
            $conexion = Conectar::conexion();
            $sql = "INSERT into t_usuario (usuario, correo, contraseña) values (?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sss', $datos["usuario"], $datos["correo"], $datos["password"]);

            $exito = $query->execute();
            $query->close();
            return $exito;
        }
    }

    public static function buscarUsuarioRepetido($usuario)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT usuario FROM t_usuario WHERE usuario = '$usuario'";
        $result = mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_array($result);

        $datos2 = isset($datos['usuario']);
        if ($datos2 == true) {
            return true;
        } else return false;
    }

    public function ingresar($usuario, $password)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT count(*) as existeUsuario
                FROM t_usuario
                WHERE usuario = '$usuario'
                AND contraseña = '$password'";
        $result = mysqli_query($conexion, $sql);

        $respuesta = mysqli_fetch_array($result)['existeUsuario'];

        if ($respuesta > 0) {

            $sql = "SELECT id, correo, avatar, tipo_usuario FROM t_usuario Where usuario = '$usuario' AND contraseña = '$password'";
            $result = mysqli_query($conexion, $sql);
            $usuarioObj = mysqli_fetch_array($result);

            $_SESSION['usuario'] = $usuario;
            $_SESSION['id'] = $usuarioObj['id'];
            $_SESSION['correo'] = $usuarioObj['correo'];
            $_SESSION['avatar'] = $usuarioObj['avatar'];
            $_SESSION['tipo_usuario'] = $usuarioObj['tipo_usuario'];

            return 1;
        } else {
            return 0;
        }
    }

    public static function numFavs($idUsuario)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT count(*) as numFavs FROM t_favs WHERE idUsuario = '$idUsuario'";
        $result = mysqli_query($conexion, $sql);
        $respuesta = mysqli_fetch_array($result)['numFavs'];
        return $respuesta;
    }

    public function actualizarUsuario($datos)
    {
        if (!self::verificarContraseña($datos['id'], $datos['password'])) {
            return 6;
        } else {
            $conexion = Conectar::conexion();

            $sql = "UPDATE t_usuario SET usuario = ?, correo = ? where id = ? AND contraseña = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param("ssis", $datos['usuario'], $datos['correo'], $datos['id'], $datos['password']);
            $respuesta = $query->execute();
            $query->close();

            self::reabrirSesion($datos['id']);

            return $respuesta;
        }
    }

    public static function verificarContraseña($id, $contra)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT contraseña FROM t_usuario WHERE id = '$id' AND contraseña = '$contra'";
        $result = mysqli_query($conexion, $sql);
        $respuesta = mysqli_fetch_array($result);
        return $respuesta;
    }

    public static function reabrirSesion($idUsuario)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT usuario, correo, avatar, tipo_usuario FROM t_usuario Where id = '$idUsuario'";
        $result = mysqli_query($conexion, $sql);
        $usuarioObj = mysqli_fetch_array($result);

        session_start();
        session_destroy();
        session_start();

        $_SESSION['usuario'] = $usuarioObj['usuario'];
        $_SESSION['id'] = $idUsuario;
        $_SESSION['correo'] = $usuarioObj['correo'];
        $_SESSION['avatar'] = $usuarioObj['avatar'];
        $_SESSION['tipo_usuario'] = $usuarioObj['tipo_usuario'];
    }

    public function cambiarAvatar($datos)
    {
        $conexion = Conectar::conexion();
        $sql = "UPDATE t_usuario SET avatar = ? where id = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("si", $datos['ruta'], $datos['idUsuario']);
        $respuesta = $query->execute();
        $query->close();

        session_destroy();
        self::reabrirSesion($datos['idUsuario']);

        return $respuesta;
    }

    public function validarNuevo($usuario)
    {
        $conexion = Conectar::conexion();

        $sql = "SELECT nuevo FROM t_usuario WHERE id = '$usuario'";
        return mysqli_query($conexion, $sql);
    }

    public function ponerNoNuevo($usuario)
    {
        $conexion = Conectar::conexion();

        $sql = "UPDATE t_usuario SET nuevo = 0
                WHERE id = '$usuario'";
        return mysqli_query($conexion, $sql);
    }
}
