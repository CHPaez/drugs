<div class="table-responsive">
    <table class="table" id="tipificacionllamadas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Tluser</th>
        <th>Tlcodigoasociado</th>
        <th>Tldrogueria</th>
        <th>Tlpersona</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tipificacionllamadas as $tipificacionllamadas)
            <tr>
                <td>{{ $tipificacionllamadas->Id }}</td>
            <td>{{ $tipificacionllamadas->TlUser }}</td>
            <td>{{ $tipificacionllamadas->TlCodigoAsociado }}</td>
            <td>{{ $tipificacionllamadas->TlDrogueria }}</td>
            <td>{{ $tipificacionllamadas->TlPersona }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tipificacionllamadas.destroy', $tipificacionllamadas->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tipificacionllamadas.show', [$tipificacionllamadas->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tipificacionllamadas.edit', [$tipificacionllamadas->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
