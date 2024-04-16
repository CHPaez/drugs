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
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
