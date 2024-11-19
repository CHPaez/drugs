<div class="table-responsive">
    <table class="table" id="telefonopersonas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Tepersona</th>
        <th>Tetipo</th>
        <th>Teindicativo</th>
        <th>Tetelefono</th>
            <th colspan="3">Action</th>
        </tr>
        </thead> 
        <tbody>
        @foreach($telefonopersonas as $telefonopersona)
            <tr>
                <td>{{ $telefonopersona->id }}</td>
            <td>{{ $telefonopersona->TePersona }}</td>
            <td>{{ $telefonopersona->TeTipo }}</td>
            <td>{{ $telefonopersona->TeIndicativo }}</td>
            <td>{{ $telefonopersona->TeTelefono }}</td>
            <td width="120">
                {!! Form::open(['route' => ['telefonopersonas.destroy', $telefonopersona->id], 'method' => 'delete']) !!}
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
