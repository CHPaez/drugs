@extends('layouts.header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h3>Agregar un nuevo modulo/h3>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'Administracion.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('Administracion.Usuarios.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Guardar', ['class' => 'btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
