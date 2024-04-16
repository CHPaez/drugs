<div class="table-responsive">
    <table class="table" id="asociados-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Ascodigo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($asociados as $asociado)
            <tr>
                <td>{{ $asociado->Id }}</td>
            <td>{{ $asociado->AsCodigo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['asociados.destroy', $asociado->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('asociados.show', [$asociado->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('asociados.edit', [$asociado->id]) }}"
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
