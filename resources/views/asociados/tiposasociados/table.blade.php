<div class="table-responsive">
    <table class="table" id="tiposasociados-table">
        <thead>
            <tr>
                <th>Taid</th>
                <th>Tanombre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tiposasociados as $tiposasociado)
                <tr>
                    <td>{{ $tiposasociado->id }}</td>
                    <td>{{ $tiposasociado->TaNombre }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['tiposasociados.destroy', $tiposasociado->id], 'method' => 'delete']) !!}
                        <div class="btn-group">
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
