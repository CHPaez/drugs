<div class="table-responsive">
    <table class="table" id="tiposdroguerias-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Tdnombre</th>
            <th colspan="3">Accciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tiposdroguerias as $tiposdrogueria)
            <tr>
                <td>{{ $tiposdrogueria->Id }}</td>
                <td>{{ $tiposdrogueria->TdNombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tiposdroguerias.destroy', $tiposdrogueria->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tiposdroguerias.show', [$tiposdrogueria->Id]) }}"
                           class='btn btn-primary btn-sm mr-1'>
                            <i class="far fa-eye">Ver</i>
                        </a>
                        <a href="{{ route('tiposdroguerias.edit', [$tiposdrogueria->Id]) }}"
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
