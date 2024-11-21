@extends('/layouts/header')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h4>Administracion de usuarios</h4>
                    {!! $incluir_botones['crear'] !!}
                </div>  
            </div>
        </div>
    </section>
<br>
    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

            @include('Administracion.Usuarios.table')

        </div>
    </div>
    @stop
    @section('js')

    <script>
        $("#usuarios-table #editar_usuario").click(function(){
            let id_usuario = $(this).closest('tr').find('td:first-child').text();
            let link = `{{route('Administracion.edit', ':id')}}`.replace(':id', id_usuario);
            console.log(link,'a');
            
            document.location.href = link;
        })
    </script>

@endsection



