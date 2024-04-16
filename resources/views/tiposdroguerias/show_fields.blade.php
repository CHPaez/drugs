<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $tiposdroguerias->Id }}</p>
</div>

<!-- Tdnombre Field -->
<div class="col-sm-12">
    {!! Form::label('TdNombre', 'Tdnombre:') !!}
    <p>{{ $tiposdroguerias->TdNombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tiposdroguerias->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tiposdroguerias->updated_at }}</p>
</div>

