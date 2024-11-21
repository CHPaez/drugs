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

            @foreach ($modalidades as $modalidade)
                <tr>
                    <td>{{ $modalidade->Id }}</td>
                    <td>{{ $modalidade->MoNombre }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['modalidades.destroy', $modalidade->Id], 'method' => 'delete']) !!}
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
