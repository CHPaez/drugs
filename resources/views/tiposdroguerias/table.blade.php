<div class="table-responsive">
    <table class="table" id="tiposdroguerias-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Tdnombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiposdroguerias as $tiposdrogueria)
            <tr>
                <td>{{ $tiposdrogueria->Id }}</td>
            <td>{{ $tiposdrogueria->TdNombre }}</td>
                <td width="120">
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
