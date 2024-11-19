@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h4>Relacion Drogueria</h4>
                    {!! $incluir_botones['crear'] !!}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>


                @include('asociados.tiposasociados.table')


    </div>

    @stop
    @section('js')

    <script>
        $("#c_tiposasociados").click(function(){
            let link = `{{route('tiposasociados.create')}}`; 
            document.location.href = link;
        })

        $("#tiposasociados-table #editar").click(function(){
            let id_tel = $(this).closest('tr').find('td:first-child').text();
            let link = `{{route('tiposasociados.edit', ':id')}}`.replace(':id', id_tel);
            
            document.location.href = link;
        });

    </script>

@endsection
