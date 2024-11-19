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
                    {!! Form::open(['route' => ['estadospersonas.destroy', $estadospersona->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! $incluir_botones['editar'] !!}
                        {!! $incluir_botones['actualizar'] !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
