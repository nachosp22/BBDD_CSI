<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
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
      <form id="formularioFiltros" method="GET">
      <!-- Select de categorias -->
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <select name="categoriaMenu" id="categoriaMenu" onchange="mostrarCamposMenu()" class="form-select mt-3">
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
                <select name="etapaAlumno" id="etapaMenuAlumno" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione la etapa</option>
                  <option value="INF">INF</option>
                  <option value="PRI">PRI</option>
                  <option value="ESO">ESO</option>
                  <option value="BACH">BACH</option>
                  <option value="PD">PD</option>
                </select>
              </li>
              <li>
                <select name="curso" id="cursoMenu" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione un curso</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </li>
              <li>
                <select name="clase" id="claseMenu" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione una clase</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                </select>
              </li>
            </ul>
          </div>

          <!-- Campos específicos en el select profesor -->
          <div id="camposProfesorMenu" class="hidden">
            <ul>
              <li>
                <select name="area" id="areaMenu" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione un area</option>
                  <option value="1">Matemática</option>
                  <option value="2">Inglés</option>
                  <option value="3">Historia</option>
                  <option value="4">Tecnologia</option>
                </select>
              </li>
              <li>
                <select name="etapaProfesor" id="etapaMenuProfesor" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione la etapa</option>
                  <option value="INF">INF</option>
                  <option value="PRI">PRI</option>
                  <option value="ESO">ESO</option>
                  <option value="BACH">BACH</option>
                  <option value="PD">PD</option>
                </select>
              </li>
            </ul>
          </div>
          
          <!-- Campos específicos en el select pas -->
          <div id="camposPasMenu" class="hidden">
            <ul>
              <li>
                <select name="areaPas" id="areaMenuPas" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione un area</option>
                  <option value="1">Secretaria</option>
                  <option value="2">Administración</option>
                  <option value="3">Mantenimiento</option>
                  <option value="4">NN.TT</option>
                  <option value="5">Cocina</option>
                  <option value="6">Servicios</option>
                </select>
              </li>
            </ul>
          </div>
          
          <!-- Campos específicos en el select monitor -->
          <div id="camposMonitorMenu" class="hidden">
            <ul>
              <li>
                <select name="areaMonitor" id="areaMenuMonitor" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione un area</option>
                  <option value="1">Fútbol</option>
                  <option value="2">Baloncesto</option>
                  <option value="3">Voley</option>
                  <option value="4">Multideporte</option>
                  <option value="5">Música</option>
                  <option value="6">Idiomas</option>
                  <option value="7">Atletismo</option>
                  <option value="8">Otros</option>
                </select>
              </li>
              <li>
                <select name="ciudadMonitor" id="ciudadMenuMonitor" class="form-select mt-3">
                  <option value="" selected disabled>Seleccione una ciudad</option>
                  <option value="Oviedo">Oviedo</option>
                  <option value="Gijon">Gijón</option>
                </select>
              </li>
            </ul>
          </div>
        </li>
      </ul>
        <div class="mt-3" style="margin-bottom: 5px">  <button type="submit" id="btnFiltrar" class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                <svg class="bi pe-none me-2" width="16" height="16" fill="currentColor">
                    <use xlink:href="#reload" />
                </svg>
                Actualizar
            </button>
        </div>
      </form>
        <div class="button-grid">
            <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#registroModal">
                <svg class="bi pe-none me-2" width="16" height="16" fill="currentColor">
                    <use xlink:href="#iconoUser" />
                </svg>
                N.Usuario
            </button>
    
        <button class="btn btn-warning" type="button" onclick="nuevoAcceso()">
            <svg class="bi pe-none me-2" width="16" height="16" fill="currentColor">
                <use xlink:href="#door" />
            </svg>
            N.Acceso
        </button>
        <button id="descargarExcel" class="btn btn-success">
            <svg class="bi pe-none me-2" width="16" height="16" fill="currentColor">
                <use xlink:href="#excel" />
            </svg>
            Excel
        </button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
            Importar CSV
        </button>
        </div>
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
      <form action="php/insertar_csv.php"  method="post" enctype="multipart/form-data" id="formularioCsv">
      <div class="modal-body">
        <p>Suba el archivo CSV</p>
        <input type="file" name="csv_file" id="file-input" class="file-input__input form-control" accept=".csv" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" name="subir" class="btn btn-primary" value="Subir Excel">Importar</button>
      </form>
      </div>
      <div id="mensaje"></div>
    </div>
  </div>
