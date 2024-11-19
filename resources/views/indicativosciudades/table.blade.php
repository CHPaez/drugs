<div class="table-responsive">
    <table class="table" id="indicativosciudades-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Icciudad</th>
        <th>Icindicativo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($indicativosciudades as $indicativosciudades)
            <tr>
                <td>{{ $indicativosciudades->Id }}</td>
            <td>{{ $indicativosciudades->ciudades->CiuCiudad }}</td>
            <td>{{ $indicativosciudades->IcIndicativo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['indicativosciudades.destroy', $indicativosciudades->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! $incluir_botones['editar'] !!}
                        {!! $incluir_botones['eliminiar'] !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
