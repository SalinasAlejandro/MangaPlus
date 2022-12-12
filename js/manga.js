$("#ponerFav").click(function () {
  $.ajax({
    type: "POST",
    data: {
      usuario: $("#usuario").val(),
      manga: $("#manga").val(),
    },
    url: "procesos/mangas/favPoner.php",
    success: function (r) {
      $("#ponerFav").hide();
      $("#quitarFav").show();
    },
  });
  return false;
});

$("#quitarFav").click(function () {
  $.ajax({
    type: "POST",
    data: {
      usuario: $("#usuario").val(),
      manga: $("#manga").val(),
    },
    url: "procesos/mangas/favQuitar.php",
    success: function (r) {
      $("#ponerFav").show();
      $("#quitarFav").hide();
    },
  });
  return false;
});
