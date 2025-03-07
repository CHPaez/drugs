@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Inscritos</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($inscritos, ['route' => ['inscritos.update', $inscritos->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('inscritos.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! $incluir_botones['actualizar'] !!}
                <a href="{{ route('inscritos.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
