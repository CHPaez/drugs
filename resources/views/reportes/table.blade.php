<div style="overflow:auto;">
    <form id="NuevoModulo" method="post" action="{{ route('Modulos.store') }}">
        @csrf
        <table class="table table-hover " id="modulos-table" width="100%" style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Reporte</th>
                    <th>Coleccion de datos</th>
                    <th>Tipo de reporte</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if (!$reportes->isEmpty())
                    @foreach ($reportes as $reporte)
                        <tr id="f_field_">
                            <td>{{ $reporte->ReId }}</td>
                            <td>{{ $reporte->ReNombre }}</td>
                            <td>{{ $reporte->ReDataCollection }}</td>
                            <td>{{ $reporte->ReFiltro }}</td>
                            <td width="120">
                                <div class='btn-group'>
                                    {!! Form::open(['route' => ['reportes.destroy', $reporte->ReId], 'method' => 'delete']) !!}
                                        {!! $incluir_botones['eliminar'] !!}
                                        {!! $incluir_botones['ejecutar'] !!}
                                        {!! $incluir_botones['configurar'] !!}
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td colspan="5" class="text-center">Sin reportes para mostrar</td>
                @endif
            </tbody>
        </table>
    </form>
</div>
