@extends('/layouts/header')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tiposidentificaciones</h1>
                {!! $incluir_botones['crear'] !!}
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
@stop
@section('js')

<script>
    $("#crear").click(function(){
        let link = `{{route('tiposidentificaciones.create')}}`; 
        document.location.href = link;
    })

    $("#tiposidentificaciones-table #editar").click(function(){
        let id_tel = $(this).closest('tr').find('td:first-child').text();
        console.log("id_tel: ", id_tel);
        let link = `{{route('tiposidentificaciones.edit', ':id')}}`.replace(':id', id_tel);
        
        document.location.href = link;
    });

</script>
@endsection