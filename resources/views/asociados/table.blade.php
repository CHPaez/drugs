<div class="table-responsive">
    <table class="table" id="asociados-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Ascodigo</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($asociados as $asociado)
            <tr>
                <td>{{ $asociado->id }}</td>
                <td>{{ $asociado->AsCodigo }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['asociados.destroy', $asociado->id], 'method' => 'delete']) !!}
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
