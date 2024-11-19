@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h3>Droguerias</h3>
                    {!! $incluir_botones['crear'] !!}
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
    @stop
    @section('js')
    
    <script>
        $("#crear").click(function(){
            let link = `{{route('droguerias.create')}}`; 
            document.location.href = link;
        })
    
        $("#droguerias-table #editar").click(function(){
            let id_tel = $(this).closest('tr').find('td:first-child').text();
            let link = `{{route('droguerias.edit', ':id')}}`.replace(':id', id_tel);
            
            document.location.href = link;
        });
    
    </script>
@endsection

