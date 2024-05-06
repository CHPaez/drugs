<!-- HlUsuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('HlUsuario', 'Hlusuario:') !!}
    {!! Form::number('HlUsuario', $userId, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
</div>

<!-- HlFechaRegistro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('HlFechaRegistro', 'Fecha de Registro:') !!}
    {!! Form::datetimeLocal('HlFechaRegistro', \Carbon\Carbon::now()->timezone('-0500')->format('Y-m-d\TH:i'), ['class' => 'form-control']) !!}
</div>
