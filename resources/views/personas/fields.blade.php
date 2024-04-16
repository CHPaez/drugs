<!-- Petipoasociado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PeTipoAsociado', 'Tipo Asociado:') !!}
    {!! Form::select('PeTipoAsociado',$tiposAsociados ,null, ['class' => 'form-control']) !!}
</div>

<!-- Petipoasociado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PeEstadoPersona', 'Tipo Estado:') !!}
    {!! Form::select('PeEstadoPersona',$estadospersonas ,null, ['class' => 'form-control']) !!}
</div>

<!-- Petipoidentificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PeTipoIdentificacion', 'Tipo de identificacion:') !!}
    {!! Form::select('PeTipoIdentificacion',$tiposIdentificaciones, null, ['class' => 'form-control']) !!}
</div>

<!-- Penumeroidentificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PeNumeroIdentificacion', 'Numero de indentificacion:') !!}
    {!! Form::number('PeNumeroIdentificacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Pegenero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PeGenero', 'Genero:') !!}
    {!! Form::select('PeGenero',$generos, null, ['class' => 'form-control']) !!}
</div>

<!-- Penombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PeNombre', 'Nombre:') !!}
    {!! Form::text('PeNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Peapellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PeApellido', 'Apelldo:') !!}
    {!! Form::text('PeApellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Pecorreo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PeCorreo', 'Correo:') !!}
    {!! Form::email('PeCorreo', null, ['class' => 'form-control']) !!}
</div>


