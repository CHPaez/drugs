<!-- Drtipodrogueria Field -->
<div class="form-group col-sm-4">
    {!! Form::label('DrTipoDrogueria', 'Tipo:') !!}
    {!! Form::select('DrTipoDrogueria',$tiposdroguerias, null, ['class' => 'form-control']) !!}
</div>

<!-- Drcodigo Field -->
<div class="form-group col-sm-4">
    {!! Form::label('DrCodigo', 'Codigo:') !!}
    {!! Form::number('DrCodigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Drnombre Field -->
<div class="form-group col-sm-4">
    {!! Form::label('DrNombre', 'Nombre:') !!}
    {!! Form::text('DrNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Drtipoidentificacion Field -->
<div class="form-group col-sm-4">
    {!! Form::label('DrTipoIdentificacion', 'Tipo de indentificacion:') !!}
    {!! Form::select('DrTipoIdentificacion',$tiposidentificaciones, null, ['class' => 'form-control']) !!}
</div>

<!-- Dridentificacion Field -->
<div class="form-group col-sm-4">
    {!! Form::label('DrIdentificacion', 'Identificacion:') !!}
    {!! Form::number('DrIdentificacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Drciudad Field -->
<div class="form-group col-sm-4">
    {!! Form::label('DrCiudad', 'Drciudad:') !!}
    {!! Form::select('DrCiudad',$ciudades ,null, ['class' => 'form-control']) !!}
</div>

<!-- Drdireccion Field -->
<div class="form-group col-sm-4">
    {!! Form::label('DrDireccion', 'Drdireccion:') !!}
    {!! Form::text('DrDireccion', null, ['class' => 'form-control']) !!}
</div>