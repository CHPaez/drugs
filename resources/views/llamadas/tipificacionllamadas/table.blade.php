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
                {!! Form::open(['route' => ['tipificacionllamadas.destroy', $tipificacionllamadas->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('tipificacionllamadas.show', [$tipificacionllamadas->Id]) }}"
                       class='btn btn-primary btn-sm mr-1'>
                        <i class="far fa-eye">Ver</i>
                    </a>
                    <a href="{{ route('tipificacionllamadas.edit', [$tipificacionllamadas->Id]) }}"
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
