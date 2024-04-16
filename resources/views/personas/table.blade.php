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

    
                                  
                            </td>
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
