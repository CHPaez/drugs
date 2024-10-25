<div class="table-responsive">
    <table class="table" id="estadostipificacions-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Etnombre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estadostipificacions as $estadostipificacion)
                <tr>
                    <td>{{ $estadostipificacion->Id }}</td>
                    <td>{{ $estadostipificacion->EtNombre }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['estadostipificacions.destroy', $estadostipificacion->Id], 'method' => 'delete']) !!}
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
