<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $drogueriaspersonas->Id }}</p>
</div>

<!-- Dpasociado Field -->
<div class="col-sm-12">
    {!! Form::label('DpAsociado', 'Codigo Asociado:') !!}
    <p>{{ $drogueriaspersonas->DpAsociado }}</p>
</div>

<!-- Dpdrogueria Field -->
<div class="col-sm-12">
    {!! Form::label('DpDrogueria', 'Drogueria:') !!}
    <p>{{ $drogueriaspersonas->DpDrogueria }}</p>
</div> 

<!-- Dppersona Field -->
<div class="col-sm-12">
    {!! Form::label('DpPersona', 'Persona:') !!}
    <p>{{ $drogueriaspersonas->DpPersona }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $drogueriaspersonas->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $drogueriaspersonas->updated_at }}</p>
</div>

