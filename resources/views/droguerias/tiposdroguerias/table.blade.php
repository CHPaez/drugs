<div class="table-responsive">
    <table class="table" id="tiposdroguerias-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Tipos Droguerias</th>
            <th colspan="3">Accciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiposdroguerias as $tiposdrogueria)
            <tr>
                <td>{{ $tiposdrogueria->Id }}</td>
                <td>{{ $tiposdrogueria->TdNombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tiposdroguerias.destroy', $tiposdrogueria->Id], 'method' => 'delete']) !!}
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
