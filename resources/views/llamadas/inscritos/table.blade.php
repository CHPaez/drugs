<div class="table-responsive">
    <table class="table" id="inscritos-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Intipificacion</th>
        <th>Inpersonainscrita</th>
        <th>Infechaprograma</th>
        <th>Inhorario</th>
        <th>Inmodalidad</th>
        <th>Inciudad</th>
        <th>Indatosadicionales</th>
        <th>Inobservaciones</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inscritos as $inscritos)
            <tr>
                <td>{{ $inscritos->Id }}</td>
            <td>{{ $inscritos->InTipificacion }}</td>
            <td>{{ $inscritos->InPersonaInscrita }}</td>
            <td>{{ $inscritos->InFechaPrograma }}</td>
            <td>{{ $inscritos->InHorario }}</td>
            <td>{{ $inscritos->InModalidad }}</td>
            <td>{{ $inscritos->InCiudad }}</td>
            <td>{{ $inscritos->InDatosAdicionales }}</td>
            <td>{{ $inscritos->InObservaciones }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['inscritos.destroy', $inscritos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('inscritos.show', [$inscritos->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('inscritos.edit', [$inscritos->id]) }}"
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
