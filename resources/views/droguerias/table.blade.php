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
                    {!! $incluir_botones['editar'] !!}
                    {!! $incluir_botones['eliminar'] !!}
                </div>
                {!! Form::close() !!}
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
