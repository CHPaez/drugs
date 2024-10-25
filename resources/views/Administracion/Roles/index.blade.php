@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h3>Roles</h3>
                    {!! $incluir_botones['crear'] !!}
                </div>
            </div>
        </div>
    </section>
    <br>
    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        @include('Administracion.Roles.table')

    </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function() {

            agregarNuevoRol();
            $("#btn_cancelar").click(function() {
                window.location.reload();
            });

            //Accion actualizar
            $("#btn_actualizar").click(function() {

                let datosFilas = {
                    '_token': "{{ csrf_token() }}",
                    'bandera': 'Actualizar',
                    'datosRoles': capturarDatos()
                };

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ route('Roles.update') }}",
                    method: 'PATCH',
                    data: {
                        datos: datosFilas
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        window.location.reload();
                    }
                });
            });


            $('.editar').click(function() {
                // Obtén el id del botón clickeado
                let id = $(this).closest('tr').find('td:first-child').text();
                $("#nuevo_rol").prop('disabled', true);
                $(`#f_field_${id} .actualizar`).removeClass('d-none');

                // Selecciona correctamente los selectores y checkboxes
                const fields = $(`#f_field_${id} input, #f_field_${id} textarea`);

                if (fields.prop('disabled')) {
                    fields.prop('disabled', false); // Habilita los selectores y checkboxes
                } else {
                    $(`#f_field_${id} .actualizar`).addClass('d-none');
                    $("#nuevo_rol").prop('disabled', $("button.actualizar").length != $("button.actualizar.d-none").length);
                    fields.prop('disabled', true); // Deshabilita nuevamente
                }
            
            });

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
                    url: "{{ route('Roles.delete') }}",
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

        function capturarDatos() {
            let datos = [];

            // Itera sobre cada fila en el cuerpo de la tabla
            $('#roles-table tbody tr').each(function(index) {
                let fila = {};

                // Obtiene el valor de cada campo de entrada en la fila
                fila.id = $(this).find('td:eq(0)').text();
                fila.RoNombre = $(this).find('td:eq(1) input').val();
                fila.RoDescripcion = $(this).find('td:eq(2) textarea').val();

                // Agrega los datos de la fila al arreglo de datos
                datos.push(fila);
            });

            // Devuelve el arreglo de datos capturados
            return datos;
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
            let contador = 0;
            $("#nuevo_rol").click(function() {
                contador += 1;


                $(".editar").attr("disabled", true);
                $(".eliminar").attr("disabled", true);

                let MiTabla = $("#roles-table tbody");

                // Encontrar un nuevo ID no utilizado
                while (idsUtilizados.includes(contador)) {
                    contador++;
                }

                // Agregar el ID utilizado al registro
                idsUtilizados.push(contador);

                // Crear fila para el nuevo módulo
                let nuevaFila = $(`<tr id='f_${contador}'></tr>`);

                // Agregar celdas a la fila
                nuevaFila.append(`<td>-</td>`);
                //Rol
                nuevaFila.append(
                    `<td><input type="text" class="form-control" id="rol_nombre_${contador}" name="rol_nombre_${contador}" placeholder="Nombre del rol" required></td>`
                );

                //Descripcion
                nuevaFila.append(`
            <td>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Agrega una descripcion del rol" id="descripcion_${contador}" name="descripcion_${contador}"></textarea>
                    <label for="floatingTextarea${contador}">Descripción del rol</label>
                </div>
            </td>
        `);

                // Botones de editar y eliminar
                nuevaFila.append(`
            <td>
                <div class='btn-group'>
                    <button class='btn btn-outline-danger btn-sm eliminar_field' data-id="${contador}">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>
            </td>
        `);

                // Agregar la nueva fila a la tabla
                MiTabla.append(nuevaFila);
                $("#btn_guardar").removeClass('d-none');
                $("#btn_cancelar").removeClass('d-none');
            });

            $("#roles-table tbody").on("click", ".eliminar_field", function() {
                let id = $(this).data("id");
                idsUtilizados = idsUtilizados.filter(item => item != id);
                $(`#f_${id}`).remove();

                // Ocultar el botón guardar si no hay filas
                $("#btn_guardar").toggleClass('d-none', idsUtilizados.length <= 0);
                $("#btn_cancelar").toggleClass('d-none', idsUtilizados.length <= 0);
                $(".editar").attr("disabled", false);
                $(".eliminar").attr("disabled", false);
            });
        }
    </script>
    $stop
@endsection
