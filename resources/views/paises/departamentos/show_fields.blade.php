<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('Id', 'Id:') !!}
    <p>{{ $departamentos->Id }}</p>
</div>

<!-- Deppais Field -->
<div class="col-sm-12">
    {!! Form::label('DepPais', 'Deppais:') !!}
    <p>{{ $departamentos->DepPais }}</p>
</div>

<!-- Depdepartamento Field -->
<div class="col-sm-12">
    {!! Form::label('DepDepartamento', 'Depdepartamento:') !!}
    <p>{{ $departamentos->DepDepartamento }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $departamentos->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $departamentos->updated_at }}</p>
</div>

