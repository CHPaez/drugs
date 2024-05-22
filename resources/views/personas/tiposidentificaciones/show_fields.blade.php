<!-- Tiid Field -->
<div class="col-sm-12">
    {!! Form::label('Tiid', 'Tiid:') !!}
    <p>{{ $tiposidentificaciones->id }}</p>
</div>

<!-- Tinombre Field -->
<div class="col-sm-12">
    {!! Form::label('TiNombre', 'Tinombre:') !!}
    <p>{{ $tiposidentificaciones->TiNombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tiposidentificaciones->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tiposidentificaciones->updated_at }}</p>
</div>

