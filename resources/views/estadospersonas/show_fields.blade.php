<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $estadospersonas->Id }}</p>
</div>

<!-- Esestado Field -->
<div class="col-sm-12">
    {!! Form::label('EsEstado', 'Esestado:') !!}
    <p>{{ $estadospersonas->EsEstado }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $estadospersonas->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $estadospersonas->updated_at }}</p>
</div>

