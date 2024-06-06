<div class="table-responsive">
    <table class="table" id="estadostipificacions-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Etnombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($estadostipificacions as $estadostipificacion)
            <tr>
                <td>{{ $estadostipificacion->Id }}</td>
            <td>{{ $estadostipificacion->EtNombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['estadostipificacions.destroy', $estadostipificacion->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('estadostipificacions.show', [$estadostipificacion->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('estadostipificacions.edit', [$estadostipificacion->Id]) }}"
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
