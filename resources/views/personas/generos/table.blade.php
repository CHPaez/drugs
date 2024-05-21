<div class="table-responsive">
    <table class="table" id="generos-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($generos as $genero)
            <tr>
                <td>{{ $genero->id }}</td>
                <td>{{ $genero->GeNombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['generos.destroy', $genero->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('generos.show', [$genero->id]) }}"
                            class="btn btn-outline-primary btn-sm">
                            <i class="far fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('generos.edit', [$genero->id]) }}"
                            class="btn btn-outline-success btn-sm">
                            <i class="far fa-edit"></i> Editar
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm', 'onclick' => "return confirm('Estas seguro de eliminarlo?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
