<!-- Dpasociado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DpAsociado', 'Dpasociado:') !!}
    {!! Form::select('DpAsociado',$asociados, null, ['class' => 'form-control']) !!}
</div>

<!-- Dpdrogueria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DpDrogueria', 'Dpdrogueria:') !!}
    {!! Form::select('DpDrogueria',$droguerias, null, ['class' => 'form-control']) !!}
</div>

<!-- Dppersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DpPersona', 'Dppersona:') !!}
    {!! Form::select('DpPersona',$personas ,null, ['class' => 'form-control']) !!}
</div>