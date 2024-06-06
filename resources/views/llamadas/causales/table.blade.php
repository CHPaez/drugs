<div class="table-responsive">
    <table class="table" id="causales-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Catipificacion</th>
        <th>Canombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($causales as $causale)
            <tr>
                <td>{{ $causale->Id }}</td>
            <td>{{ $causale->CaTipificacion }}</td>
            <td>{{ $causale->CaNombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['causales.destroy', $causale->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('causales.show', [$causale->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('causales.edit', [$causale->Id]) }}"
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
