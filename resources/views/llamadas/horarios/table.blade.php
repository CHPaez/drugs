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
        @foreach($horarios as $horario)
            <tr>
                <td>{{ $horario->Id }}</td>
            <td>{{ $horario->HoNombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['horarios.destroy', $horario->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('horarios.show', [$horario->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('horarios.edit', [$horario->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
