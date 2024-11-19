<div class="table-responsive">
    <table class="table" id="ciudades-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Ciudepartamento</th>
        <th>Ciuciudad</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ciudades as $ciudades)
            <tr>
                <td>{{ $ciudades->Id }}</td>
            <td>{{ $ciudades->CiuDepartamento }}</td>
            <td>{{ $ciudades->CiuCiudad }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['ciudades.destroy', $ciudades->id], 'method' => 'delete']) !!}
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
