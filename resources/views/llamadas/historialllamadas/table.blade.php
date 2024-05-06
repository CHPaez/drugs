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
                {!! Form::open(['route' => ['historialllamadas.destroy', $historialllamadas->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('historialllamadas.show', [$historialllamadas->Id]) }}"
                       class='btn btn-primary btn-sm mr-1'>
                        <i class="far fa-eye">Ver</i>
                    </a>
                    <a href="{{ route('historialllamadas.edit', [$historialllamadas->Id]) }}"
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
