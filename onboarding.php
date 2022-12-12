<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multistep User Onboarding Example</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="librerias/onboarding/css/osfont-icon.css">
    <link rel="stylesheet" href="librerias/onboarding/css/onboard.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/perfil.css">
</head>

<body>

    <div class="onboard-modal modal fade animated show-on-load">
        <div class="modal-dialog modal-centered">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span class="close-label">Cerrar</span>
                    <span class="os-icon os-icon-close"></span>
                </button>
                <div class="onboard-slider-container">

                    <div class="onboard-slide">
                        <div class="onboard-media">
                            <img alt="" src="img/logo.png" style="padding-top: 30px;">
                        </div>
                        <div class="onboard-slice-left background-danger">
                            <h4 class="onboard-title text-white">
                                Bienvenido a Manga Plus by Shueisha
                            </h4>
                            <div class="onboard-text text-white">
                                El mejor lugar para leer mangas.
                            </div>
                        </div>
                    </div>
                    <div class="onboard-slide" style="padding-bottom: -250px;">
                        <div class="onboard-media">
                            <img alt="" src="img/Onboarding1.png" style="padding-top: 30px;" width="100%" >
                        </div>
                        <div class="onboard-curve-left background-danger" >
                            <h4 class="onboard-title">
                                Marcar Favoritos
                            </h4>
                            <div class="onboard-text">
                                Puedes marcar un manga como FAVORITO pulsando el botón AGREGAR A FAVORITOS.
                            </div>
                        </div>
                    </div>
                    <div class="onboard-slide">
                        <div class="onboard-media">
                            <img alt="" src="img/Onboarding2.png" style="padding-top: 30px;" width="100%" >
                        </div>
                        <div class="onboard-curve-right background-danger">
                            <h4 class="onboard-title">
                                Mira tus favoritos
                            </h4>
                            <div class="onboard-text">
                                Tu lista de mangas favoritos se encuentra en   <span class="far fa-bookmark"></span> Favoritos
                            </div>
                        </div>
                    </div>
                    <div class="onboard-slide">
                        <div class="onboard-media">
                            <img alt="" src="img/logo.png" style="padding-top: 30px;">
                        </div>
                        <div class="onboard-slice-right background-danger">
                            <h4 class="onboard-title text-white">
                                A disfrutar n.n
                            </h4>
                            <div class="onboard-text text-white">
                                Gracias por su preferencia.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $('.onboard-modal.show-on-load').modal('show');
        if ($('.onboard-modal .onboard-slider-container').length) {
            $('.onboard-modal .onboard-slider-container').slick({
                dots: true,
                infinite: false,
                adaptiveHeight: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
            $('.onboard-modal').on('shown.bs.modal', function (e) {
                $('.onboard-modal .onboard-slider-container').slick('setPosition');
            });
        }
    </script>

</body>

</html>