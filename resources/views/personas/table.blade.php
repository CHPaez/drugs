<div style="overflow-x: auto;">
<table class="table" >
                    <thead>
                        <tr>
                            <th>Id</th>
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
                            <td>{{ $persona->TiposIdentificaciones->TiNombre }}</td>
                            <td>{{ $persona->PeNumeroIdentificacion }}</td>
                            <td>{{ $persona->Genero->GeNombre }}</td>
                            <td>{{ $persona->PeNombre }}</td>
                            <td>{{ $persona->PeApellido }}</td>
                            <td>{{ $persona->PeCorreo }}</td>
                            <td width="120">
                                {!! Form::open(['route' => ['personas.destroy', $persona->Id], 'method' => 'delete']) !!}
                                <div class='btn-group btn-group-sm'>
                                    <a href="{{ route('personas.show', [$persona->Id]) }}" class='btn btn-outline-primary btn-sm'>
                                    <i class="far fa-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('personas.edit', [$persona->Id]) }}" class='btn btn-outline-success btn-sm'>
                                    <i class="far fa-edit"></i> Editar
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>Eliminar', ['type' => 'submit', 'class' => 'btn btn-outline-danger btn-sm', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

</div>
</div>