<div class="table-responsive">

<div class="col-12 alert alert-warning p-3">
    <i class="mdi mdi-information-outline"></i> <strong>Importante:</strong> Un usuario no puede tener un rol repitido.
</div>
    {!! Form::open(['route' => ['user.roles.store'], 'method' => 'POST', 'id' => 'NuevoRol']) !!}
        <table class="table" id="roles-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Rol</th>
                    <th>Usuario asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($roles as $rol)
                <tr id="f_field_{{$rol['id']}}">
                    <td>{{$rol['id']}}</td>
                    <td>
                        <select class="form-select" name="rol_{{$rol['id']}}" id="rol_{{$rol['id']}}" disabled>
                            <option value="{{$rol['Roles_id']}}" selected>{{$rol['rol_name']}}</option>
                        </select>
                    <td>
                        <select class="form-select" name="user_{{$rol['id']}}" id="user_{{$rol['id']}}"  disabled>
                            <option value="{{$rol['Users_id']}}" selected>{{$rol['user_name']}}</option>
                        </select>
                    </td>
                    <td width="120">
                        <div class='btn-group'>
                            {!! $incluir_botones["editar"] !!}
                            {!! $incluir_botones["eliminar"] !!}
                            {!! $incluir_botones["actualizar"] !!}
                        </div>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center"><span>No hay datos para mostrar</span></td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {!! $incluir_botones['guardar'] !!}

    {!! Form::close() !!}
</div>