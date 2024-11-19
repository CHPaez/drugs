<div class="table-responsive">
    <table class="table" id="paises-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paises as $paise)
                <tr>
                    <td>{{ $paise->id }}</td>
                    <td>{{ $paise->PaNombre }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['paises.destroy', $paise->id], 'method' => 'delete']) !!}
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
