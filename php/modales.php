<?php
// Modal para Ver Perfil (dentro del bucle while)
echo "<div class='modal fade form-modal' id='verPerfilModal" . $idUsuario . "' tabindex='-1' aria-labelledby='verPerfilModalLabel" . $idUsuario . "' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='verPerfilModalLabel" . $idUsuario . "'>Perfil de " . $nombre . " " . $apellidos . "</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>";

                echo "<div class='mb-3 row'>
                    <label class='form-label col-sm-4 col-form-label'>ID Usuario</label>
                    <div class='col-sm-8'>
                        <input type='text' class='form-control form-control-borderless' value='" . $idUsuario . "' readonly>
                    </div>
                </div>";

                echo "<div class='mb-3 row'>
                    <label class='form-label col-sm-4 col-form-label'>Nombre</label>
                    <div class='col-sm-8'>
                        <input type='text' class='form-control form-control-borderless' value='" . $nombre . "' readonly>
                    </div>
                </div>";

                echo "<div class='mb-3 row'>
                    <label class='form-label col-sm-4 col-form-label'>Primer Apellido</label>
                    <div class='col-sm-8'>
                        <input type='text' class='form-control form-control-borderless' value='" . $row['apellido1'] . "' readonly>
                    </div>
                </div>";

                echo "<div class='mb-3 row'>
                    <label class='form-label col-sm-4 col-form-label'>Segundo Apellido</label>
                    <div class='col-sm-8'>
                        <input type='text' class='form-control form-control-borderless' value='" . $row['apellido2'] . "' readonly>
                    </div>
                </div>";

                echo "<div class='mb-3 row'>
                    <label class='form-label col-sm-4 col-form-label'>Email</label>
                    <div class='col-sm-8'>
                        <input type='email' class='form-control form-control-borderless' value='" . $email . "' readonly>
                    </div>
                </div>";

                echo "<div class='mb-3 row'>
                    <label class='form-label col-sm-4 col-form-label'>DNI</label>
                    <div class='col-sm-8'>
                        <input type='text' class='form-control form-control-borderless' value='" . $row['dni'] . "' readonly>
                    </div>
                </div>";

                echo "<div class='mb-3 row'>
                    <label class='form-label col-sm-4 col-form-label'>Teléfono</label>
                    <div class='col-sm-8'>
                        <input type='text' class='form-control form-control-borderless' value='" . $row['telefono'] . "' readonly>
                    </div>
                </div>";

                echo "<div class='mb-3 row'>
                    <label class='form-label col-sm-4 col-form-label'>Comentario</label>
                    <div class='col-sm-8'>
                        <textarea class='form-control form-control-borderless' rows='3' readonly>" . $row['comentario'] . "</textarea>
                    </div>
                </div>";

                echo "<div class='mb-3 row'>
                    <label class='form-label col-sm-4 col-form-label'>Categoría</label>
                    <div class='col-sm-8'>
                        <input type='text' class='form-control form-control-borderless' value='" . $categoria . "' readonly>
                    </div>
                </div>";

                if ($categoria == 'Alumno') {
                    echo "<div class='mb-3 row'>
                        <label class='form-label col-sm-4 col-form-label'>Curso</label>
                        <div class='col-sm-8'>
                            <input type='text' class='form-control form-control-borderless' value='" . $curso . "' readonly>
                        </div>
                    </div>";
                } elseif ($categoria == 'Profesor') {
                    echo "<div class='mb-3 row'>
                        <label class='form-label col-sm-4 col-form-label'>Departamento</label>
                        <div class='col-sm-8'>
                            <input type='text' class='form-control form-control-borderless' value='" . $departamento . "' readonly>
                        </div>
                    </div>";
                    echo "<div class='mb-3 row'>
                        <label class='form-label col-sm-4 col-form-label'>Etapa</label>
                        <div class='col-sm-8'>
                            <input type='text' class='form-control form-control-borderless' value='" . $etapa . "' readonly>
                        </div>
                    </div>";
                }

            echo "</div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
            </div>
        </div>
    </div>
</div>";
            // Modal para EDITAR Perfil
