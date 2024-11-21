function habilitar_fila(id) {
    $("#nuevo_modulo").prop('disabled', true);
    $(`#f_field_${id} .actualizar`).removeClass('d-none');

    // Selecciona correctamente los selectores y checkboxes
    const fields = $(`#f_field_${id} select, #f_field_${id} input[type="checkbox"]`);

    if (fields.prop('disabled')) {
        fields.prop('disabled', false); // Habilita los selectores y checkboxes
    } else {
        $(`#f_field_${id} .actualizar`).addClass('d-none');

        $("#nuevo_modulo").prop('disabled', $("button.actualizar").length != $("button.actualizar.d-none").length);

        fields.prop('disabled', true); // Deshabilita nuevamente
    }
}