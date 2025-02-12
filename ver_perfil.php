<?php
// Incluir la conexión a la base de datos
include 'abrir_conexion.php'; 

// Comprobar si se ha pasado el ID del usuario
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Consulta para obtener los datos completos del usuario
    $sql = "SELECT u.idUsuario, u.nombre, u.apellido1, u.apellido2, u.email, u.categoria,
                   a.curso, p.departamento, p.etapa, m.idMonitor, pr.idPractica, pa.idPas
            FROM usuario u
            LEFT JOIN alumno a ON u.idUsuario = a.idUsuario
            LEFT JOIN profesor p ON u.idUsuario = p.idUsuario
            LEFT JOIN monitor m ON u.idUsuario = m.idUsuario
            LEFT JOIN practica pr ON u.idUsuario = pr.idUsuario
            LEFT JOIN pas pa ON u.idUsuario = pa.idPas
            WHERE u.idUsuario = $idUsuario";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $row = $result->fetch_assoc();
        $nombreCompleto = $row["nombre"] . " " . $row["apellido1"] . " " . $row["apellido2"];
        $email = $row["email"];
        $categoria = $row["categoria"];
        $curso = $row["curso"];
        $departamento = $row["departamento"];
        $etapa = $row["etapa"];

        // Mostrar los datos del perfil
        echo "<h2>Perfil de Usuario</h2>";
        echo "<p><strong>Nombre:</strong> $nombreCompleto</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Categoría:</strong> $categoria</p>";

        // Mostrar solo los campos disponibles (alumno, profesor, etc.)
        if ($curso) {
            echo "<p><strong>Curso:</strong> $curso</p>";
        }
        if ($departamento) {
            echo "<p><strong>Departamento:</strong> $departamento</p>";
        }
        if ($etapa) {
            echo "<p><strong>Etapa:</strong> $etapa</p>";
        }

        // Agregar cualquier otra información adicional que desees mostrar
    } else {
        echo "<p>No se encontró el perfil de este usuario.</p>";
    }
} else {
    echo "<p>No se ha especificado un usuario.</p>";
}

$conn->close();
?>