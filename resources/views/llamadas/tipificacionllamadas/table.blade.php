<div class="table-responsive">
    <table class="table" id="tipificacionllamadas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Tluser</th>
        <th>Tlcodigoasociado</th>
        <th>Tldrogueria</th>
        <th>Tlpersonacontacto</th>
        <th>Tltelefonocontacto</th>
        <th>Tltelefonowhatsapp</th>
        <th>Tlprograma</th>
        <th>Tlcausal</th>
        <th>Tlestadotipificacion</th>
        <th>Tiobservaciones</th>
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
            <td>{{ $tipificacionllamadas->TlPersonaContacto }}</td>
            <td>{{ $tipificacionllamadas->TlTelefonoContacto }}</td>
            <td>{{ $tipificacionllamadas->TlTelefonoWhatsapp }}</td>
            <td>{{ $tipificacionllamadas->TlPrograma }}</td>
            <td>{{ $tipificacionllamadas->TlCausal }}</td>
            <td>{{ $tipificacionllamadas->TlEstadoTipificacion }}</td>
            <td>{{ $tipificacionllamadas->TIObservaciones }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['tipificacionllamadas.destroy', $tipificacionllamadas->Id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tipificacionllamadas.show', [$tipificacionllamadas->Id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('tipificacionllamadas.edit', [$tipificacionllamadas->Id]) }}"
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