</div>
    <!-- Main Content -->
    <div class="main-content">
        <div class="vistasTablas">
            <button id="btnTabla1">Tabla 1</button>
            <button id="btnTabla2">Tabla 2</button>
            <button id="btnTabla3">Tabla 3</button>
        </div>
      <div class="table-container">

<?php
include 'php/abrir_conexion.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$categoria = $_GET['categoriaMenu'] ?? '';
$etapaAlumno = $_GET['etapaAlumno'] ?? '';
$curso = $_GET['curso'] ?? '';
$clase = $_GET['clase'] ?? '';
$area = $_GET['area'] ?? '';
$etapaProfesor = $_GET['etapaProfesor'] ?? '';
$areaPas = $_GET['areaPas'] ?? '';
$areaMonitor = $_GET['areaMonitor'] ?? '';
$ciudadMonitor = $_GET['ciudadMonitor'] ?? '';

$sql = "
    SELECT usuario.idUsuario, usuario.nombre, usuario.apellido1, usuario.apellido2, usuario.email, usuario.dni, usuario.telefono, usuario.comentario, usuario.usuarioActivo, usuario.categoria, alumno.curso, alumno.clase, alumno.etapa, profesor.area, profesor.etapa, monitor.area as areaMonitor, monitor.ciudad as ciudadMonitor
    FROM usuario
    LEFT JOIN alumno ON usuario.idUsuario = alumno.idUsuario
    LEFT JOIN profesor ON usuario.idUsuario = profesor.idUsuario
    LEFT JOIN monitor ON usuario.idUsuario = monitor.idUsuario
    LEFT JOIN practica ON usuario.idUsuario = practica.idUsuario
    LEFT JOIN pas ON usuario.idUsuario = pas.idUsuario
    WHERE 1 = 1
";

if (!empty($categoria)) {
    $sql .= " AND usuario.categoria = '$categoria'";
}

if ($categoria === 'Alumno' && !empty($etapaAlumno)) {
    $sql .= " AND alumno.etapa = '$etapaAlumno'";
}
if ($categoria === 'Alumno' && !empty($curso)) {
    $sql .= " AND alumno.curso = '$curso'";
}
if ($categoria === 'Alumno' && !empty($curso)) {
    $sql .= " AND alumno.clase = '$clase'";
}
if ($categoria === 'Profesor' && !empty($area)){
    $sql .= " AND profesor.area = '$area'";
}
if ($categoria === 'Profesor' && !empty($etapaProfesor)){
    $sql .= " AND profesor.etapa = '$etapaProfesor'";
}
if ($categoria === 'PAS' && !empty($areaPas)){
    $sql .= " AND pas.area = '$areaPas'";
}
if ($categoria === 'Monitor' && !empty($areaMonitor)){
    $sql .= " AND monitor.area = '$areaMonitor'";
}
if ($categoria === 'Monitor' && !empty($ciudadMonitor)){
    $sql .= " AND monitor.ciudad = '$ciudadMonitor'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered' id='tablaRegistros'>";
    echo "<thead><tr>
            <th style='width: 10%;'>ID Usuario</th>
            <th style='width: 20%;'>Nombre</th>
            <th style='width: 20%;'>Apellidos</th>
            <th style='width: 20%;'>Email</th>
            <th style='width: 15%;'>Categoría</th>
            <th style='width: 15%;'>Acciones</th>
        </tr></thead><tbody>";

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
        $area = htmlspecialchars($row["area"]);
        $etapa = htmlspecialchars($row["etapa"]);

        echo "<tr>
                <td>" . $idUsuario . "</td>
                <td>" . $nombre . "</td>
                <td>" . $apellidos . "</td>
                <td>" . $email . "</td>
                <td>" . $categoria . "</td>
                <td>
                    <button type='button' class='btn btn-success btn-sm' data-bs-toggle='modal' data-bs-target='#verPerfilModal$idUsuario'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                            <path d='M16 8s-3 4-8 4-8-4-8-4 3-4 8-4 8 4 8 4z'/>
                            <path d='M8 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4z'/>
                        </svg> Ver Perfil
                    </button> |
                    <button type='button' class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editarUsuarioModal$idUsuario'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146 0.854a2 2 0 0 1 2.828 2.828l-8 8a2 2 0 0 1-1.072.52l-4 1a1 1 0 0 1-1.224-1.224l1-4a2 2 0 0 1 .52-1.072l8-8a2 2 0 0 1 2.828 0z'/>
                        </svg> Editar
                    </button> |
                    <a href='php/borrar_usuario.php?id=$idUsuario' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Seguro que deseas borrar este usuario?\")'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                            <path d='M2.146 2.146a1 1 0 0 1 1.414 0L8 6.586l4.44-4.44a1 1 0 1 1 1.42 1.42L9.414 8l4.44 4.44a1 1 0 1 1-1.42 1.42L8 9.414l-4.44 4.44a1 1 0 1 1-1.414-1.414L6.586 8 2.146 3.56a1 1 0 0 1 0-1.414z'/>
                        </svg> Borrar
                    </a>
                </td>
            </tr>";

        include 'php/modales.php'; // Incluye los modales
    }

    echo "</tbody></table>";
} else {
    echo "No se encontraron usuarios con estos filtros de busqueda.";
}

