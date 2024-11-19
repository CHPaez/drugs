@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Tiposidentificaciones</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'tiposidentificaciones.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('personas.tiposidentificaciones.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! $incluir_botones['guardar'] !!}
                <a href="{{ route('tiposidentificaciones.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection