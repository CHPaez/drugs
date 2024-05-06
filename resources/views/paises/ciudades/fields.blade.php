<!-- Ciudepartamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CiuDepartamento', 'Departamento:') !!}
    {!! Form::select('CiuDepartamento',$departamentos, null, ['class' => 'form-control']) !!}
</div>

<!-- Ciuciudad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('CiuCiudad', 'Ciudad:') !!}
    {!! Form::text('CiuCiudad', null, ['class' => 'form-control']) !!}
</div>