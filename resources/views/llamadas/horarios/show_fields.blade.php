<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $horarios->Id }}</p>
</div>

<!-- Honombre Field -->
<div class="col-sm-12">
    {!! Form::label('HoNombre', 'Honombre:') !!}
    <p>{{ $horarios->HoNombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $horarios->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $horarios->updated_at }}</p>
</div>

