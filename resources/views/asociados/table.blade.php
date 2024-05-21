<div class="table-responsive">
    <table class="table" id="asociados-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Ascodigo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($asociados as $asociado)
            <tr>
                <td>{{ $asociado->id }}</td>
                <td>{{ $asociado->AsCodigo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['asociados.destroy', $asociado->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('asociados.show', [$asociado->id]) }}"
                           class='btn btn-outline-primary btn-sm'>
                           <i class="far fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('asociados.edit', [$asociado->id]) }}"
                           class='btn btn-outline-success btn-sm'>
                           <i class="far fa-edit"></i> Editar
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>Eliminar', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
