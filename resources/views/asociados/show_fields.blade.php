<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $asociados->Id }}</p>
</div>

<!-- Ascodigo Field -->
<div class="col-sm-12">
    {!! Form::label('AsCodigo', 'Ascodigo:') !!}
    <p>{{ $asociados->AsCodigo }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $asociados->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $asociados->updated_at }}</p>
</div>

