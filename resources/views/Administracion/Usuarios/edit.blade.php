@extends('layouts.header')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h3>Edicion de usuarios</h3>
            </div>
        </div>
    </div>
</section>
<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::model($usuario, ['route' => ['Administracion.update', $usuario->id], 'method' => 'patch']) !!}

        <div class="card-body">
            <div class="row">
                @include('Administracion.Usuarios.show_fields')
            </div>
        </div>

        <div class="card-footer">
            {!! $incluir_botones['actualizar'] !!}
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection