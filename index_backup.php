<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
  <style>
    .hidden {
      display: none;
    }
            .sidebar {
            width: 300px; /* Ancho fijo del sidebar */
            height: 100vh; /* Altura completa de la ventana */
            position: fixed; /* Fija el sidebar en su posición */
            overflow-y: auto; /* Permite scroll si el contenido es muy largo */
            background-color: #f8f9fa; /* Color de fondo */
            padding: 20px; /* Espaciado interno */ 
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .sidebar form {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* Dos columnas iguales */
            gap: 10px; /* Espaciado entre botones */
            justify-content: center; /* Centra el contenido */
            width: 100%;
        }

        .button-container button {
            min-width: 100px; /* Mantiene el tamaño de los botones */
            text-align: center; /* Asegura que el texto esté centrado */
            width: 100%; /* Ocupa todo el ancho de la celda */
            height: 40px;
        }
    .main-content {
      margin-left: 300px; /* Margen izquierdo igual al ancho del sidebar */
      overflow-y: auto; /* Permite scroll si el contenido es muy largo */
      height: 100vh; /* Altura completa de la ventana */
      width: calc(100% - 300px); /* Ancho del contenido principal */
    }
    .table-container {
      width: 100%; /* Ocupa el 100% del ancho del contenedor */
      max-height: 100vh; /* Altura máxima para la tabla */
      overflow-y: auto; /* Permite scroll si la tabla es muy larga */
    }
    .table {
      width: 100%; /* Ocupa el 100% del ancho del contenedor */
      table-layout: auto; /* Ajusta automáticamente el ancho de las columnas */
    }
    .table th{
        text-align: center;
    }
    .table th, .table td {
      padding: 2px; /* Reducir el padding al mínimo */
      white-space: nowrap; /* Evita que el texto se divida en varias líneas */
      overflow: hidden; /* Oculta el contenido que excede el ancho */
      text-overflow: ellipsis; /* Muestra puntos suspensivos si el contenido es demasiado largo */
    }
    .form-modal label {
  display: block;
  margin-bottom: 3px;
  font-size: 12px; /* Tamaño de fuente más pequeño */
}

.form-modal input[type="text"],
.form-modal input[type="email"],
.form-modal input[type="password"],
.form-modal input[type="number"],
.form-modal input[type="tel"],
.form-modal input[type="url"],
.form-modal input[type="search"],
.form-modal input[type="date"],
.form-modal input[type="time"],
.form-modal input[type="datetime-local"],
.form-modal input[type="month"],
.form-modal input[type="week"],
.form-modal textarea,
.form-modal select {
  width: 100%;
  padding: 5px;
  margin-bottom: 8px;
  border: 1px solid #ccc;
  box-sizing: border-box;
  font-size: 12px; /* Tamaño de fuente más pequeño */
}

.form-modal input:focus,
.form-modal textarea:focus,
.form-modal select:focus {
  border-color: #007bff;
  outline: none;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
}

.form-modal input[type="submit"] {
  background-color: #007bff;
  color: white;
  cursor: pointer;
  border: none;
  padding: 8px 12px; /* Ajusta el padding */
  font-size: 12px; /* Tamaño de fuente más pequeño */
}

.form-modal input[type="submit"]:hover {
  background-color: #0056b3;
}
.form-group {
  margin-bottom: 10px; /* Espacio entre grupos de campos */
}

.form-group label {
  text-align: left; /* Alinea el texto de la etiqueta a la izquierda */
}
.form-control-borderless{
    background-color: #f2f2f2 !important;
    
}
.form-control-borderless:focus{
    border: none; !important
}
  </style>
</head>
<body>
    <!-- Sidebar -->
     <!-- Todos los simbolos de la barra lateral -->
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="lupa" viewBox="0 0 16 16">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
    </symbol>
    <symbol id="iconoUser" viewBox="0 0 16 16">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
    </symbol>    
    <symbol id="reload" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
    </symbol>
    <symbol id="excel" viewBox="0 0 16 16">
      <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
    </symbol>
    <symbol id="door">
    <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
    </symbol>
    <symbol id="exit" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
    </symbol>
  </svg>

  <main class="d-flex">
    <!-- Barra lateral -->
    <div class="sidebar">
      <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
            <h2><svg class="bi pe-none me-2" width="40" height="32">
          <use xlink:href="#iconoUser" />
        </svg>Bienvenido</h2>
          <a href="">
          <svg class="bi pe-none me-2" width="40" height="32" fill="red">
          <use xlink:href="#exit" />
          </svg>
          </a>
        </div>
      <hr>
      <div>
        <h5>Filtros de búsqueda
          <svg class="bi pe-none ms-2" width="16" height="16">
            <use xlink:href="#lupa" />
          </svg>
        </h5>
      </div>
      <!-- Select de categorias -->
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <select name="categoria" id="categoriaMenu" onchange="mostrarCamposMenu()" class="form-select mt-3">
            <option value="" selected disabled>Seleccione una categoría</option>
            <option value="Alumno">Alumno</option>
            <option value="Profesor">Profesor</option>
            <option value="PAS">PAS</option>
            <option value="Monitor">Monitor</option>
            <option value="Practicas">Prácticas</option>
          </select>

          <!-- Campos específicos en el select alumno -->
          <div id="camposAlumnoMenu" class="hidden">
            <ul>
              <li>
                <select name="curso" id="cursoMenu" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione un curso</option>
                  <option value="1Bachiller">1º Bachiller</option>
                  <option value="2Bachiller">2º Bachiller</option>
                </select>
              </li>
            </ul>
          </div>

          <!-- Campos específicos en el select profesor -->
          <div id="camposProfesorMenu" class="hidden">
            <ul>
              <li>
                <select name="departamento" id="departamentMenu" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione un departamento</option>
                  <option value="Matematica">Matemática</option>
                  <option value="Ingles">Inglés</option>
                </select>
              </li>
              <li>
                <select name="etapa" id="etapaMenu" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione una etapa</option>
                </select>
              </li>
            </ul>
          </div>
        </li>
      </ul>
<div class="button-container mt-3 gap-2 d-grid">  <button class="btn btn-primary" type="button" onclick="actualizarPagina()">
    <svg class="bi pe-none" width="16" height="16" fill="currentColor">
      <use xlink:href="#reload" />  </svg>
    Actualizar
  </button>

  <button id="descargarExcel" class="btn btn-success" onclick="descargarExcel()">
    <svg class="bi pe-none" width="16" height="16" fill="currentColor">
      <use xlink:href="#excel" />  </svg>
    Excel
  </button>

<button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#registroModal">
    <svg class="bi pe-none" width="16" height="16" fill="currentColor">
        <use xlink:href="#iconoUser" />  </svg>
    N.Usuario
</button>

  <button class="btn btn-warning" type="button" onclick="nuevoAcceso()">
    <svg class="bi pe-none" width="16" height="16" fill="currentColor">
      <use xlink:href="#door" />  </svg>
    N.Acceso
  </button>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
    Importar CSV
   </button>
</div>
</div>
<!-- Boton con un modal para subir un csv-  -->
       
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalLabel">Importar archivo CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="importar.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="csv_file" accept=".csv" required>
                    <button type="submit" class="btn btn-primary mt-3">Importar</button>
                </form>
                <div id="mensaje"></div>  </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
    </div>
    <!-- Main Content -->
    <div class="main-content">
      <div class="table-container">
        <?php
        // Incluir la conexión a la base de datos
        include 'abrir_conexion.php';

        // Verificar si la conexión fue exitosa
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Consulta SQL ajustada para obtener los datos de usuario y sus campos relacionados con las categorías
        $sql = "
          SELECT u.idUsuario, u.nombre, u.apellido1, u.apellido2, u.email, u.dni, u.telefono, u.comentario, u.usuarioActivo, u.categoria, a.curso, p.departamento, p.etapa
FROM usuario u
LEFT JOIN alumno a ON u.idUsuario = a.idUsuario
LEFT JOIN profesor p ON u.idUsuario = p.idUsuario
LEFT JOIN monitor m ON u.idUsuario = m.idUsuario
LEFT JOIN practica pr ON u.idUsuario = pr.idUsuario
LEFT JOIN pas pa ON u.idUsuario = pa.idUsuario;";

        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
          // Mostrar los resultados en un formato de tabla
          echo "<table class='table table-bordered' id='tablaRegistros'>";
          echo "<thead><tr>
                  <th style='width: 10%;'>ID Usuario</th>
                  <th style='width: 20%;'>Nombre</th>
                  <th style='width: 20%;'>Apellidos</th>
                  <th style='width: 20%;'>Email</th>
                  <th style='width: 15%;'>Categoría</th>
                  <th style='width: 15%;'>Acciones</th>
                </tr></thead><tbody>";

          // Recorrer los registros y mostrarlos
          while ($row = $result->fetch_assoc()) {
              $idUsuario = htmlspecialchars($row["idUsuario"]);
    $nombre = htmlspecialchars($row["nombre"]);
    $apellido1 = htmlspecialchars($row["apellido1"]);
    $apellido2 = htmlspecialchars($row["apellido2"]);
    $apellidos = $apellido1 . " " . $apellido2;
    $email = htmlspecialchars($row["email"]);
    $dni = htmlspecialchars($row["dni"]);
    $telefono = htmlspecialchars($row["telefono"]);
    $comentario = htmlspecialchars($row["comentario"]);
    $usuarioActivo = htmlspecialchars($row["usuarioActivo"]);
    $categoria = htmlspecialchars($row["categoria"]);
    $curso = htmlspecialchars($row["curso"]);
    $departamento = htmlspecialchars($row["departamento"]);
    $etapa = htmlspecialchars($row["etapa"]);

            // Mostrar los campos en la tabla
            echo "<tr>
                  <td>" . $idUsuario . "</td>
                  <td>" . $nombre . "</td>
                  <td>" . $apellidos . "</td>
                  <td>" . $email . "</td>
                  <td>" . $categoria . "</td>
                  <td>
                      <!-- Botón para Ver Perfil (abre un modal) -->
                      <button type='button' class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#verPerfilModal$idUsuario'>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                              <path d='M16 8s-3 4-8 4-8-4-8-4 3-4 8-4 8 4 8 4z'/>
                              <path d='M8 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4z'/>
                          </svg> Ver Perfil
                      </button> |
                      
                      <!-- Botón para Editar (abre un modal) -->
                      <button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editarUsuarioModal$idUsuario'>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                              <path d='M12.146 0.854a2 2 0 0 1 2.828 2.828l-8 8a2 2 0 0 1-1.072.52l-4 1a1 1 0 0 1-1.224-1.224l1-4a2 2 0 0 1 .52-1.072l8-8a2 2 0 0 1 2.828 0z'/>
                          </svg> Editar
                      </button> |
                      
                      <!-- Botón para Borrar (sin cambios) -->
                      <a href='borrar_usuario.php?id=$idUsuario' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Seguro que deseas borrar este usuario?\")'>
                          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                              <path d='M2.146 2.146a1 1 0 0 1 1.414 0L8 6.586l4.44-4.44a1 1 0 1 1 1.42 1.42L9.414 8l4.44 4.44a1 1 0 1 1-1.42 1.42L8 9.414l-4.44 4.44a1 1 0 1 1-1.414-1.414L6.586 8 2.146 3.56a1 1 0 0 1 0-1.414z'/>
                          </svg> Borrar
                      </a>
                  </td>
                </tr>";
//Modal para añadir usuario 
echo "<div class='modal fade form-modal' id='registroModal' tabindex='-1' aria-labelledby='registroModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h1 class='modal-title fs-5' id='registroModalLabel'>Registro de Usuario</h1>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                <form method='POST' action='insertar_usuario.php'>
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
      <div class='modal-body'>  <form action='editar_usuario.php' method='POST' id='editarForm" . $idUsuario . "'>
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
            echo "<div class='form-group row'>  <label for='departamento" . $idUsuario . "' class='col-sm-4 col-form-label'>Departamento</label>
                    <div class='col-sm-8'>
                      <input type='text' class='form-control' id='departamento" . $idUsuario . "' name='departamento' value='" . $departamento . "'>
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
          }

          echo "</tbody></table>";
        } else {
          echo "No se encontraron resultados.";
        }

        $conn->close();
        ?>
      </div>
    </div>
  </main>

  <script>
    document.getElementById("descargarExcel").addEventListener("click", () => {
      const tabla = document.getElementById("tablaRegistros");
      const workbook = XLSX.utils.table_to_book(tabla); // Convertir la tabla a un libro de Excel
      XLSX.writeFile(workbook, "registros.xlsx"); // Descargar el archivo
    });
    function mostrarCamposMenu() {
      let categoria = document.getElementById("categoriaMenu").value;
      document.getElementById("camposAlumnoMenu").style.display = categoria == "Alumno" ? "block" : "none";
      document.getElementById("camposProfesorMenu").style.display = categoria == "Profesor" ? "block" : "none";
    }
        function mostrarCampos() {
        const categoria = document.getElementById('categoria').value;
        const camposAlumno = document.getElementById('camposAlumno');
        const camposProfesor = document.getElementById('camposProfesor');

        camposAlumno.hidden = true;
        camposProfesor.hidden = true;

        if (categoria === 'Alumno') {
            camposAlumno.hidden = false;
        } else if (categoria === 'Profesor') {
            camposProfesor.hidden = false;
        }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>
</html>