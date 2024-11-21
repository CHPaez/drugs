<div style="overflow-x: auto;">
<table class="table" id="personas-table" >
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
</div>