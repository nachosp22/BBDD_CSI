<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "colegio");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Definir cuántos registros mostrar por página
$registros_por_pagina = 10;

// Obtener la página actual desde la solicitud AJAX
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$pagina_actual = max(1, $pagina_actual); // Asegurarse de que la página sea válida

// Calcular el índice del primer registro de la página actual
$offset = ($pagina_actual - 1) * $registros_por_pagina;

// Consulta para obtener los registros de la tabla alumnos junto con los datos de la tabla usuario
$sql = "SELECT a.idAlumno, u.nombre, u.apellido1, u.apellido2, a.curso 
        FROM alumno a
        JOIN usuario u ON a.idUsuario = u.idUsuario
        LIMIT $offset, $registros_por_pagina";

$result = $conn->query($sql);

// Inicializar variables
$alumnos_html = '';
$paginacion_html = '';

// Construir los resultados de la tabla de alumnos
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $alumnos_html .= "<tr>
            <td>" . $row['idAlumno'] . "</td>
            <td>" . $row['nombre'] . " " . $row['apellido1'] . " " . $row['apellido2'] . "</td>
            <td>" . $row['curso'] . "</td>
            <td>
                <button class='btn btn-info btn-sm' data-bs-toggle='modal' data-bs-target='#editAlumnoModal' data-id='" . $row['idAlumno'] . "'>Editar</button>
                <a href='delete_alumno.php?id=" . $row['idAlumno'] . "' class='btn btn-danger btn-sm'>Eliminar</a>
            </td>
        </tr>";
    }
}

// Calcular el número total de registros para la paginación
$sql_total = "SELECT COUNT(*) as total FROM alumno";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_registros = $row_total['total'];
$total_paginas = ceil($total_registros / $registros_por_pagina);

// Crear los enlaces de paginación
$paginacion_html .= '<ul class="pagination">';
for ($i = 1; $i <= $total_paginas; $i++) {
    $active = ($i == $pagina_actual) ? "active" : "";
    $paginacion_html .= "<li class='page-item $active'><a class='page-link' href='#' data-pagina='$i'>$i</a></li>";
}
$paginacion_html .= '</ul>';

// Devolver los resultados como JSON
echo json_encode([
    'alumnos' => $alumnos_html,
    'paginacion' => $paginacion_html
]);

$conn->close();
?>
