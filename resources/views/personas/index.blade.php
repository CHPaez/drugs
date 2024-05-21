@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1>Personas</h1>
                    <a class="btn btn-primary m-2"
                       href="{{ route('personas.create') }}">
                        Agregar
                    </a>
                </div>

            </div>
        </div>
    </section>
<br>
    <!-- Persona Asociada Field -->
        @include('flash::message')

        <div class="clearfix"></div>

                @include('personas.table')

    </div>

@endsection

