<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $programas->Id }}</p>
</div>

<!-- Prnombre Field -->
<div class="col-sm-12">
    {!! Form::label('PrNombre', 'Prnombre:') !!}
    <p>{{ $programas->PrNombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $programas->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $programas->updated_at }}</p>
</div>

