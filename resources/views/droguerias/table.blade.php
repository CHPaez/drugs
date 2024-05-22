<div class="table-responsive">
    <table class="table" id="droguerias-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Tipo Drogueria</th>
        <th>Codigo Drogueria</th>
        <th>Nombre</th>
        <th>Tipo Identificacion</th>
        <th>Numero Indetificacion</th>
        <th>Ciudad</th>
        <th>Direccion</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($droguerias as $drogueria)
            <tr>
                <td>{{ $drogueria->Id }}</td>
            <td>{{ $drogueria->tiposdroguerias->TdNombre }}</td>
            <td>{{ $drogueria->DrCodigo }}</td>
            <td>{{ $drogueria->DrNombre }}</td>
            <td>{{ $drogueria->TiposIdentificaciones->TiNombre }}</td>
            <td>{{ $drogueria->DrIdentificacion }}</td>
            <td>{{ $drogueria->Ciudades->CiuCiudad }}</td>
            <td>{{ $drogueria->DrDireccion }}</td>
            <td width="120">
                {!! Form::open(['route' => ['droguerias.destroy', $drogueria->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('droguerias.show', [$drogueria->Id]) }}"
                       class='btn btn-outline-primary btn-sm'>
                       <i class="far fa-eye"></i> Ver
                    </a>
                    <a href="{{ route('droguerias.edit', [$drogueria->Id]) }}"
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
