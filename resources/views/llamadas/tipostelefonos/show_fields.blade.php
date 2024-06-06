<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $tipostelefono->Id }}</p>
</div>

<!-- Tttipo Field -->
<div class="col-sm-12">
    {!! Form::label('TtTipo', 'Tttipo:') !!}
    <p>{{ $tipostelefono->TtTipo }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tipostelefono->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tipostelefono->updated_at }}</p>
</div>

