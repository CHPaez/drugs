@extends('/layouts/header')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex">
                <h4>Administrar roles de usuarios</h4>
                {!! $incluir_botones['crear'] !!}
            </div>
        </div>
    </div>
</section>
<br>
<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    @include('Administracion.RolesUsuarios.table')

</div>
</div>
@stop
@section('js')
<script>
    $(document).ready(function() {

        //Evento agregar nuevo rol
        agregarNuevoRol();


        //Evento actualizar
        $(".actualizar").click(function() {
            let selectorActual = $(this); // Captura el selector actual
            let id = $(this).closest('tr').find('td:first-child').text();
            let datosFilas = {
                '_token': "{{ csrf_token() }}",
                'bandera': 'Actualizar',
                'id': id,
                'Users_id': $(`#user_${id}`).val(),
                'Roles_id': $(`#rol_${id}`).val()
            };

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{route('user.roles.update')}}",
                method: 'PATCH',
                data: datosFilas,
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    window.location.reload();
                }
            });
        });


        //Evento editar
        $('.editar').click(function() {
            // Obtén el id del botón clickeado
            let id = $(this).closest('tr').find('td:first-child').text();
            selectores('roles', 'rol_', 'id', 'RoNombre');
            selectores('usuarios', 'user_', 'id', 'name');
            editar(id);
        });

        //Evento eliminar
        $('.eliminar').click(function() {
            // Obtén el id del botón clickeado
            let id = $(this).closest('tr').find('td:first-child').text();
            eliminar(id);
        });


    });

    function eliminar(id) {
        if (confirm('¿Esta seguro de eliminar el registro?')) {
            let datos = {
                'bandera': 'eliminar',
                'id': id
            };
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: `{{route('user.roles.delete')}}`,
                method: 'DELETE',
                data: datos,
                success: function(response) {
                   
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    window.location.reload();
                }
            });
        }
    }

    function editar(id) {

        $("#nuevo_rol").prop('disabled', true);
        $(`#f_field_${id} .actualizar`).removeClass('d-none');

        const fields = $(`#f_field_${id} select`);

        if (fields.prop('disabled')) {
            fields.prop('disabled', false); // Habilita los selectores y checkboxes
        }else {
            $(`#f_field_${id} .actualizar`).addClass('d-none');
            $("#nuevo_rol").prop('disabled', $("button.actualizar").length != $("button.actualizar.d-none").length);
            fields.prop('disabled', true);
        }

    }

    function obtenerUltimoId() {
        let ultimoId = 0;
        $("#roles-table tbody tr").each(function() {
            let currentId = parseInt($(this).attr("id").split("_")[1]);
            if (currentId > ultimoId) {
                ultimoId = currentId;
            }
        });
        return ultimoId;
    }
    let idsUtilizados = [];

    function agregarNuevoRol() {
        let MiTabla = $("#roles-table tbody");
        $("#nuevo_rol").click(function() {
            $(".editar, .eliminar").attr("disabled", true);
            const contador = MiTabla.children().length + 1

            // Agregar el ID utilizado al registro
            idsUtilizados.push(contador);

            const nuevaFila = $(`
            <tr id='f_${contador}'>
                <td>-</td>
                <td>
                    <select class="form-select" name="rol_${contador}">
                        <option selected>Seleccionar</option>
                    </select>
                </td>
                <td>
                    <select class="form-select" name="user_${contador}">
                        <option selected>Seleccionar</option>
                    </select>
                </td>
                <td>
                    <div class='btn-group'>
                        <button class='btn btn-outline-danger btn-sm eliminar_field' data-id="${contador}">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `);
            // Agregar la nueva fila a la tabla
            MiTabla.append(nuevaFila);
            selectores('roles', 'rol_', 'id', 'RoNombre');
            selectores('usuarios', 'user_', 'id', 'name');
            $("#btn_guardar, #btn_cancelar").removeClass('d-none');
        });

        MiTabla.on("click", ".eliminar_field", function() {
            let id = $(this).data("id");
            idsUtilizados.splice(idsUtilizados.indexOf(id), 1);
            $(`#f_${id}`).remove();

            // Mostrar u ocultar botón guardar según la cantidad de filas
            $("#btn_guardar, #btn_cancelar").toggleClass('d-none', idsUtilizados.length <= 0);
            $(".editar, .eliminar").attr("disabled", false);
        });
    }

    function selectores(bandera, selectorName, idKey, nameKey) {

        let Selector = {
            '_token': "{{ csrf_token() }}",
            'bandera': bandera,
        };

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            url: "{{route('roles.selectores')}}",
            method: 'POST',
            dataType: "json",
            data: Selector,
            success: function(response) {
                $.each(response, function(index, item) {
                    // Agregar opción al selector específico
                    $(`select[name^='${selectorName}']`).each(function() {
                        if (!$(this).find(`option[value='${item[idKey]}']`).length) {
                            $(this).append(`<option value='${item[idKey]}'>${item[nameKey]}</option>`);
                        }

                    });

                });
            },
            error: function(xhr, status, error) {
                console.error('Error :', error);
            }
        });

    }
</script>

@endsection