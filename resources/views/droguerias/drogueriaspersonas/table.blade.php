<div class="table-responsive">
    <table class="table" id="drogueriaspersonas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Dpasociado</th>
        <th>Dpdrogueria</th>
        <th>Dppersona</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($drogueriaspersonas as $drogueriaspersona)
            <tr>
                <td>{{ $drogueriaspersona->Id }}</td>
            <td>{{ $drogueriaspersona->DpAsociado }}</td>
            <td>{{ $drogueriaspersona->DpDrogueria }}</td>
            <td>{{ $drogueriaspersona->DpPersona }}</td>
            <td width="120">
                {!! Form::open(['route' => ['drogueriaspersonas.destroy', $drogueriaspersona->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('drogueriaspersonas.show', [$drogueriaspersona->Id]) }}"
                       class='btn btn-primary btn-sm mr-1'>
                        <i class="far fa-eye">Ver</i>
                    </a>
                    <a href="{{ route('drogueriaspersonas.edit', [$drogueriaspersona->Id]) }}"
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
