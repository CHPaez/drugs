<div class="table-responsive">
    <table class="table" id="paises-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Panombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paises as $paise)
            <tr>
                <td>{{ $paise->Id }}</td>
            <td>{{ $paise->PaNombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['paises.destroy', $paise->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('paises.show', [$paise->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('paises.edit', [$paise->id]) }}"
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
