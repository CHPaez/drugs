@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h3>Modulos</h3>
                    {!! $incluir_botones['crear'] !!}
                </div>
            </div>
        </div>
    </section>
    <br>
    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        @include('Administracion.Modulos.table')

    </div>
    </div>
@stop
@section('js')
    <script>
        var datos_Submodulo = Array();

        $(document).ready(function() {
            $("select[name^='modulo']").select2({
                placeholder: "Seleccione una opcion",
                allowClear: false,
                width: '100%'
            });
            $("select[name^='submodulo']").select2({
                placeholder: "Seleccione una opcion",
                allowClear: false,
                width: '100%'
            });
            $("select[name^='usuarioRoles']").select2({
                placeholder: "Seleccione una opcion",
                allowClear: false,
                width: '100%'
            });

            let table = $('#modulos-table').DataTable({
                destroy: true,
                paging: true,
                autoWidth: false,
                orderCellsTop: true,
                pageLength: 3,
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },

            });

            agregarNuevoModulo(table);

            $("#modulos-table tbody").on("click", ".eliminar_field", function() {
                table.row($(this).parents('tr')).remove().draw();
            });

            $("#modulos-table tbody").on("change", ".submodulo", function() {
                let id_submodulo = $(this).find("option:selected").val();

                // Encuentra el selector de submodulo dentro de la misma fila
                let $moduloSelect = $(this).closest("tr").find("select[name^='modulo']");
                $moduloSelect.empty();

                if (id_submodulo == "general") {
                    selectores('modulos', 'general').then(datos => {
                        $.each(datos, function(index, item) {
                            $moduloSelect.append(
                                `<option value='${item.id}'>${item.modulo}</option>`
                            );
                        });
                    });
                } else {
                    $.each(datos_Submodulo[0], function(index, item) {
                        if (id_submodulo == item.id) {
                            $("select[name^='modulo']").each(function() {
                                //Se agregan solo las 'opciones' que no esten cargadas en el selector.
                                if (!$moduloSelect.find(`option[value='${item.id}']`)
                                    .length &&
                                    id_submodulo == item.id) {
                                    $moduloSelect.append(
                                        `<option value='${item.id}'>${item.modulo}</option>`
                                    );
                                }
                            });
                        }
                    });
                }
            });

            //Evento nuevo modulo
            $("#btn_guardar").click(function(event) {

                // Recorrer cada checkbox dentro de la tabla
                $('table input[type="checkbox"]').each(function() {
                    // Cambiar el valor del checkbox a 0 o 1 dependiendo de si está chequeado o no
                    // Recorrer cada checkbox dentro de la tabla y cambiar los valores a 0 o 1
                    $('table input[type="checkbox"]').each(function() {
                        $(this).val(this.checked ? 1 : 0);
                    });
                });

                return true;
            });


            //Evento editar
            $(document).on('click', '.editar', function() {
                // Obtén el id del botón clickeado
                let id = $(this).closest('tr').find('td:first-child').text();

                selectores('modulos').then(datos => {
                    datos_Submodulo[0] = datos;
                });

                selectores('rolesUsuario');
                habilitar_fila(id);

                let $row = $(this).closest('tr');

                // Limpiar cualquier evento previo
                $row.find('#btn_actualizar').off('click').on('click', function() {
                    // Encuentra todos los inputs y selects dentro de la fila
                    var inputs = $row.find('input, select');

                    // Serializa los datos de los inputs dentro de la fila
                    var data = {};
                    inputs.each(function() {
                        var name = $(this).attr('name');
                        var value = $(this).is(':checkbox') ? +$(this).is(':checked') : $(
                            this).val();
                        if (name) {
                            data[name] = value;
                        }
                    });

                    editarModulo(data, id);
                });
            });

            $('#modulos-table').on('click', 'button[name="eliminar"]', function() {
                let id = $(this).closest('tr').find('td:first-child').text();
                eliminar(id);
            });

        });

        function editarModulo(data, target) {
            if (target == "") {
                return;
            }
            let datosFilas = {
                '_token': "{{ csrf_token() }}",
                'bandera': 'Actualizar',
                'target': target,
                'datosModulo': data
            };

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                url: "{{ route('Modulos.update') }}",
                type: 'PATCH',
                data: JSON.stringify(datosFilas),
                success: function(response) {
                    window.location.reload();
                },
                error: function() {
                    window.location.reload();
                }
            });

        }

        function selectores(proceso, modalidad = "individual") {
            return new Promise((resolve, reject) => {
                if (proceso === 'modulos') {
                    datos_Submodulo.pop();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: '{{ route('Modulos.show', ':param') }}'.replace(':param', modalidad),
                        success: function(response) {
                            let datos = response.datos;
                            if (response.modalidad === "individual") {
                                $.each(datos, function(index, item) {
                                    $("select[name^='submodulo']").each(function() {
                                        // Se agregan solo las 'opciones' que no están cargadas en el selector.
                                        if (!$(this).find(`option[value='${item.id}']`)
                                            .length) {
                                            $(this).append(
                                                `<option value='${item.id}'>${item.submodulo}</option>`
                                            );
                                        }
                                    });
                                });
                            }

                            resolve(datos); // Resuelve la promesa con los datos
                        },
                        error: function(xhr, status, error) {
                            console.error('Error :', error);
                            reject(error); // Rechaza la promesa en caso de error
                        }
                    });

                } else if (proceso === 'rolesUsuario') {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        url: "{{ route('roles.selectores') }}",
                        dataType: 'json',
                        method: 'POST',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'bandera': 'roles',
                        },
                        success: function(response) {
                            $.each(response, function(index, item) {
                                $("select[name^='usuarioRoles']").each(function() {
                                    // Se agregan solo las 'opciones' que no están cargadas en el selector.
                                    if (!$(this).find(`option[value='${item.id}']`)
                                        .length) {
                                        $(this).append(
                                            `<option value='${item.id}'>${item.RoNombre}</option>`
                                        );
                                    }
                                });
                            });
                            resolve(response); // Resuelve la promesa con la respuesta
                        },
                        error: function(xhr, status, error) {
                            console.error('Error :', error);
                            reject(error); // Rechaza la promesa en caso de error
                        }
                    });
                } else {
                    reject(new Error('Proceso no válido')); // Rechaza si el proceso no es válido
                }
            });
        }


        function eliminar(id) {
            if (confirm('¿Esta seguro de eliminar el registro?')) {
                let datos = {
                    'bandera': 'eliminar',
                    'id': id
                };
                console.log('bee');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: "{{ route('Modulos.delete') }}",
                    method: 'DELETE',
                    data: datos,
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function() {
                        window.location.reload();
                    }
                });
            }
        }

        let idsUtilizados = [];

        function agregarNuevoModulo(MiTabla) {
            let Tabla = $("#modulos-table tbody");
            let contador = 0;
            $("#nuevo_modulo").click(function() {
                // $(".editar, .eliminar").attr("disabled", true);
                contador++;
                // Agregar el ID utilizado al registro
                idsUtilizados.push(contador);

                const nuevaFila = $(`<tr id='f_${contador}'>
                <td></td>
                <td><select class="form-select submodulo" id="submodulo_${contador}" name='submodulo_${contador}'>
                    <option selected>Seleccionar</option>
                    <option value="general">General</option>
                </select></td>
                <td><select class="form-select modulo_${contador}" id="modulo_${contador}" name='modulo_${contador}'></select></td>
                <td><select class="form-select usuarioRoles" id="usuarioRoles" name='usuarioRoles_${contador}'>
                    <option selected>Seleccionar</option>
                </select></td>
                <td class='d-flex'>
                    <div class='d-flex flex-column justify-content-evenly'>
                        <div class="form-check form-switch ms-3">
                            <input class="form-check-input" name='r_${contador}' type="checkbox" id="read">
                            <label class="form-check-label" for="read">Visualizar</label>
                        </div>
                        <div class="form-check form-switch ms-3">
                            <input class="form-check-input" name='u_${contador}' type="checkbox" id="Update">
                            <label class="form-check-label" for="Update">Actualizar</label>
                        </div>
                    </div>
                    <div class='d-flex flex-column justify-content-evenly'>
                        <div class="form-check form-switch ms-3">
                            <input class="form-check-input" name='d_${contador}' type="checkbox" id="Delete">
                            <label class="form-check-label" for="Delete">Eliminar</label>
                        </div>
                        <div class="form-check form-switch ms-3">
                            <input class="form-check-input" name='c_${contador}' type="checkbox" id="Create">
                            <label class="form-check-label" for="Create">Crear</label>
                        </div>
                    </div>
                    <div class='d-flex flex-column justify-content-evenly'>
                        <div class="form-check form-switch ms-3">
                            <input class="form-check-input" name='g_${contador}' type="checkbox" id="general">
                            <label class="form-check-label" for="general">Crear</label>
                        </div>
                    </div>
                </td>
                <td></td>
                <td>
                <div class='btn-group'> 
                    <button class='btn btn-outline-danger btn-sm eliminar_field' data-id='${contador}'>
                        <i class="far fa-trash-alt"></i>
                    </button>
                    </div>
                </td></tr>`);

                $("#btn_guardar").removeClass('d-none');

                MiTabla.row.add($(nuevaFila)).draw();
                selectores('modulos').then(datos => {
                    datos_Submodulo[0] = datos;
                });
                selectores('rolesUsuario');

            });


        }
    </script>
@endsection
