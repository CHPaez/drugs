<div class="table-responsive">
    <table class="table" id="departamentos-table">
        <thead>
        <tr>
            
        <th>Pais</th>
        <th>Departamento</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($departamentos as $departamento)
            <tr>
                
            <td>{{ $departamento->paises->PaNombre }}</td>
            <td>{{ $departamento->DepDepartamento }}</td> 
            <td width="120">
                {!! Form::open(['route' => ['departamentos.destroy', $departamento->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('departamentos.show', [$departamento->id]) }}"
                       class='btn btn-primary btn-sm mr-1'>
                        <i class="far fa-eye">Ver</i>
                    </a>
                    <a href="{{ route('departamentos.edit', [$departamento->id]) }}"
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
