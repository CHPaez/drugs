<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
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
                                    {!! Form::button('<i class="far fa-trash-alt"></i> Eliminar', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs mr-1', 'onclick' => "return confirm('¿Estás seguro?')"]) !!}
                                </div>
                                
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </header>
        <main></main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

