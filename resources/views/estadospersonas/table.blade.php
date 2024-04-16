<div class="table-responsive">
    <table class="table" id="estadospersonas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Esestado</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($estadospersonas as $estadospersona)
            <tr>
                <td>{{ $estadospersona->Id }}</td>
            <td>{{ $estadospersona->EsEstado }}</td>
                <td width="120">
                   
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
