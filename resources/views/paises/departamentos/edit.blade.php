@extends('layouts.header')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h4>Edit Departamentos</h4>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($departamentos, ['route' => ['departamentos.update', $departamentos->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('paises.departamentos.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! $incluir_botones['actualizar'] !!}
                <a href="{{ route('departamentos.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
