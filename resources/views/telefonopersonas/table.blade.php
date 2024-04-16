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
        @foreach($telefonopersonas as $telefonopersonas)
            <tr>
                <td>{{ $telefonopersonas->Id }}</td>
            <td>{{ $telefonopersonas->TePersona }}</td>
            <td>{{ $telefonopersonas->TeTipo }}</td>
            <td>{{ $telefonopersonas->TeIndicativo }}</td>
            <td>{{ $telefonopersonas->TeTelefono }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['telefonopersonas.destroy', $telefonopersonas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('telefonopersonas.show', [$telefonopersonas->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('telefonopersonas.edit', [$telefonopersonas->id]) }}"
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