echo "<div class='modal fade form-modal' id='editarUsuarioModal" . $idUsuario . "' tabindex='-1' aria-labelledby='editarUsuarioModalLabel" . $idUsuario . "' aria-hidden='true'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title'>Editar Usuario: " . $nombre . " " . $apellidos . "</h5>
        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body'>  <form action='php/editar_usuario.php' method='POST' id='editarForm" . $idUsuario . "'>
          <input type='hidden' name='idUsuario' value='" . $idUsuario . "'>

          <div class='form-group row'>  <label for='nombre" . $idUsuario . "' class='col-sm-4 col-form-label'>Nombre</label>
            <div class='col-sm-8'>
              <input type='text' class='form-control' id='nombre" . $idUsuario . "' name='nombre' value='" . $nombre . "' required>
            </div>
          </div>

          <div class='form-group row'>  <label for='apellido1" . $idUsuario . "' class='col-sm-4 col-form-label'>Primer Apellido</label>
            <div class='col-sm-8'>
              <input type='text' class='form-control' id='apellido1" . $idUsuario . "' name='apellido1' value='" . $row['apellido1'] . "' required>
            </div>
          </div>

          <div class='form-group row'>  <label for='apellido2" . $idUsuario . "' class='col-sm-4 col-form-label'>Segundo Apellido</label>
            <div class='col-sm-8'>
              <input type='text' class='form-control' id='apellido2" . $idUsuario . "' name='apellido2' value='" . $row['apellido2'] . "' required>
            </div>
          </div>

          <div class='form-group row'>  <label for='email" . $idUsuario . "' class='col-sm-4 col-form-label'>Email</label>
            <div class='col-sm-8'>
              <input type='email' class='form-control' id='email" . $idUsuario . "' name='email' value='" . $email . "' required>
            </div>
          </div>

          <div class='form-group row'>  <label for='dni" . $idUsuario . "' class='col-sm-4 col-form-label'>DNI</label>
            <div class='col-sm-8'>
              <input type='text' class='form-control' id='dni" . $idUsuario . "' name='dni' value='" . $row['dni'] . "' required>
            </div>
          </div>

          <div class='form-group row'>  <label for='telefono" . $idUsuario . "' class='col-sm-4 col-form-label'>Teléfono</label>
            <div class='col-sm-8'>
              <input type='text' class='form-control' id='telefono" . $idUsuario . "' name='telefono' value='" . $row['telefono'] . "'>
            </div>
          </div>

          <div class='form-group row'>  <label for='comentario" . $idUsuario . "' class='col-sm-4 col-form-label'>Comentario</label>
            <div class='col-sm-8'>
              <textarea class='form-control' id='comentario" . $idUsuario . "' name='comentario' rows='3'>" . $row['comentario'] . "</textarea>
            </div>
          </div>

          <div class='form-group row'>  <label class='col-sm-4 col-form-label'>Categoría</label>
            <div class='col-sm-8'>
              <input type='text' class='form-control' value='" . $categoria . "' readonly>
            </div>
          </div>";

          if ($categoria == 'Alumno') {
            echo "<div class='form-group row'>  <label for='curso" . $idUsuario . "' class='col-sm-4 col-form-label'>Curso</label>
                    <div class='col-sm-8'>
                      <input type='text' class='form-control' id='curso" . $idUsuario . "' name='curso' value='" . $curso . "'>
                    </div>
                  </div>";
          } elseif ($categoria == 'Profesor') {
            echo "<div class='form-group row'>  <label for='departamento" . $idUsuario . "' class='col-sm-4 col-form-label'>Area</label>
                    <div class='col-sm-8'>
                      <input type='text' class='form-control' id='departamento" . $idUsuario . "' name='departamento' value='" . $area . "'>
                    </div>
                  </div>
                  <div class='form-group row'>  <label for='etapa" . $idUsuario . "' class='col-sm-4 col-form-label'>Etapa</label>
                    <div class='col-sm-8'>
                      <input type='text' class='form-control' id='etapa" . $idUsuario . "' name='etapa' value='" . $etapa . "'>
                    </div>
                  </div>";
          }

          echo "<button type='submit' class='btn btn-primary' name='guardar'>Guardar Cambios</button>
        </form>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
      </div>
    </div>
  </div>
</div>";
//Modal para añadir usuario 
echo "<div class='modal fade form-modal' id='registroModal' tabindex='-1' aria-labelledby='registroModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class='modal-title fs-5' id='registroModalLabel'>Registro de Usuario</h1>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                <form method='POST' action='php/insertar_usuario.php'>
                    <div class='mb-3'>
                        <label for='nombre' class='form-label'>Nombre:</label>
                        <input type='text' class='form-control' id='nombre' name='nombre' required>
                    </div>
                    <div class='mb-3'>
                        <label for='apellido1' class='form-label'>Primer Apellido:</label>
                        <input type='text' class='form-control' id='apellido1' name='apellido1' required>
                    </div>
                    <div class='mb-3'>
                        <label for='apellido2' class='form-label'>Segundo Apellido:</label>
                        <input type='text' class='form-control' id='apellido2' name='apellido2'>
                    </div>
                    <div class='mb-3'>
                        <label for='email' class='form-label'>Email:</label>
                        <input type='email' class='form-control' id='email' name='email' required>
                    </div>
                    <div class='mb-3'>
                        <label for='dni' class='form-label'>DNI:</label>
                        <input type='text' class='form-control' id='dni' name='dni' required>
                    </div>
                    <div class='mb-3'>
                        <label for='telefono' class='form-label'>Teléfono:</label>
                        <input type='text' class='form-control' id='telefono' name='telefono'>
                    </div>
                    <div class='mb-3'>
                        <label for='comentario' class='form-label'>Comentario:</label>
                        <textarea class='form-control' id='comentario' name='comentario'></textarea>
                    </div>
                    <div class='mb-3'>
                        <label for='usuarioActivo' class='form-label'>Usuario Activo:</label>
                        <select class='form-select' id='usuarioActivo' name='usuarioActivo'>
                            <option value='Activo' selected>Sí</option>
                            <option value='Inactivo'>No</option>
                        </select>
                    </div>
                    <div class='mb-3'>
                        <label for='categoria' class='form-label'>Categoría:</label>
                        <select class='form-select' id='categoria' name='categoria' onchange='mostrarCampos()'>
                            <option value='' selected disabled>Seleccione una categoría</option>
                            <option value='Alumno'>Alumno</option>
                            <option value='Profesor'>Profesor</option>
                            <option value='Pas'>PAS</option>
                            <option value='Monitor'>Monitor</option>
                            <option value='Practicas'>Prácticas</option>
                        </select>
                    </div>

                    <div id='camposAlumno' hidden>
                        <div class='mb-3'>
                            <label for='curso' class='form-label'>Curso:</label>
                            <input type='text' class='form-control' id='curso' name='curso'>
                        </div>
                    </div>

                    <div id='camposProfesor' hidden>
                        <div class='mb-3'>
                            <label for='departamento' class='form-label'>Departamento:</label>
                            <input type='text' class='form-control' id='departamento' name='departamento'>
                        </div>
                        <div class='mb-3'>
                            <label for='etapa' class='form-label'>Etapa:</label>
                            <input type='text' class='form-control' id='etapa' name='etapa'>
                        </div>
                    </div>

                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                        <button type='submit' class='btn btn-primary'>Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>";
        