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
                           class='btn btn-primary btn-sm mr-1'>
                            <i class="far fa-eye">Ver</i>
                        </a>
                        <a href="{{ route('estadospersonas.edit', [$estadospersona->Id]) }}"
                           class='btn btn-success btn-sm mr-1'>
                            <i class="far fa-edit">Editar</i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm mr-1', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
