@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h4>Tipos de Telefonos</h4>
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
                @include('llamadas.tipostelefonos.table')
            </div>
        </div>
    </div>

    @stop
    @section('js')

    <script>
        $("#nuevo_telefono").click(function(){
            let link = `{{route('tipostelefonos.create')}}`; 
            document.location.href = link;
        })

        $("#tipostelefonos-table #editar_t_tel").click(function(){
            let id_tel = $(this).closest('tr').find('td:first-child').text();
            let link = `{{route('tipostelefonos.edit', ':id')}}`.replace(':id', id_tel);
            
            document.location.href = link;
        });

    </script>
@endsection

