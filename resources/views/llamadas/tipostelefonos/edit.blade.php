@extends('/layouts/header')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4>Edit Tipostelefonos</h4>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($tipostelefonos, ['route' => ['tipostelefonos.update', $tipostelefonos->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('llamadas.tipostelefonos.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! $incluir_botones['actualizar'] !!}
                <a href="{{ route('tipostelefonos.index') }}" class="btn btn-default">Cancelar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
