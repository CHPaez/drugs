<div style="overflow:auto;">
    <form id="NuevoModulo" method="post" action="{{route('Modulos.store')}}">
        @csrf
        <table class="table table-hover " id="modulos-table" width="100%" style="width: 100%;">
            <thead>
                <tr >
                    <th>Id</th>
                    <th>SubModulo</th>
                    <th>Modulo</th>
                    <th>Asignado</th>
                    <th>Permisos</th>
                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles_permisos as $modulo)
                <tr id="f_field_{{$modulo->id}}">
                    <td>{{$modulo->id}}</td>
                    <td>
                        <select class="form-select submodulo" id="submodulo_{{$modulo->id}}" name='submodulo_{{$modulo->id}}' require disabled>
                            <option value="{{$modulo->Modulos_id}}" selected>{{$modulo->submodulo}}</option>
                            <option value="general">General</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-select modulo_{{$modulo->Modulos_id}}" id="modulo_{{$modulo->id}}" name='modulo_{{$modulo->id}}' require disabled>
                            <option  value="{{$modulo->id}}" selected>{{$modulo->modulo}}</option>
                        </select>
                    </td>
                    <td><select class="form-select usuarioRoles_{{$modulo->id}}" id="usuarioRoles_{{$modulo->id}}" name='usuarioRoles_{{$modulo->id}}' require  disabled>
                            <option value="{{$modulo->Roles_id}}" selected>{{$modulo->rol}}</option>
                        </select>
                    </td>
                    <td class='d-flex'>
                        <div class='d-flex flex-column justify-content-evenly'>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" name='r' type="checkbox" id="read_{{$modulo->id}}" {{ $modulo->Read ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="read_{{$modulo->id}}">Visualizar</label>
                            </div>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" name='u' type="checkbox" id="Update_{{$modulo->id}}" {{ $modulo->Update ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="Update_{{$modulo->id}}">Actualizar</label>
                            </div>
                        </div>
                        <div class='d-flex flex-column justify-content-evenly'>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" name='d' type="checkbox" id="Delete_{{$modulo->id}}" {{ $modulo->Delete ? 'checked' : '' }}  disabled>
                                <label class="form-check-label" for="Delete_{{$modulo->id}}">Eliminar</label>
                            </div>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" name='c' type="checkbox" id="Create_{{$modulo->id}}" {{ $modulo->Create ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="Create_{{$modulo->id}}">Crear</label>
                            </div>
                        </div>
                        <div class='d-flex flex-column justify-content-evenly'>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" name='g' type="checkbox" id="general_{{$modulo->id}}" {{ $modulo->Create ? 'checked' : '' }} disabled>
                                <label class="form-check-label" for="general_{{$modulo->id}}">Todos</label>
                            </div>
                        </div>
                    </td>
                    <td width="120">
                        <div class='btn-group'>
                            {!! $incluir_botones["editar"] !!}
                            {!! $incluir_botones["eliminar"] !!}
                            {!! $incluir_botones["actualizar"] !!}
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $incluir_botones["guardar"] !!}
        <button type="submit" class="btn btn-primary float-left d-none" id='btn_guardar'>Guardar</button>
    </form>
</div>