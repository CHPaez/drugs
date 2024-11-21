@extends('/layouts/header')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h4>Programas</h4>
                    {!! $incluir_botones['crear'] !!}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('llamadas.programas.table')
            </div>

        </div>
    </div>
    @stop
    @section('js')

    <script>
        $("#crear").click(function(){
            let link = `{{route('programas.create')}}`; 
            document.location.href = link;
        })

        $("#programas-table #editar").click(function(){
            let id_tel = $(this).closest('tr').find('td:first-child').text();
            let link = `{{route('programas.edit', ':id')}}`.replace(':id', id_tel);
            
            document.location.href = link;
        });

    </script>

@endsection

