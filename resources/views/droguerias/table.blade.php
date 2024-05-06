<div class="table-responsive">
    <table class="table" id="droguerias-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Drtipodrogueria</th>
        <th>Drcodigo</th>
        <th>Drnombre</th>
        <th>Drtipoidentificacion</th>
        <th>Dridentificacion</th>
        <th>Drciudad</th>
        <th>Drdireccion</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($droguerias as $drogueria)
            <tr>
                <td>{{ $drogueria->Id }}</td>
            <td>{{ $drogueria->DrTipoDrogueria }}</td>
            <td>{{ $drogueria->DrCodigo }}</td>
            <td>{{ $drogueria->DrNombre }}</td>
            <td>{{ $drogueria->DrTipoIdentificacion }}</td>
            <td>{{ $drogueria->DrIdentificacion }}</td>
            <td>{{ $drogueria->DrCiudad }}</td>
            <td>{{ $drogueria->DrDireccion }}</td>
            <td width="120">
                {!! Form::open(['route' => ['droguerias.destroy', $drogueria->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('droguerias.show', [$drogueria->Id]) }}"
                       class='btn btn-primary btn-sm mr-1'>
                        <i class="far fa-eye">Ver</i>
                    </a>
                    <a href="{{ route('droguerias.edit', [$drogueria->Id]) }}"
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
