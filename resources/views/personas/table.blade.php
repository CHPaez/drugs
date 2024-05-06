<div class="table-responsive">
    <table class="table" id="personas-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Estado Persona</th>
                <th>Tipo de asociado</th>
                <th>Tipo de identificacion</th>
                <th>Numero de indentificacion</th>
                <th>Genero</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $persona)
                <tr>
                    <td>{{ $persona->Id }}</td>
                    <td>{{ $persona->EstadosPersonas->EsEstado }}</td>
                    <td>{{ $persona->tiposasociados->TaNombre }}</td>
                    <td>{{ $persona->TiposIdentificaciones->TiNombre }}</td>
                    <td>{{ $persona->PeNumeroIdentificacion }}</td>
                    <td>{{ $persona->Genero->GeNombre }}</td>
                    <td>{{ $persona->PeNombre }}</td>
                    <td>{{ $persona->PeApellido }}</td>
                    <td>{{ $persona->PeCorreo }}</td>
                    <td width="120">
                        {!! Form::open(['route' => ['personas.destroy', $persona->Id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('personas.show', [$persona->Id]) }}"
                               class='btn btn-primary btn-sm mr-1'>
                                <i class="far fa-eye">Ver</i>
                            </a>
                            <a href="{{ route('personas.edit', [$persona->Id]) }}"
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