$conn->close();
?>
      </div>
    </div>
  </main>

  <script>
    function mostrarCamposMenu() {
      let categoria = document.getElementById("categoriaMenu").value;
      document.getElementById("camposAlumnoMenu").style.display = categoria == "Alumno" ? "block" : "none";
      document.getElementById("camposProfesorMenu").style.display = categoria == "Profesor" ? "block" : "none";
      document.getElementById("camposPasMenu").style.display = categoria == "PAS" ? "block" : "none";
      document.getElementById("camposMonitorMenu").style.display = categoria == "Monitor" ? "block" : "none";


    }
        function mostrarCampos() {
        const categoria = document.getElementById('categoria').value;
        const camposAlumno = document.getElementById('camposAlumno');
        const camposProfesor = document.getElementById('camposProfesor');
        const camposPas = document.getElementById('camposPas');
        const camposMonitor = document.getElementById('camposMonitor');


        camposAlumno.hidden = true;
        camposProfesor.hidden = true;
        camposPas.hidden = true;
        camposMonitor.hidden = true;


        if (categoria === 'Alumno') {
            camposAlumno.hidden = false;
        } else if (categoria === 'Profesor') {
            camposProfesor.hidden = false;
        } else if (categoria === 'Pas') {
            camposPas.hidden = false;
        } else if (categoria === 'Monitor') {
            camposMonitor.hidden = false;
        }
    }
$(document).ready(function() {
    $('#categoriaMenu').change(function() {
        let categoriaSeleccionada = $(this).val();
        actualizarTabla(categoriaSeleccionada);
    });

    function actualizarTabla(categoria) {
        $.ajax({
            url: 'obtener_usuarios_por_categoria.php', // Ruta al script PHP
            type: 'POST',
            data: { categoria: categoria },
            success: function(response) {
                $('.table-container').html(response); // Actualiza el contenedor de la tabla
            },
            error: function(xhr, status, error) {
                console.error("Error al actualizar la tabla: " + error);
            }
        });
    }

    //Actualizar la tabla al cargar la página.
    document.addEventListener("DOMContentLoaded", function () {
    const filtros = document.querySelectorAll("#filtros select, #filtros input"); // Captura los select e inputs del formulario
    const tablaCuerpo = document.querySelector("#tablaRegistros tbody");

    filtros.forEach(filtro => {
        filtro.addEventListener("change", function () {
            actualizarTabla();
        });
    });

    function actualizarTabla() {
        // Obtener datos del formulario
        const formData = new FormData(document.querySelector("#filtros"));

        fetch("procesar_filtros.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())  // Convertir la respuesta en texto
        .then(data => {
            tablaCuerpo.innerHTML = data; // Reemplazar el contenido de la tabla
        })
        .catch(error => console.error("Error al cargar los datos:", error));
    }
});

});
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</body>
</html>