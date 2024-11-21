<div class="table-responsive">
    <table class="table" id="causales-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Catipificacion</th>
                <th>Canombre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($causales as $causale)
                <tr>
                    <td>{{ $causale->Id }}</td>
                    <td>{{ $causale->CaTipificacion }}</td>
                    <td>{{ $causale->CaNombre }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['causales.destroy', $causale->Id], 'method' => 'delete']) !!}
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
