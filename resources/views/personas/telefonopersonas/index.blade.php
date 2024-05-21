@extends('/layouts/header')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Telefonopersonas</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('telefonopersonas.create') }}">
                    Add New
                </a>
            </div>
        </div>
    </div>
</section>
<br>
<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    @include('telefonopersonas.table')


</div>

@endsection