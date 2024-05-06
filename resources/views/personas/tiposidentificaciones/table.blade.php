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
                    <a href="{{ route('tiposidentificaciones.show', [$tiposidentificacione->id]) }}"
                       class='btn btn-primary btn-sm mr-1'>
                        <i class="far fa-eye">Ver</i>
                    </a>
                    <a href="{{ route('tiposidentificaciones.edit', [$tiposidentificacione->id]) }}"
                       class='btn btn-success btn-sm mr-1'>
                        <i class="far fa-edit">Editar</i>
                    </a>
                    {!! Form::button('<i class="far fa-trash-alt"></i>Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm mr-1', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
