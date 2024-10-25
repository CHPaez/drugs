@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Indicativosciudades</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('indicativosciudades.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('indicativosciudades.table')
            </div>

        </div>
    </div>
    @stop
    @section('js')
    
    <script>
        $("#crear").click(function(){
            let link = `{{route('indicativosciudades.create')}}`; 
            document.location.href = link;
        })
    
        $("#indicativosciudades-table #editar").click(function(){
            let id_tel = $(this).closest('tr').find('td:first-child').text();
            let link = `{{route('indicativosciudades.edit', ':id')}}`.replace(':id', id_tel);
            
            document.location.href = link;
        });
    
    </script>
@endsection

