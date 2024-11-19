@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3>Asociar Personas con Droguerias</h3>
                    {!! $incluir_botones['crear'] !!}
                </div>
            </div>
        </div>
    </section>
<br>
    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

                @include('droguerias.drogueriaspersonas.table')

    </div>
    @stop
    @section('js')

    <script>
        $("#crear").click(function(){
            let link = `{{route('drogueriaspersonas.create')}}`; 
            document.location.href = link;
        })

        $("#drogueriaspersonas-table #editar").click(function(){
            let id_tel = $(this).closest('tr').find('td:first-child').text();
            let link = `{{route('drogueriaspersonas.edit', ':id')}}`.replace(':id', id_tel);
            
            document.location.href = link;
        });

    </script>
@endsection

