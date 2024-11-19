@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4>Edit Tipificacionllamadas</h4>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($tipificacionllamadas, ['route' => ['tipificacionllamadas.update', $tipificacionllamadas->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('tipificacionllamadas.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! $incluir_botones['actualizar'] !!}
                <a href="{{ route('tipificacionllamadas.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
