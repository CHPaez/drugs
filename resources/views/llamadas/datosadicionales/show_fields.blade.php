<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $datosadicionales->Id }}</p>
</div>

<!-- Danombre Field -->
<div class="col-sm-12">
    {!! Form::label('DaNombre', 'Danombre:') !!}
    <p>{{ $datosadicionales->DaNombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $datosadicionales->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $datosadicionales->updated_at }}</p>
</div>

