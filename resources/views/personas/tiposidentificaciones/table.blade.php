<div class="table-responsive">
    <table class="table" id="tiposidentificaciones-table">
        <thead>
        <tr>
            <th>Tiid</th>
        <th>Tinombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiposidentificaciones as $tiposidentificacione)
            <tr>
                <td>{{ $tiposidentificacione->id }}</td>
            <td>{{ $tiposidentificacione->TiNombre }}</td>
            <td width="120">
                {!! Form::open(['route' => ['tiposidentificaciones.destroy', $tiposidentificacione->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! $incluir_botones['editar'] !!}
                    {!! $incluir_botones['eliminar'] !!}
                </div>
                {!! Form::close() !!}
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
