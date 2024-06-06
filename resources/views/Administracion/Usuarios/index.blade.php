@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h3>Administracion de usuarios</h3>
                    <a class="btn btn-primary float-right m-1"
                       href="{{route('Administracion.create')}}">
                        Agregar
                    </a>
                </div>  
            </div>
        </div>
    </section>
<br>
    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

            @include('Administracion.Usuarios.table')

        </div>
    </div>

@endsection

