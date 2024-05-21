@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h3>Droguerias</h3>
                </div>  
                <div class="col-1">
                <a class="btn btn-primary float-right"
                       href="{{ route('droguerias.create') }}">
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

                @include('droguerias.table')

        </div>
    </div>

@endsection

