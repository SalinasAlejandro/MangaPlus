function agregarMangaNuevo() {
  var formData = new FormData(document.getElementById("frmManga"));
  $.ajax({
    url: "procesos/mangas/agregarManga.php",
    type: "POST",
    dataType: "html",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (r) {
      switch (r) {
        case "1":
          $("#frmManga")[0].reset();
          swal("Agregado con éxito", "Manga nuevo n.n", "success");
          break;
        case "2":
          swal("Este manga ya existe", "Favor de ingresar otro", "error");
          break;
        case "3":
          swal("Campos vacíos", "Favor de llenar todos los campos", "error");
          break;
        case "4":
          swal("No se ha añadido COVER", "Favor de ingresar un cover", "error");
          break;
        default:
          swal("Error al agregar", "Inténtelo de nuevo", "error");
          break;
      }
    },
  });

  return false;
}
