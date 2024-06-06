<div class="table-responsive">
    <table class="table" id="telefonopersonas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Tepersona</th>
        <th>Tetipo</th>
        <th>Teindicativo</th>
        <th>Tetelefono</th>
            <th colspan="3">Action</th>
        </tr>
        </thead> 
        <tbody>
        @foreach($telefonopersonas as $telefonopersona)
            <tr>
                <td>{{ $telefonopersona->id }}</td>
            <td>{{ $telefonopersona->TePersona }}</td>
            <td>{{ $telefonopersona->TeTipo }}</td>
            <td>{{ $telefonopersona->TeIndicativo }}</td>
            <td>{{ $telefonopersona->TeTelefono }}</td>
            <td width="120">
                {!! Form::open(['route' => ['telefonopersonas.destroy', $telefonopersona->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('telefonopersonas.show', [$telefonopersona->id]) }}"
                       class='btn btn-outline-primary btn-sm'>
                       <i class="far fa-eye"></i> Ver
                    </a>
                    <a href="{{ route('telefonopersonas.edit', [$telefonopersona->id]) }}"
                       class='btn btn-outline-success btn-sm'>
                       <i class="far fa-edit"></i> Editar
                    </a>
                    {!! Form::button('<i class="far fa-trash-alt"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
