<!-- Dpasociado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DpAsociado', 'Codigo Asociado:') !!}
    {!! Form::select('DpAsociado',$asociados, null, ['class' => 'form-control']) !!}
</div>

<!-- Dpdrogueria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DpDrogueria', 'Drogueria:') !!}
    {!! Form::select('DpDrogueria',$droguerias, null, ['class' => 'form-control']) !!}
</div>

<!-- Dppersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DpPersona', 'Identificacion Persona:') !!}
    {!! Form::select('DpPersona',$personas ,null, ['class' => 'form-control']) !!}
</div>

<!-- Dpestadopersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DpEstadoPersona', 'Estado Persona:') !!}
    {!! Form::select('DpEstadoPersona', $estadospersonas,null, ['class' => 'form-control']) !!}
</div>

<!-- Dptipoasociado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('DpTipoAsociado', 'Relacion Drogueria:') !!}
    {!! Form::select('DpTipoAsociado', $tiposasociados,null, ['class' => 'form-control']) !!}
</div>