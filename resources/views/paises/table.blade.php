<div class="table-responsive">
    <table class="table" id="paises-table">
        <thead>
        <tr>
            <th>Id</th>
        <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paises as $paise)
            <tr>
                <td>{{ $paise->id }}</td>
            <td>{{ $paise->PaNombre }}</td>
            <td width="120">
                {!! Form::open(['route' => ['paises.destroy', $paise->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('paises.show', [$paise->id]) }}"
                       class='btn btn-primary btn-sm mr-1'>
                        <i class="far fa-eye">Ver</i>
                    </a>
                    <a href="{{ route('paises.edit', [$paise->id]) }}"
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
