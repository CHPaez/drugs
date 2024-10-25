@extends('/layouts/header')
@section('content')
@if (session('warning'))
    <div class="alert alert-warning">
        {!! session('warning') !!}
    </div>
@endif
@endsection
