<div class="table-responsive">
                <table class="table" id="tiposasociados-table">
                    <thead>
                    <tr>
                        <th>Taid</th>
                    <th>Tanombre</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tiposasociados as $tiposasociado)
                        <tr>
                            <td>{{ $tiposasociado->id }}</td>
                        <td>{{ $tiposasociado->TaNombre }}</td>
                            <td width="120">
                                {!! Form::open(['route' => ['tiposasociados.destroy', $tiposasociado->id], 'method' => 'delete']) !!}
                                <div class="btn-group">
                                    <a href="{{ route('tiposasociados.show', [$tiposasociado->id]) }}" class="btn btn-primary btn-sm mr-1">
                                        <i class="far fa-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('tiposasociados.edit', [$tiposasociado->id]) }}" class="btn btn-success btn-sm mr-1">
                                        <i class="far fa-edit"></i> Editar
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs mr-1', 'onclick' => "return confirm('�Est�s seguro?')"]) !!}
                                </div>
                                
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
</div>