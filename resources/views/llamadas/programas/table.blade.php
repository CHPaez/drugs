<div class="table-responsive">
    <table class="table" id="programas-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Prnombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
      @foreach($programas as $programa)
            <tr>
                <td>{{ $programa->Id }}</td>
            <td>{{ $programa->PrNombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['programas.destroy', $programa->Id], 'method' => 'delete']) !!}
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
