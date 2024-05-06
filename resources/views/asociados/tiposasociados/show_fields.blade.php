<!-- Taid Field -->
<div class="col-sm-12">
    {!! Form::label('Taid', 'Taid:') !!}
    <p>{{ $tiposasociados->id }}</p>
</div>

<!-- Tanombre Field -->
<div class="col-sm-12">
    {!! Form::label('TaNombre', 'Tanombre:') !!}
    <p>{{ $tiposasociados->TaNombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $tiposasociados->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $tiposasociados->updated_at }}</p>
</div>

