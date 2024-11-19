<div class="table-responsive">
    <table class="table" id="horarios-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Horario</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horarios as $horario)
                <tr>
                    <td>{{ $horario->Id }}</td>
                    <td>{{ $horario->HoNombre }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['horarios.destroy', $horario->Id], 'method' => 'delete']) !!}
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
