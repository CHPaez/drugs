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
                            class="btn btn-primary btn-sm mr-1">
                            Ver
                        </a>
                        <a href="{{ route('generos.edit', [$genero->id]) }}"
                            class="btn btn-success btn-sm mr-1">
                            Editar
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro de eliminarlo?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
