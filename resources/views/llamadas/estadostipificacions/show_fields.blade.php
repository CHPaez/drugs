<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $estadostipificacion->Id }}</p>
</div>

<!-- Etnombre Field -->
<div class="col-sm-12">
    {!! Form::label('EtNombre', 'Etnombre:') !!}
    <p>{{ $estadostipificacion->EtNombre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $estadostipificacion->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $estadostipificacion->updated_at }}</p>
</div>

