@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tipificacionllamadas</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('tipificacionllamadas.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection

