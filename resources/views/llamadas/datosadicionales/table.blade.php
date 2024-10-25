<div class="table-responsive">
    <table class="table" id="datosadicionales-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Datos Adicionales</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosadicionales as $datosadicionale)
                <tr>
                    <td>{{ $datosadicionale->Id }}</td>
                    <td>{{ $datosadicionale->DaNombre }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['datosadicionales.destroy', $datosadicionale->Id], 'method' => 'delete']) !!}
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
