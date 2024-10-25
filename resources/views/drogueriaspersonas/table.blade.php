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
                    {!! $incluir_botones['editar'] !!}
                    {!! $incluir_botones['eliminar'] !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
