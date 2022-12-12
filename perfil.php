<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:index.php");
} else {
    $id = $_SESSION['id'];
    $nombre = $_SESSION['usuario'];
    $correo = $_SESSION['correo'];
    $avatar = $_SESSION['avatar'];
    $direccion = dirname(__FILE__);
    require_once $direccion . "/procesos/usuarios/numFavs.php";
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Manga PLus</title>
        <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="librerias/fontawesome/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/perfil.css">
    </head>

    <body>

        <?php
        $direccion = dirname(__FILE__);
        require_once $direccion . "/navbar.php";
        $direccion = dirname(__FILE__);
        require_once $direccion . "/procesos/usuarios/validarNuevo.php";
        $esNew = false;
        while ($mostrar = mysqli_fetch_array($nuevo)) {
            if ($mostrar['nuevo'] == 1) {
                $esNew = true;
            }
        }
        if ($esNew == true) {
            $direccion = dirname(__FILE__);
            require_once $direccion . "/onboarding.php";
            $direccion = dirname(__FILE__);
            require_once $direccion . "/procesos/usuarios/ponerNoNuevo.php";
        }
        ?>

        <div class="container emp-profile">
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <div id="imagen">
                            <img id="elAvatar" src="<?php echo $avatar ?>" />
                        </div>
                        <div class="file btn btn-lg btn-primary" id="btnAvatar">
                            Cambiar Foto
                            <input type="file" name="avatar" id="avatar" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <br>
                        <h5>
                            <?php echo $nombre; ?>
                        </h5>
                        <hr><br>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Perfil</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2" data-toggle="modal" data-target="#editarPerfil"><br>
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Editar" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $id ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nombre de Usuario</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $nombre ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Correo</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $correo ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Número de Favoritos</label>
                                </div>
                                <div class="col-md-6">
                                    <p><?php echo $nFavs ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="editarPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="frmActualizarPerfil">
                            <input type="text" id="idUsuario" name="idUsuario" hidden="" value="<?php echo $id ?>">
                            <label>Nombre de Usuario</label>
                            <input type="text" id="usuarioU" name="usuarioU" class="form-control" value="<?php echo $nombre ?>">
                            <small>Mínimo 3 caracteres, máximo 25 caracteres</small><br>
                            <label>Correo</label>
                            <input type="text" id="correoU" name="correoU" class="form-control" value="<?php echo $correo ?>">
                            <label>Contraseña</label>
                            <input type="password" id="contraU" name="contraU" class="form-control" placeholder="Ingrese su contraseña">
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnCerrarAct" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btnActualizarPerfil">Modificar</button>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>

    <div class="modal fade" id="uploadimageModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Foto de Perfil</h5>
                    <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            <div id="image_demo" style="width:350px; margin-top:30px"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cerrar" id="btnCerrarAct" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary crop_image" >Modificar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    $direccion = dirname(__FILE__);
    require_once $direccion . "/librerias.php";
    ?>
    <script src="librerias/croppie/croppie.js"></script>
    <link rel="stylesheet" type="text/css" href="librerias/croppie/croppie.css" />
    <script src="js/perfil.js"></script>

<?php
}
?>