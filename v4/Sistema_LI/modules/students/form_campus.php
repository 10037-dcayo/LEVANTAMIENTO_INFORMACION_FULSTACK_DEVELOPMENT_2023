<?php
require_once($_SESSION['raiz'] . '/modules/sections/role-access-admin-editor.php');

function unique_id($l = 10)
{
    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
}


$id_generate = 'stdt-' . unique_id(5);
?>
<div class="form-data">
    <div class="head">
        <h1 class="titulo">Estudiantes Sede Latacunga</h1>
    </div>
    <div class="body">
        
    </div>
</div>
<div class="content-aside">
    <?php
    include_once "../sections/options-disabled.php";
    ?>
</div>
<script>
$(document).ready(function(){
    $("#txtuserdates").datepicker({
        dateFormat: 'yy-mm-dd',
        numberOfMonths: 1,
        onSelect: function(selectedDate) {
        $(this).val(selectedDate); 
    }
});

    // Agregamos cada fecha seleccionada a la lista
    $("#addBtn").click(function(event) {
        event.preventDefault();
        var date = $("#txtuserdates").val();
        if (date != "") {
            $("#dateList").append("<li>" + date + " <button class='removeBtn'><i class='fas fa-times-circle fa-lg fa-spin'></i></button></li>");
            $("#txtuserdates").val("");
        }
    });
    
    // Eliminamos la fecha seleccionada de la lista
    $(document).on("click", ".removeBtn", function() {
        $(this).parent().remove();
    });
    
    // Al hacer submit, guardamos la lista en la variable students_asistencia
    $("form").submit(function() {
        var dates = [];
        $("#dateList li").each(function() {
            dates.push($(this).text().replace(" Eliminar", ""));
        });
        $("#txtuserdates").val(dates.join(", "));
        return true;
    });
});
</script>
<script>
$(document).ready(function(){
    // Agregamos cada horario seleccionado a la lista
    $("#addHourBtn").click(function(event) {
        event.preventDefault();
        var startHour = $("#txtuserhours_start").val();
        var endHour = $("#txtuserhours_end").val();
        if (startHour != "" && endHour != "") {
            $("#hourList").append("<li>" + startHour + " - " + endHour + " <button class='removeHourBtn'><i class='fas fa-times-circle fa-lg fa-spin'></i></button></li>");
            $("#txtuserhours").val($("#txtuserhours").val().replace(hour, ''));
            $("#txtuserhours_start").val("");
            $("#txtuserhours_end").val("");
        }
    });
    
    // Eliminamos el horario seleccionado de la lista
    $(document).on("click", ".removeHourBtn", function() {
        $(this).parent().remove();
        $("#txtuserhours").val($("#hourList").html());
    });
    
    // Al hacer submit, guardamos la lista en la variable students_horario
    $("form").submit(function() {
        var hours = [];
        $("#hourList li").each(function() {
            var hour = $(this).text().replace(" Eliminar", "");
            hour = hour.split(" - ");
            hours.push(hour[0] + "-" + hour[1]);
        });
        $("#txtuserhours").val(hours.join(", "));
        return true;
    });
});
</script>

<script>
$(document).ready(function() {
  // Al hacer clic en el botón Agregar, se suman las horas ingresadas y se actualiza el campo Total de Horas
  $("#addHoursBtn").on("click", function(event) {
    event.preventDefault();
    var hours = parseInt($("#txthours").val());
    var total = parseInt($("#txttotalhours").val());
    if (!isNaN(hours)) {
      total += hours;
      $("#txttotalhours").val(total);
      $("#txthours").val(0);
    }
  });

  // Al hacer clic en el botón Reiniciar, se reinicia el campo Total de Horas
  $("#resetHoursBtn").on("click", function(event) {
    event.preventDefault();
    $("#txttotalhours").val(0);
    
    
  });
  $("form").submit(function() {
    $("#txttotalhours_hidden").val($("#txttotalhours").val());
    return true;
  });

});
</script>
<script src="/js/modules/students.js" type="text/javascript"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-0sCz7O9XlHUBlTepQg2tL/j/ZtMInzGRBfKv2n/bGEB1MkXkXpy0eMHvG+vcnBfACpJZl+S6Z5p5r5L5Hy5U2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<?php

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

// Todos los derechos reservados © Quito - Ecuador || Estudiantes TIC's en línea || Levantamiento de Información || ESPE 2022-2023

// Ricardo Alejandro  Jaramillo Salgado, Michael Andres Espinosa Carrera, Steven Cardenas, Luis LLumiquinga

# ⚠⚠⚠ DO NOT DELETE ⚠⚠⚠

?>





