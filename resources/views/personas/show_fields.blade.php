<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $persona->Id }}</p>
</div>

<!-- Petipoasociado Field -->
<div class="col-sm-12">
    {!! Form::label('PeTipoAsociado', 'Petipoasociado:') !!}
    <p>{{ $persona->PeTipoAsociado }}</p>
</div>

<!-- Petipoidentificacion Field -->
<div class="col-sm-12">
    {!! Form::label('PeTipoIdentificacion', 'Petipoidentificacion:') !!}
    <p>{{ $persona->PeTipoIdentificacion }}</p>
</div>

<!-- Penumeroidentificacion Field -->
<div class="col-sm-12">
    {!! Form::label('PeNumeroIdentificacion', 'Penumeroidentificacion:') !!}
    <p>{{ $persona->PeNumeroIdentificacion }}</p>
</div>

<!-- Pegenero Field -->
<div class="col-sm-12">
    {!! Form::label('PeGenero', 'Pegenero:') !!}
    <p>{{ $persona->PeGenero }}</p>
</div>

<!-- Penombre Field -->
<div class="col-sm-12">
    {!! Form::label('PeNombre', 'Penombre:') !!}
    <p>{{ $persona->PeNombre }}</p>
</div>

<!-- Peapellido Field -->
<div class="col-sm-12">
    {!! Form::label('PeApellido', 'Peapellido:') !!}
    <p>{{ $persona->PeApellido }}</p>
</div>

<!-- Pecorreo Field -->
<div class="col-sm-12">
    {!! Form::label('PeCorreo', 'Pecorreo:') !!}
    <p>{{ $personas->PeCorreo }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $persona->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $persona->updated_at }}</p>
</div>

