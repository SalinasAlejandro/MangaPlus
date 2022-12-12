function subir() {
  var formData = new FormData(document.getElementById("fmCap"));
  $.ajax({
    url: "procesos/capitulos/agregarCap.php",
    type: "POST",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (r) {
      switch (r) {
        case "1":
          $("#fmCap")[0].reset();
          swal("Agregado con éxito", "A disfrutar n.n", "success");
          break;
        case "2":
          swal("Campos vacíos", "Favor de llenar todos los campos", "error");
          break;
        case "3":
          swal("Capítulo invalido", "Favor de poner un número de capítulo válido", "error");
          break;
        case "4":
          swal("No se ha añadido Páginas", "Favor de ingresar las páginas del capítulo", "error");
          break;
        case "5":
          swal("Este capítulo ya existe", "Favor de ingresar otro", "error");
          break;
        default:
          swal("Error al agregar", "Inténtelo de nuevo", "error");
          break;
      }
    },
  });
}
