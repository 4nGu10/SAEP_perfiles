<div class="content-wrapper">

    <!-- Encabezado -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Fichas</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                        <li class="breadcrumb-item active">Fichas</li>
                    </ol>
                </div>

                <div class="col-sm-12">
                    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalAgregarFicha">
                        Agregar Ficha
                    </button>
                </div>

            </div>
        </div>
    </section>

    <!-- Contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Código</th>
                                    <th>Programa</th>
                                    <th>Sede</th>
                                    <th>Modalidad</th>
                                    <th>Jornada</th>
                                    <th>Nivel Formación</th>
                                    <th>Tipo Oferta</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin Lectiva</th>
                                    <th>Fecha Final</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $valor = null;
                                $fichas = ControladorFichas::ctrMostrarFichas($valor);

                                foreach ($fichas as $key => $value) {
                                    echo '<tr>';
                                    echo '<td>' . $value["ID_Fichas"] . '</td>';
                                    echo '<td>' . $value["codigo"] . '</td>';
                                    echo '<td>' . $value["nombre_programa"] . '</td>';
                                    echo '<td>' . $value["nombre_sede"] . '</td>';
                                    echo '<td>' . $value["modalidad"] . '</td>';
                                    echo '<td>' . $value["jornada"] . '</td>';
                                    echo '<td>' . $value["nivel_formacion"] . '</td>';
                                    echo '<td>' . $value["tipo_oferta"] . '</td>';
                                    echo '<td>' . $value["fecha_inicio"] . '</td>';
                                    echo '<td>' . $value["fecha_fin_lec"] . '</td>';
                                    echo '<td>' . $value["fecha_final"] . '</td>';

                                    // Botón estado
                                    if ($value["estado"] == "Activa") {
                                        echo '<td><button class="btn btn-success btn-sm btnActivarFicha" idFichaCambiarEstado="' . $value["ID_Fichas"] . '" nuevoEstado="Inactiva">Activa</button></td>';
                                      } else {
                                        echo '<td><button class="btn btn-danger btn-sm btnActivarFicha" idFicha="' . $value["ID_Fichas"] . '" nuevoEstado="Activa">Inactiva</button></td>';
                                      }
                                      
                                    

                                    // Botón editar
                                    echo '<td><button class="btn btn-xs btn-primary btnEditarFicha" idFicha="' . $value["ID_Fichas"] . '" data-toggle="modal" data-target="#modalEditarFicha"><i class="fas fa-pencil-alt"></i></button></td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<!-- ========== Modal Agregar Ficha ========== -->
<div class="modal fade" id="modalAgregarFicha">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Agregar Ficha de Formación</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <form method="POST">
                <div class="modal-body row">

                    <!-- Código -->
                    <div class="form-group col-md-6">
                        <label for="codigoFicha">Código</label>
                        <input type="text" class="form-control" name="codigoFicha" required>
                    </div>

                    <!-- Programa -->
                    <div class="form-group col-md-6">
                        <label for="id_programa">Programa</label>
                        <select class="form-control" name="id_programa" required>
                            <option value="">Seleccione un programa</option>
                            <?php
                            $programas = ControladorProgramas::ctrMostrarProgramas(null);
                            foreach ($programas as $programa) {
                                echo '<option value="'.$programa["id_programa"].'">'.$programa["nombre_programa"].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Sede -->
                    <div class="form-group col-md-6">
                        <label for="id_sede">Sede</label>
                        <select class="form-control" name="id_sede" required>
                            <option value="">Seleccione una sede</option>
                            <?php
                            $sedes = ControladorSedes::ctrMostrarSedes(null);
                            foreach ($sedes as $sede) {
                                echo '<option value="'.$sede["id_sede"].'">'.$sede["nombre_sede"].'</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Modalidad -->
                    <div class="form-group col-md-6">
                        <label for="modalidad">Modalidad</label>
                        <select class="form-control" name="modalidad" required>
                            <option value="">Seleccione modalidad</option>
                            <option value="Presencial">Presencial</option>
                            <option value="Virtual">Virtual</option>
                        </select>
                    </div>

                    <!-- Jornada -->
                    <div class="form-group col-md-6">
                        <label for="jornada">Jornada</label>
                        <select class="form-control" name="jornada" required>
                            <option value="">Seleccione jornada</option>
                            <option value="Diurna">Diurna</option>
                            <option value="Mixta">Mixta</option>
                            <option value="Nocturna">Nocturna</option>
                        </select>
                    </div>

                    <!-- Nivel Formación -->
                    <div class="form-group col-md-6">
                        <label for="nivel_formacion">Nivel de Formación</label>
                        <select class="form-control" name="nivel_formacion" required>
                            <option value="">Seleccione nivel</option>
                            <option value="Técnico">Técnico</option>
                            <option value="Tecnólogo">Tecnólogo</option>
                        </select>
                    </div>

                    <!-- Tipo de Oferta -->
                    <div class="form-group col-md-6">
                        <label for="tipo_oferta">Tipo de Oferta</label>
                        <select class="form-control" name="tipo_oferta" required>
                            <option value="">Seleccione tipo</option>
                            <option value="Abierta">Abierta</option>
                            <option value="Cerrada">Cerrada</option>
                        </select>
                    </div>

                    <!-- Fecha Inicio -->
                    <div class="form-group col-md-6">
                        <label for="fecha_inicio">Fecha Inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" required>
                    </div>

                    <!-- Fecha Fin Lectiva -->
                    <div class="form-group col-md-6">
                        <label for="fecha_fin_lec">Fecha Fin Lectiva</label>
                        <input type="date" class="form-control" name="fecha_fin_lec" required>
                    </div>

                    <!-- Fecha Final -->
                    <div class="form-group col-md-6">
                        <label for="fecha_final">Fecha Final</label>
                        <input type="date" class="form-control" name="fecha_final" required>
                    </div>

                    <!-- Estado (Oculto y por defecto Activo) -->
                    <input type="hidden" name="estado_ficha" value="Activo">

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php
                $crearFicha = new ControladorFichas();
                $crearFicha->ctrCrearFicha();
                ?>
            </form>

        </div>
    </div>
</div>

<!-- ========== Modal Editar Ficha ========== -->
<div class="modal fade" id="modalEditarFicha">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Editar Ficha de formación</h4>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" id="editIdFicha" name="editIdFicha" required>

                    <label for="editCodigoFicha">Código</label>
                    <input type="text" class="form-control" id="editCodigoFicha" name="editCodigoFicha" required>

                  

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php
                $editarFicha = new ControladorFichas();
                $editarFicha->ctrEditarFicha();
                ?>
            </form>

        </div>
    </div>
</div>
