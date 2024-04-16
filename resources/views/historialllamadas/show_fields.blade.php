<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $historialllamadas->Id }}</p>
</div>

<!-- Hlusuario Field -->
<div class="col-sm-12">
    {!! Form::label('HlUsuario', 'Hlusuario:') !!}
    <p>{{ $historialllamadas->HlUsuario }}</p>
</div>

<!-- Hlfecharegistro Field -->
<div class="col-sm-12">
    {!! Form::label('HlFechaRegistro', 'Hlfecharegistro:') !!}
    <p>{{ $historialllamadas->HlFechaRegistro }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $historialllamadas->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $historialllamadas->updated_at }}</p>
</div>

