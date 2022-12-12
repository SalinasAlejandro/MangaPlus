<script src="librerias/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="librerias/jquery-ui.css">
<script type="text/javascript" src="librerias/jquery-ui.js"></script>
<script src="librerias/bootstrap4/popper.min.js"></script>
<script src="librerias/bootstrap4/bootstrap.min.js"></script>
<script src="librerias/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var items = <?= json_encode($array) ?>;
        $("#tag").autocomplete({
            source: items,
            select: function(event, item) {
                var params = {
                    equipo: item.item.value
                };
                $.get("procesos/index/buscador.php", params, function(response) {
                    window.location = "manga.php?id=" + response;
                }); // ajax
            }
        });

    });
</script>