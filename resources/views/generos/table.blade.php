<div class="table-responsive">
    <table class="table" id="generos-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Genombre</th>
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
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('generos.edit', [$genero->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
