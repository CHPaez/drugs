<div class="table-responsive">
    <table class="table" id="ciudades-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Ciudepartamento</th>
        <th>Ciuciudad</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ciudades as $ciudades)
            <tr>
                <td>{{ $ciudades->Id }}</td>
            <td>{{ $ciudades->CiuDepartamento }}</td>
            <td>{{ $ciudades->CiuCiudad }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ciudades.destroy', $ciudades->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ciudades.show', [$ciudades->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('ciudades.edit', [$ciudades->id]) }}"
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
