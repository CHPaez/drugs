<!-- Deppais Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DepPais', 'Pais:') !!}
    {!! Form::select('DepPais',$paises, null, ['class' => 'form-control']) !!}
</div>

<!-- Depdepartamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DepDepartamento', 'Depdepartamento:') !!}
    {!! Form::text('DepDepartamento', null, ['class' => 'form-control']) !!}
</div>