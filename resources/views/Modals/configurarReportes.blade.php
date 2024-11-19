<div class="modal fade" id="cofigurarReportes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">Configurar reporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
              {!! Form::open(['route' => ['reportes.store'], 'method' => 'POST']) !!}
                    <!-- Sección 1: Seleccionar colección de datos -->
                    <div class="row d-flex align-items-center">
                        <div class="col-3">
                            <label for="namereporte" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="namereporte" value="{{ $reporte[0]->ReDataCollection ?? "" }}">
                        </div>
                        <div class="col-3">
                            <label for="dataCollection" class="form-label">Coleccion de datos</label>
                            <select class="form-select" id="dataCollection" name="dataCollection">
                                <option value="{{ $reporte[0]->ReDataCollection ?? "" }}" selected> {{ $reporte[0]->ReDataCollection ?? "Seleccione una colección"}} </option>
                                @foreach ($vistas as $coleccion)
                                    <option value="{{ $coleccion->table_name }}">{{ $coleccion->table_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="columnas_coleccion" class="form-label">Columnas disponibles para filtrar</label>
                            <select id="columnas_coleccion" class="form-control">
                                <option value="{{ $reporte[0]->ReDataCollection ?? "" }}" selected> {{ $reporte[0]->ReDataCollection ?? "Seleccione una colección"}} </option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="columnas_coleccion" class="form-label">Tipo de filtro</label>
                            <select id="t_filtros" class="form-control">
                                <option value="input">Filtrar por nombres</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <label for="add_filtro">Agregar filtro</label>
                            <div>
                                <button class="btn btn-info" id="add_filtro"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex align-items-center mt-2">
                      <div class="col-4">
                        <label for="filtro" class="form-label">Filtro a aplicar</label>
                        <div class="col-12 filtro-item" style="border: 1px solid #ddd; background-color: #f8f9fa; padding: 10px; border-radius: 5px; height: auto;">
                          <div class="d-flex flex-column" id="filtros_container">
                            <!-- Aquí se irán añadiendo las filas de filtros -->
                          </div>
                        </div>
                      </div>

                      <div class="col-4">
                        <label for="filtro" class="form-label">Seleccione el formato de salida:</label>
                        <select name="formato_salida" id="" class="form-select">
                            <option value="excel">Excel</option>
                        </select>
                      </div>

                      <div class="col-2 mt-1">
                        <br>
                        <button type="submit" class="btn btn-primary" id="guardar_reporte">Guardar</button>
                      </div>
                      
                    </div>
                    {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
