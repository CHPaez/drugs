<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $modalidade->Id }}</p>
</div>

<!-- Monombre Field -->
<div class="col-sm-12">
    {!! Form::label('MoNombre', 'Monombre:') !!}
    <p>{{ $modalidade->MoNombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $modalidade->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $modalidade->updated_at }}</p>
</div>

