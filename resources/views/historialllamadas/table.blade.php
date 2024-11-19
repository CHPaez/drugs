<div class="table-responsive">
    <table class="table" id="historialllamadas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Hlusuario</th>
        <th>Hlfecharegistro</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($historialllamadas as $historialllamadas)
            <tr>
                <td>{{ $historialllamadas->Id }}</td>
            <td>{{ $historialllamadas->HlUsuario }}</td>
            <td>{{ $historialllamadas->HlFechaRegistro }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['historialllamadas.destroy', $historialllamadas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! $incluir_botones['editar'] !!}
                        {!! $incluir_botones['eliminiar'] !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
