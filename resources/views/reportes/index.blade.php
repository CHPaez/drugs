@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h5>Administrar reportes</h5>
                    {!! $incluir_botones['crear'] !!}
                </div>

            </div>
        </div>
    </section>
    <br>
    <!-- Persona Asociada Field -->
    @include('flash::message')

    <div class="clearfix"></div>
    <div class="card">
        <div class="card-body p-0">
            @include('reportes.table')
        </div>
    </div>
    </div>
    @include('Modals.configurarReportes')
@stop
@section('js')

    <script>
        $(document).ready(function() {
            $("#dataCollection").on('change', function() {
                if ($(this).val() != "") {
                    let datos = {
                        "_token": "{{ csrf_token() }}",
                        "coleccion": $(this).val(),
                        "accion": "obtener_columnas"
                    }

                    $.post("{{ route('reportes.selectores.show') }}", datos, function(response) {
                        $("#columnas_coleccion").empty();
                        console.log('res ', response)
                        $.each(response, function(index, item) {
                            console.log(item);
                            $("#columnas_coleccion").append(
                                `<option value='${item}'>${item}</option>`);
                        });

                    })

                }
            });

            // Evento cuando se hace click en el botón de "Agregar filtro"
            $("#add_filtro").on('click', function(e) {
                e.preventDefault(); // Evitar el comportamiento por defecto del botón

                // Obtener los valores seleccionados
                let coleccion = $("#dataCollection").val();
                let columna = $("#columnas_coleccion").val();
                let tipoFiltro = $("#t_filtros").val();

                if (coleccion && columna && tipoFiltro) {
                    // Crear una nueva fila de filtros
                    let nuevaFila = `
                        <div class="d-flex align-items-center mb-2" style="border-bottom: 1px solid #ddd; padding-bottom: 5px;">
                        <span style="flex-grow: 1;">${columna}_${tipoFiltro}</span>
                            <button class="remove-filtro" style="border: none; background-color: transparent; color: #000; font-size: 16px; cursor: pointer;">
                                <i class="fa-solid fa-minus"></i>
                            </button>
                        <input type="hidden" name="t_filtros[]" value="${columna}_${tipoFiltro}">
                        </div>`;

                    // Añadir la fila al contenedor de filtros
                    $("#filtros_container").append(nuevaFila);

                } else {
                    alert('Por favor, selecciona todos los campos.');
                }
            });

            // Eliminar la fila del filtro
            $(document).on('click', '.remove-filtro', function() {
                $(this).closest('div').remove(); // Elimina el div que contiene el filtro
            });


            // Evento para eliminar una fila de filtro
            $(document).on('click', '.remove-filtro', function() {
                $(this).closest('.filtro-item').remove();
            });

            $("#btn_configurar").click(function(){
                $("#guardar_reporte").val("Actualizar");
                $("#cofigurarReportes").show();
            });
        });
    </script>

@endsection
