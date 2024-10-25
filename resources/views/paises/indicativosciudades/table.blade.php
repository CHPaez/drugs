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
            @foreach ($indicativosciudades as $indicativosciudade)
                <tr>
                    <td>{{ $indicativosciudade->id }}</td>
                    <td>{{ $indicativosciudade->ciudades->CiuCiudad }}</td>
                    <td>{{ $indicativosciudade->IcIndicativo }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['indicativosciudades.destroy', $indicativosciudade->id], 'method' => 'delete']) !!}
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
