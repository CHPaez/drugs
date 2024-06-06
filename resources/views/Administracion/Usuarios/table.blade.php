<div class="table-responsive">
    <table class="table" id="usuarios-table">
        <thead>
        <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Fecha Creacion</th>
        <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->created_at}}</td>
                    <td width="120">
                    <div class='btn-group'>
                        <a href="{{ route('Administracion.edit', [$usuario->id]) }}"
                           class='btn btn-outline-success btn-sm'>
                           <i class="far fa-edit"></i> Editar
                        </a>
                    </div>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
