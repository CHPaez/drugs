<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- Tluser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlUser', 'Usuario Registro:') !!}
    {!! Form::number('TlUser', $userId,null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('TlCodigoAsociado', 'Codigo Asociado:') !!}
    {!! Form::select('TlCodigoAsociado', ['' => ''] + $asociados->toArray(), null, ['class' => 'form-control', 'id' => 'codigo-asociado']) !!}
</div>


<!-- TlDrogueria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlDrogueria', 'Drogueria:') !!}
    {!! Form::select('TlDrogueria', ['' => ''] + \App\Models\Droguerias::pluck('DrNombre', 'id')->toArray(), null, ['class' => 'form-control', 'id' => 'TlDrogueria']) !!}
</div>

<!-- TlPersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlPersona', 'Persona:') !!}
    {!! Form::select('TlPersona', ['' => ''] + \App\Models\Personas::pluck('PeNumeroIdentificacion', 'id')->toArray(), null, ['class' => 'form-control', 'id' => 'TlPersona']) !!}
</div>


<!-- Tlpersona Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PeTelefono', 'Telefono:') !!}
    {!! Form::select('PeTelefono', [], null, ['class' => 'form-control', 'id' => 'TlTelefono']) !!}
</div>

<script>
$(document).ready(function() {
    $('#codigo-asociado').on('change', function() {
        actualizarDroguerias('DpAsociado', $(this).val(), '#TlDrogueria', 'DpDrogueria', 'DrNombre');
        actualizarPersonas('DpAsociado', $(this).val(), '#TlPersona', 'DpDrogueria', 'DpPersona', 'PeNumeroIdentificacion');
    });

    $('#TlDrogueria').on('change', function() {
        actualizarPersonas('DpDrogueria', $(this).val(), '#TlPersona', 'DpDrogueria', 'DpPersona', 'PeNumeroIdentificacion');
    });

    $('#TlPersona').on('change', function() {
        actualizarTelefonos('DpPersona', $(this).val(), '#TlTelefono', 'TePersona', 'TeTelefono');
    });
});

function actualizarDroguerias(campoFiltro, valorFiltro, selector, campoValor, campoTexto) {
    $(selector).empty();

    var datosRelacionados = <?php echo json_encode($drogueriaspersonas); ?>;
    var datos = <?php echo $drogueriasJson; ?>;

    actualizarOpciones(campoFiltro, valorFiltro, selector, campoValor, campoTexto, datosRelacionados, datos);
}

function actualizarPersonas(campoFiltro, valorFiltro, selector, campoRelacion, campoValor, campoTexto) {
    $(selector).empty();

    var datosRelacionados = <?php echo json_encode($drogueriaspersonas); ?>;
    var datos = <?php echo $personasJson; ?>;

    actualizarOpciones(campoFiltro, valorFiltro, selector, campoValor, campoTexto, datosRelacionados, datos);
}


function actualizarTelefonos(campoFiltro, valorFiltro, selector, campoRelacion, campoTelefono) {
    $(selector).empty();

    var datosRelacionados = <?php echo json_encode($telefonopersonas); ?>;
    var telefonos = <?php echo $telefonopersonasJson; ?>;

    actualizarOpciones(campoFiltro, valorFiltro, selector, campoRelacion, campoTelefono, datosRelacionados, telefonos);
}

function actualizarOpciones(campoFiltro, valorFiltro, selector, campoValor, campoTexto, datosRelacionados, datos) {
    var opcionesAgregadas = new Set();
    datosRelacionados.forEach(function(relacion) {
        if (relacion[campoFiltro] == valorFiltro && !opcionesAgregadas.has(relacion[campoValor])) {
            opcionesAgregadas.add(relacion[campoValor]);
            var objeto = datos.find(function(item) {
                return item.Id === relacion[campoValor];
            });
            if (objeto) {
                $(selector).append($('<option>', {
                    value: objeto.Id,
                    text: objeto[campoTexto]
                }));
            }
        }
    });
}
</script>


