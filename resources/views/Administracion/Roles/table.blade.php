<div class="table-responsive">
<div class="col-12 alert alert-warning p-3">
    <i class="mdi mdi-information-outline"></i> <strong>Importante:</strong> No debe haber mas de un rol con el mismo nombre.
</div>
    <form id="NuevoRol" method="post">
        <table class="table" id="roles-table" action="{{route('Roles.store')}} method='POST'">
            @csrf
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion del rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($roles as $rol)
                <tr id="f_field_{{$rol->id}}">
                    <td>{{$rol->id}}</td>
                    <td><input type="text" class="form-control" name="nombre" value="{{$rol->RoNombre}}"  disabled></td>
                    <td>
                    <div class="form-floating">
                        <textarea class="form-control"  id="descripcion_${contador}" name="descripcion" disabled>{{$rol->RoDescripcion}}</textarea>
                        <label for="descripcion">Descripción del rol</label>
                    </div>    
                    <td width="120">
                        <div class='btn-group'>
                            {!! $incluir_botones["editar"] !!}
                            {!! $incluir_botones["eliminar"] !!}
                            {!! $incluir_botones["actualizar"] !!}
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $incluir_botones["guardar"] !!}
    </form>
</div>