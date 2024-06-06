<div class="table-responsive">
    <table class="table" id="drogueriaspersonas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Codigo Asociado</th>
        <th>Drogueria</th>
        <th>Persona</th>
        <th>Estado persona</th>
        <th>Relacion Drogueria</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($drogueriaspersonas as $drogueriaspersona)
            <tr>
                <td>{{ $drogueriaspersona->Id }}</td>
            <td>{{ $drogueriaspersona->asociados->AsCodigo }}</td>
            <td>{{ $drogueriaspersona->droguerias->DrNombre }}</td>
            <td>{{ $drogueriaspersona->personas->PeNombre }}</td>
            <td>{{ $drogueriaspersona->estadospersonas->EsEstado }}</td>
            <td>{{ $drogueriaspersona->tiposasociados->TaNombre }}</td>
            <td width="120">
                {!! Form::open(['route' => ['drogueriaspersonas.destroy', $drogueriaspersona->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('drogueriaspersonas.show', [$drogueriaspersona->Id]) }}"
                       class='btn btn-outline-primary btn-sm'>
                       <i class="far fa-eye"></i> Ver
                    </a>
                    <a href="{{ route('drogueriaspersonas.edit', [$drogueriaspersona->Id]) }}"
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
