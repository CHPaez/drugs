@extends('/layouts/header')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex">
                <h3>Modulos</h3>
                <a class="btn btn-primary float-right m-1" id='nuevo_modulo'>
                    Agregar
                </a>
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
let contador = 0;

$(document).ready(function() {
    $("#nuevo_modulo").click(function() {
        contador += 1;
        let MiTabla = $("#modulos-table tbody");
        
        // Crear fila para el nuevo módulo
        let nuevaFila = $("<tr></tr>");

        // Agregar celdas a la fila
        nuevaFila.append(`<td>${contador}</td>`);
        //Modulo
        nuevaFila.append(`<td><input type="text" class="form-control" id="modulo_${contador}" placeholder="Nombre del módulo" required></td>`);
        //Asignar
        nuevaFila.append(`<td><select class="form-select" id="Rol_${contador}">
                            <option selected>Seleccionar</option>
                            <option value="1">Administrador</option>
                            <option value="2">Coordinador</option>
                            <option value="3">Gerente</option>
                        </select></td>`);
        //Permisos
        nuevaFila.append(`<div class="d-flex justify-content-center"><td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="read_${contador}">
                                <label class="d-flex align-items-center me-2" for="read_${contador}">Visualizar</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="Update_${contador}">
                                <label class="d-flex align-items-center me-2" for="Update_${contador}">Actualizar</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="Delete_${contador}">
                                <label class="d-flex align-items-center me-2" for="Delete_${contador}">Eliminar</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="Create_${contador}">
                                <label class="d-flex align-items-center me-2" for="Create_${contador}">Crear</label>
                            </div>
                        </td></div>`);

        // Agregar la nueva fila a la tabla
        MiTabla.append(nuevaFila);
        if(contador > 0){
            $("#btn_guardar").removeClass('d-none');
        }else{
            $("#btn_guardar").addClass('d-none');
        }

    });
});


</script>
$stop
@endsection