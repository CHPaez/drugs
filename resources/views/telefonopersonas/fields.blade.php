<!-- Tepersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TePersona', 'Tepersona:') !!}
    {!! Form::select('TePersona',$personas ,null, ['class' => 'form-control']) !!}
</div>

<!-- Tetipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TeTipo', 'Tetipo:') !!}
    {!! Form::select('TeTipo', $tipostelefonos,null, ['class' => 'form-control']) !!}
</div>

<!-- Teindicativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TeIndicativo', 'Teindicativo:') !!}
    {!! Form::select('TeIndicativo', $indicativosciudades ,null, ['class' => 'form-control']) !!}
</div>

<!-- Tetelefono Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TeTelefono', 'Tetelefono:') !!}
    {!! Form::number('TeTelefono', null, ['class' => 'form-control']) !!}
</div>