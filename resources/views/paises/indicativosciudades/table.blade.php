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
        @foreach($indicativosciudades as $indicativosciudades)
            <tr>
                <td>{{ $indicativosciudades->Id }}</td>
            <td>{{ $indicativosciudades->ciudades->CiuCiudad }}</td>
            <td>{{ $indicativosciudades->IcIndicativo }}</td>
            <td width="120">
                {!! Form::open(['route' => ['indicativosciudades.destroy', $indicativosciudades->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('indicativosciudades.show', [$indicativosciudades->Id]) }}"
                       class='btn btn-primary btn-sm mr-1'>
                        <i class="far fa-eye">Ver</i>
                    </a>
                    <a href="{{ route('indicativosciudades.edit', [$indicativosciudades->Id]) }}"
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
