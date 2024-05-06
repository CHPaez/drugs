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
                {!! Form::open(['route' => ['tipostelefonos.destroy', $tipostelefonos->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('tipostelefonos.show', [$tipostelefonos->Id]) }}"
                       class='btn btn-primary btn-sm mr-1'>
                        <i class="far fa-eye">Ver</i>
                    </a>
                    <a href="{{ route('tipostelefonos.edit', [$tipostelefonos->Id]) }}"
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
