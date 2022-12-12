$(document).ready(function () {
  $image_crop = $("#image_demo").croppie({
    enableExif: true,
    viewport: {
      width: 200,
      height: 200,
      type: "square", //circle
    },
    boundary: {
      width: 300,
      height: 300,
    },
  });

  $("#avatar").on("change", function () {
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop
        .croppie("bind", {
          url: event.target.result,
        })
        .then(function () {});
    };
    reader.readAsDataURL(this.files[0]);
    $("#uploadimageModal").modal("show");
  });

  $(".crop_image").click(function (event) {
    $image_crop
      .croppie("result", {
        type: "canvas",
        size: "viewport",
      })
      .then(function (response) {
        $.ajax({
          url: "procesos/usuarios/cambiarAvatar.php",
          type: "POST",
          data: {
            image: response,
          },
          success: function (data) {
            $("#uploadimageModal").modal("hide");
            $("#elAvatar").remove();
            $("#imagen").html(data);
          },
        });
      });
  });

  $("#btnActualizarPerfil").click(function () {
    actualizarPerfil();
  });
});

function actualizarPerfil() {
  $.ajax({
    type: "POST",
    data: $("#frmActualizarPerfil").serialize(),
    url: "procesos/usuarios/actualizarPerfil.php",
    success: function (r) {
      switch (r) {
        case "1":
          $("#frmActualizarPerfil")[0].reset();
          $("#btnCerrarAct").trigger("click");
          swal(
            "Editado con éxito",
            "Sus datos han sido modificado con éxito",
            "success"
          ).then((value) => {
            window.location = "perfil.php";
          });
          break;
        case "2":
          swal(
            "Nombre de usuario ya existe",
            "Favor de intentarlo con otro",
            "error"
          );
          break;
        case "3":
          swal("Campos vacíos", "Favor de llenar todos los campos", "error");
          break;
        case "4":
          swal(
            "Correo inválido",
            "Favor de ingresar un correo válido",
            "error"
          );
          break;
        case "5":
          swal(
            "Nombre inválido",
            "Favor de ingresar un nombre válido",
            "error"
          );
          break;
        case "6":
          swal(
            "Contraseña no coincide",
            "Favor de verificar su contraseña",
            "error"
          );
          break;
        default:
          swal(
            "Nombre de usuario o correo ya existente",
            "Favor de intentarlo con otro",
            "error"
          );
          break;
      }
    },
  });
}
