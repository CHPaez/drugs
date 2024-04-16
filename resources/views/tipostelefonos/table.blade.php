<div class="table-responsive">
    <table class="table" id="tipostelefonos-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Tttipo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tipostelefonos as $tipostelefonos)
            <tr>
                <td>{{ $tipostelefonos->Id }}</td>
            <td>{{ $tipostelefonos->TtTipo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tipostelefonos.destroy', $tipostelefonos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tipostelefonos.show', [$tipostelefonos->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tipostelefonos.edit', [$tipostelefonos->id]) }}"
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
