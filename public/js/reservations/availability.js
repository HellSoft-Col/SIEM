function updateCalendar(value) {
    $.ajax({
        type: "GET",
        url: value,
        success: function (datos) {
            $("#calendar_incrust").html(datos);
        }
    });
}
