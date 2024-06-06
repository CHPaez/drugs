<div class="table-responsive">
    <table class="table" id="programas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Prnombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
      @foreach($programas as $programa)
            <tr>
                <td>{{ $programa->Id }}</td>
            <td>{{ $programa->PrNombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['programas.destroy', $programa->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('programas.show', [$programa->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('programas.edit', [$programa->Id]) }}"
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
