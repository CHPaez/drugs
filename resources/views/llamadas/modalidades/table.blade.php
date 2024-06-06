<div class="table-responsive">
    <table class="table" id="modalidades-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Monombre</th>
            <th colspan="3">Action</th>
        </tr>
       
        </thead>
              <tbody>
            
       @foreach($modalidades as $modalidade)
       
            <tr>
                <td>{{ $modalidade->Id }}</td>
            <td>{{ $modalidade->MoNombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['modalidades.destroy', $modalidade->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('modalidades.show', [$modalidade->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('modalidades.edit', [$modalidade->Id]) }}"
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
