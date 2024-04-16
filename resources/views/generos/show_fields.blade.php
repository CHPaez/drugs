<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $genero->id }}</p>
</div>

<!-- Genombre Field -->
<div class="col-sm-12">
    {!! Form::label('GeNombre', 'Genombre:') !!}
    <p>{{ $genero->GeNombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $genero->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $genero->updated_at }}</p>
</div>

