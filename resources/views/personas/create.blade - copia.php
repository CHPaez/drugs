<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #222; /* Fondo oscuro */
            color: #fff; /* Texto blanco */
            font-family: Arial, sans-serif; /* Fuente */
        }

        header {
            padding: 20px;
            background-color: #333; /* Encabezado oscuro */
        }

        h1 {
            color: #fff; /* Texto blanco */
        }

        .content {
            padding: 20px;
        }

        .card {
            background-color: #444; /* Tarjeta oscura */
            color: #fff; /* Texto blanco */
        }

        .card-header {
            background-color: #555; /* Encabezado de tarjeta oscuro */
        }

        .form-control {
            background-color: #555; /* Campo de formulario oscuro */
            color: #fff; /* Texto blanco */
        }

        .btn-primary {
            background-color: #007bff; /* Botón azul */
            border-color: #007bff; /* Borde del botón azul */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Botón azul oscuro al pasar el ratón */
            border-color: #0056b3; /* Borde del botón azul oscuro al pasar el ratón */
        }
    </style>
</head>
<body>

<header>
    <div class="container-fluid">
        <h1>Personas</h1>
    </div>
</header>

<main class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tipificar Persona</h3>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            {!! Form::open(['route' => 'personas.store', 'class' => 'row g-3']) !!}
                        
                            <div class="col-md-6">
                                {!! Form::label('PeTipoAsociado', 'Tipo de asociado', ['class' => 'form-label']) !!}
                                {!! Form::text('PeTipoAsociado', null, ['class' => 'form-control']) !!}
                            </div>
                        
                            <div class="col-md-6">
                                {!! Form::label('PeTipoIdentificacion', 'Tipo de identificacion', ['class' => 'form-label']) !!}
                                {!! Form::text('PeTipoIdentificacion', null, ['class' => 'form-control']) !!}
                            </div>
                        
                            <div class="col-md-6">
                                {!! Form::label('PeNumeroIdentificacion', 'Numero de identificacion', ['class' => 'form-label']) !!}
                                {!! Form::number('PeNumeroIdentificacion', null, ['class' => 'form-control']) !!}
                            </div>
                        
                            <div class="col-md-6">
                                {!! Form::label('PeGenero', 'Genero', ['class' => 'form-label']) !!}
                                {!! Form::text('PeGenero', null, ['class' => 'form-control']) !!}
                            </div>
                        
                            <div class="col-md-6">
                                {!! Form::label('PeNombre', 'Nombre', ['class' => 'form-label']) !!}
                                {!! Form::text('PeNombre', null, ['class' => 'form-control']) !!}
                            </div>
                        
                            <div class="col-md-6">
                                {!! Form::label('PeApellido', 'Apellido', ['class' => 'form-label']) !!}
                                {!! Form::text('PeApellido', null, ['class' => 'form-control']) !!}
                            </div>
                        
                            <div class="col-md-6">
                                {!! Form::label('PeCorreo', 'Correo', ['class' => 'form-label']) !!}
                                {!! Form::email('PeCorreo', null, ['class' => 'form-control']) !!}
                            </div>
                        
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                            
                            {!! Form::close() !!}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer>
    <!-- Pie de página aquí -->
</footer>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>


        