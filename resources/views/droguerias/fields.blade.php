<!-- Drtipodrogueria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DrTipoDrogueria', 'Drtipodrogueria:') !!}
    {!! Form::select('DrTipoDrogueria',$tiposdroguerias, null, ['class' => 'form-control']) !!}
</div>

<!-- Drcodigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DrCodigo', 'Drcodigo:') !!}
    {!! Form::number('DrCodigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Drnombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DrNombre', 'Drnombre:') !!}
    {!! Form::text('DrNombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Drtipoidentificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DrTipoIdentificacion', 'Drtipoidentificacion:') !!}
    {!! Form::select('DrTipoIdentificacion',$tiposidentificaciones, null, ['class' => 'form-control']) !!}
</div>

<!-- Dridentificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DrIdentificacion', 'Dridentificacion:') !!}
    {!! Form::number('DrIdentificacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Drciudad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DrCiudad', 'Drciudad:') !!}
    {!! Form::select('DrCiudad',$ciudades ,null, ['class' => 'form-control']) !!}
</div>

<!-- Drdireccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DrDireccion', 'Drdireccion:') !!}
    {!! Form::text('DrDireccion', null, ['class' => 'form-control']) !!}
</div>