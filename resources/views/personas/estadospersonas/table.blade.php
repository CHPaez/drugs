<div class="table-responsive">
    <table class="table" id="estadospersonas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Esestado</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($estadospersonas as $estadospersona)
            <tr>
                <td>{{ $estadospersona->Id }}</td>
                <td>{{ $estadospersona->EsEstado }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['estadospersonas.destroy', $estadospersona->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('estadospersonas.show', [$estadospersona->Id]) }}"
                           class='btn btn-outline-primary btn-sm'>
                            <i class="far fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('estadospersonas.edit', [$estadospersona->Id]) }}"
                           class='btn btn-outline-success btn-sm'>
                            <i class="far fa-edit"></i> Editar
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
