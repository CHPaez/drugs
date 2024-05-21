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
                           class='btn btn-outline-primary btn-sm'>
                           <i class="far fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('tiposdroguerias.edit', [$tiposdrogueria->Id]) }}"
                           class='btn btn-outline-success btn-sm'>
                           <i class="far fa-edit"></i> Editar
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>Eliminar', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
