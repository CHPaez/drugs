@extends('/layouts/header')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4>Crear Horarios</h4>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'horarios.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('llamadas.horarios.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! $incluir_botones['guardar'] !!}
                <a href="{{ route('horarios.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
