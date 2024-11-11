<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 

<!-- Tluser Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlUser', 'Usuario') !!}
    {!! Form::select('TlUser', $users, $authenticatedUser->id, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
    {!! Form::hidden('TlUser', $authenticatedUser->id) !!}
</div>


<!-- Tlcodigoasociado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlCodigoAsociado', 'Codigo Asociado:') !!}
    {!! Form::select('TlCodigoAsociado', ['' => ''] + $asociados->toArray(), null, ['class' => 'form-control', 'id' => 'codigo-asociado']) !!}
</div>
 
<!-- Tldrogueria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlDrogueria', 'Drogueria:') !!}
    {!! Form::select('TlDrogueria', ['' => ''] + \App\Models\Droguerias::pluck('DrNombre', 'id')->toArray(), null, ['class' => 'form-control', 'id' => 'TlDrogueria']) !!}
</div>

<!-- Tlpersonacontacto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlPersonaContacto', 'Persona:') !!}
    {!! Form::select('TlPersonaContacto', ['' => ''] + \App\Models\Personas::pluck('PeNombre', 'id')->toArray(), null, ['class' => 'form-control', 'id' => 'TlPersona']) !!}
</div>


<!-- Tltelefonocontacto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlTelefonoContacto', 'Telefono de Contacto:') !!}
    {!! Form::number('TlTelefonoContacto', null, ['class' => 'form-control']) !!}
</div>

<!-- Tltelefonowhatsapp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlTelefonoWhatsapp', 'Tltelefonowhatsapp:') !!}
    {!! Form::number('TlTelefonoWhatsapp', null, ['class' => 'form-control']) !!}
</div>

<!-- Tlprograma Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlPrograma', 'Programa:') !!}
    {!! Form::select('TlPrograma', ['' => ''] + \App\Models\Programas::pluck('PrNombre', 'id')->toArray(), null, ['class' => 'form-control', 'id' => 'TlPrograma']) !!}
</div>

<!-- Tlestadotipificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlEstadoTipificacion', 'Estado Tipificacion:') !!}
    {!! Form::number('TlEstadoTipificacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Tlcausal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TlCausal', 'Causal Tipificacion:') !!}
    {!! Form::number('TlCausal', null, ['class' => 'form-control']) !!}
</div>

<!-- Tiobservaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TIObservaciones', 'Observaciones Contacto:') !!}
    {!! Form::text('TIObservaciones', null, ['class' => 'form-control']) !!}
</div>

<script>
$(document).ready(function() {
    $('#codigo-asociado').on('change', function() {
        actualizarDroguerias('DpAsociado', $(this).val(), '#TlDrogueria', 'DpDrogueria', 'DrNombre');
        actualizarPersonas('DpAsociado', $(this).val(), '#TlPersona', 'DpDrogueria', 'DpPersona', 'PeNombre', 'PeApellido');
    });

    $('#TlDrogueria').on('change', function() {
        actualizarPersonas('DpDrogueria', $(this).val(), '#TlPersona', 'DpDrogueria', 'DpPersona', 'PeNombre', 'PeApellido');
    });

    $('#TlPersona').on('change', function() {
        actualizarTelefonos('DpPersona', $(this).val(), '#TlTelefono', 'TePersona', 'TeTelefono');
    });
});

$(document).ready(function() {
    $('#codigo-asociado').on('change', function() {
        actualizarDroguerias('DpAsociado', $(this).val(), '#TlDrogueria', 'DpDrogueria', 'DrNombre');
        actualizarPersonas('DpAsociado', $(this).val(), '#TlPersona', 'DpDrogueria', 'DpPersona', 'PeNombre', 'PeApellido');
    });

    $('#TlDrogueria').on('change', function() {
        actualizarPersonas('DpDrogueria', $(this).val(), '#TlPersona', 'DpDrogueria', 'DpPersona', 'PeNombre', 'PeApellido');
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

function actualizarPersonas(campoFiltro, valorFiltro, selector, campoRelacion, campoValor, campoTexto1, campoTexto2) {
    $(selector).empty();

    var datosRelacionados = <?php echo json_encode($drogueriaspersonas); ?>;
    var datos = <?php echo $personasJson; ?>;

    actualizarOpcionesPersonas(campoFiltro, valorFiltro, selector, campoRelacion, campoValor, campoTexto1, campoTexto2, datosRelacionados, datos);
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

function actualizarOpcionesPersonas(campoFiltro, valorFiltro, selector, campoRelacion, campoValor, campoTexto1, campoTexto2, datosRelacionados, datos) {
    var opcionesAgregadas = new Set();
    datosRelacionados.forEach(function(relacion) {
        if (relacion[campoFiltro] == valorFiltro && !opcionesAgregadas.has(relacion[campoValor])) {
            opcionesAgregadas.add(relacion[campoValor]);
            var objeto = datos.find(function(item) {
                return item.Id === relacion[campoValor];
            });
            if (objeto) {
                var textoCompleto = objeto[campoTexto1] + ' ' + objeto[campoTexto2];
                $(selector).append($('<option>', {
                    value: objeto.Id,
                    text: textoCompleto
                }));
            }
        }
    });
}
</script>
