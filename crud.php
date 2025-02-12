<?php
// Incluir la conexión a la base de datos
include 'abrir_conexion.php';

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL ajustada para obtener los datos de usuario y sus campos relacionados con las categorías
$sql = "
SELECT u.idUsuario, u.nombre, u.apellido1, u.apellido2, u.email, u.categoria,
       a.curso, p.departamento, p.etapa, m.idMonitor, pr.idPractica, pa.idPas
FROM usuario u
LEFT JOIN alumno a ON u.idUsuario = a.idUsuario
LEFT JOIN profesor p ON u.idUsuario = p.idUsuario
LEFT JOIN monitor m ON u.idUsuario = m.idUsuario
LEFT JOIN practica pr ON u.idUsuario = pr.idUsuario
LEFT JOIN pas pa ON u.idUsuario = pa.idPas";  // Asegúrate de que la tabla "pas" esté unida correctamente

$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Asegurarse de que Bootstrap está cargado
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">';

    // Mostrar los resultados en un formato de tabla
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>ID Usuario</th><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Categoría</th><th>Acciones</th></tr></thead><tbody>";
    
    // Recorrer los registros y mostrarlos
    while($row = $result->fetch_assoc()) {
        $idUsuario = htmlspecialchars($row["idUsuario"]);
        $nombre = htmlspecialchars($row["nombre"]);
        $apellidos = htmlspecialchars($row["apellido1"] . " " . $row["apellido2"]);
        $email = htmlspecialchars($row["email"]);
        $categoria = htmlspecialchars($row["categoria"]);
        
        // Mostrar los campos en la tabla
        echo "<tr>
                <td>" . $idUsuario . "</td>
                <td>" . $nombre . "</td>
                <td>" . $apellidos . "</td>
                <td>" . $email . "</td>
                <td>" . $categoria . "</td>
                <td>
                    <a href='ver_perfil.php?id=$idUsuario' class='btn btn-success btn-sm'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                            <path d='M16 8s-3 4-8 4-8-4-8-4 3-4 8-4 8 4 8 4z'/>
                            <path d='M8 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4z'/>
                        </svg> Ver Perfil
                    </a> |
                    <a href='editar_usuario.php?id=$idUsuario' class='btn btn-warning btn-sm'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                            <path d='M12.146 0.854a2 2 0 0 1 2.828 2.828l-8 8a2 2 0 0 1-1.072.52l-4 1a1 1 0 0 1-1.224-1.224l1-4a2 2 0 0 1 .52-1.072l8-8a2 2 0 0 1 2.828 0z'/>
                        </svg> Editar
                    </a> |
                    <a href='borrar_usuario.php?id=$idUsuario' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Seguro que deseas borrar este usuario?\")'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                            <path d='M2.146 2.146a1 1 0 0 1 1.414 0L8 6.586l4.44-4.44a1 1 0 1 1 1.42 1.42L9.414 8l4.44 4.44a1 1 0 1 1-1.42 1.42L8 9.414l-4.44 4.44a1 1 0 1 1-1.414-1.414L6.586 8 2.146 3.56a1 1 0 0 1 0-1.414z'/>
                        </svg> Borrar
                    </a>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No se encontraron resultados.";
}

$conn->close();
?>