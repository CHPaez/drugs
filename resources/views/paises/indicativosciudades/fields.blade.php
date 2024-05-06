<!-- Icciudad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('IcCiudad', 'Icciudad:') !!}
    {!! Form::select('IcCiudad',$ciudades, null, ['class' => 'form-control']) !!}
</div> 

<!-- Icindicativo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('IcIndicativo', 'Icindicativo:') !!}
    {!! Form::number('IcIndicativo', null, ['class' => 'form-control']) !!}
</div>