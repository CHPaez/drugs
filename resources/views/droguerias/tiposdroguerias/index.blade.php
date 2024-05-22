@extends('/layouts/header')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Tipos droguerias</h3>
            </div>

                <div class="col-1">
                        <a class="btn btn-primary float-right" href="{{ route('tiposdroguerias.create') }}">
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


    @include('droguerias.tiposdroguerias.table')


</div>

@endsection