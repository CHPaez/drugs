<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $paises->Id }}</p>
</div>

<!-- Panombre Field -->
<div class="col-sm-12">
    {!! Form::label('PaNombre', 'Panombre:') !!}
    <p>{{ $paises->PaNombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $paises->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $paises->updated_at }}</p>
</div>

