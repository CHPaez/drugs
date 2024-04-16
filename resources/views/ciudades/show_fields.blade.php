<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $ciudades->Id }}</p>
</div>

<!-- Ciudepartamento Field -->
<div class="col-sm-12">
    {!! Form::label('CiuDepartamento', 'Ciudepartamento:') !!}
    <p>{{ $ciudades->CiuDepartamento }}</p>
</div>

<!-- Ciuciudad Field -->
<div class="col-sm-12">
    {!! Form::label('CiuCiudad', 'Ciuciudad:') !!}
    <p>{{ $ciudades->CiuCiudad }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $ciudades->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $ciudades->updated_at }}</p>
</div>

