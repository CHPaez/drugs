<div class="table-responsive">
    <table class="table" id="departamentos-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Pais</th>
                <th>Departamento</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->id }}</td>
                    <td>{{ $departamento->paises->PaNombre }}</td>
                    <td>{{ $departamento->DepDepartamento }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['departamentos.destroy', $departamento->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            {!! $incluir_botones['editar'] !!}
                            {!! $incluir_botones['eliminar'] !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
