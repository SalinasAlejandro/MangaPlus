function agregarUsuarioNuevo() {
  $.ajax({
    method: "POST",
    data: $("#frmRegistro").serialize(),
    url: "procesos/usuarios/agregarUsuario.php",
    success: function (r) {
      switch (r) {
        case "1":
          $("#frmRegistro")[0].reset();
          swal("Agregado con éxito", "Bienvenido", "success");
          break;
        case "2":
          swal("Este usuario ya existe", "Favor de escribir otro", "error");
          break;
        case "3":
          swal("Campos vacíos", "Favor de llenar todos los campos", "error");
          break;
        case "4":
          swal(
            "Contraseñas no coinciden",
            "Favor de verificar ambas contraseñas",
            "error"
          );
          break;
        case "5":
          swal(
            "Correo no válido",
            "Favor de ingresar un correo válido",
            "error"
          );
          break;
        case "6":
          swal(
            "Nombre inválido",
            "Favor de ingresar un nombre válido",
            "error"
          );
          break;
        case "7":
          swal(
            "Contraseña inválida",
            "Favor de ingresar una contraseña válida",
            "error"
          );
          break;
        default:
          swal("Error al agregar", "Inténtelo de nuevo", "error");
          break;
      }
    },
  });

  return false;
}
