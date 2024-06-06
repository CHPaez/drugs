@extends('/layouts/header')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Estadostipificacion</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($estadostipificacion, ['route' => ['estadostipificacions.update', $estadostipificacion->Id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('llamadas.estadostipificacions.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('estadostipificacions.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
