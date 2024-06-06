
{{ Form::hidden('invisible', $usuario->id) }}
<div class="form-group col-sm-6">
{!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', $usuario->name, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', $usuario->email,    ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('creacion', 'Fecha de creacion:') !!}
    {!! Form::text('creacion', $usuario->created_at, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
</div>
@if(Route::is('Administracion.create'))

@endif