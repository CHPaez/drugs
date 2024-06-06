<div class="table-responsive">
    <table class="table" id="indicativosciudades-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Icciudad</th>
        <th>Icindicativo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($indicativosciudades as $indicativosciudade)
            <tr>
                <td>{{ $indicativosciudade->id }}</td>
            <td>{{ $indicativosciudade->ciudades->CiuCiudad }}</td>
            <td>{{ $indicativosciudade->IcIndicativo }}</td>
            <td width="120">
                {!! Form::open(['route' => ['indicativosciudades.destroy', $indicativosciudade->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('indicativosciudades.show', [$indicativosciudade->id]) }}"
                       class='btn btn-primary btn-sm mr-1'>
                        <i class="far fa-eye">Ver</i>
                    </a>
                    <a href="{{ route('indicativosciudades.edit', [$indicativosciudade->id]) }}"
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
