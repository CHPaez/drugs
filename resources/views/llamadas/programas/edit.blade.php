@extends('/layouts/header')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Programas</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($programas, ['route' => ['programas.update', $programas->Id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('llamadas.programas.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! $incluir_botones['actualizar'] !!}
                <a href="{{ route('programas.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
