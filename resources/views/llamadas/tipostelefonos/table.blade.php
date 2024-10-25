<div class="table-responsive">
    <table class="table" id="tipostelefonos-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tipo de Telefono</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tipostelefonos as $tipostelefono)
                <tr>
                    <td>{{ $tipostelefono->id }}</td>
                    <td>{{ $tipostelefono->TtTipo }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['tipostelefonos.destroy', $tipostelefono->id], 'method' => 'delete']) !!}
                        {!! $incluir_botones['editar'] !!}
                        {!! $incluir_botones['eliminar'] !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
