@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1>Personas</h1>
                    {!! $incluir_botones['crear'] !!}
                </div>

            </div>
        </div>
    </section>
<br>
    <!-- Persona Asociada Field -->
        @include('flash::message')

        <div class="clearfix"></div>

                @include('personas.table')

    </div>

    @stop
    @section('js')
    
    <script>
        $("#crear").click(function(){
            let link = `{{route('personas.create')}}`; 
            document.location.href = link;
        })
    
        $("#personas-table #editar").click(function(){
            let id_tel = $(this).closest('tr').find('td:first-child').text();
            let link = `{{route('personas.edit', ':id')}}`.replace(':id', id_tel);
            
            document.location.href = link;
        });
    
    </script>

@endsection

