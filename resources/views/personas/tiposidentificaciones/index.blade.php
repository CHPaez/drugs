@extends('/layouts/header')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tiposidentificaciones</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('tiposidentificaciones.create') }}">
                    Agregar
                </a>
            </div>
        </div>
    </div>
</section>
<br>
<div class="content">

    @include('flash::message')

    <div class="clearfix"></div>


    @include('personas.tiposidentificaciones.table')
</div>

@endsection