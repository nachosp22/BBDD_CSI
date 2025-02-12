<?php
// Incluir el archivo de conexión
include('abrir_conexion.php');

// Realizar la consulta con JOIN para obtener los datos de las categorías
$sql = "
SELECT u.idUsuario, u.nombre, u.apellido1, u.apellido2, u.email, u.dni, u.telefono, u.categoria, 
       a.curso, p.departamento, p.etapa, m.idMonitor, pr.idPractica
FROM usuario u
LEFT JOIN alumno a ON u.idUsuario = a.idUsuario
LEFT JOIN profesor p ON u.idUsuario = p.idUsuario
LEFT JOIN monitor m ON u.idUsuario = m.idUsuario
LEFT JOIN practica pr ON u.idUsuario = pr.idUsuario
";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los resultados en un formato de tabla
    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Apellido</th><th>Email</th><th>DNI</th><th>Teléfono</th><th>Categoría</th><th>Curso</th><th>Departamento</th><th>Etapa</th><th>Acciones</th></tr>";
    
    // Recorrer los registros y mostrarlos
    while($row = $result->fetch_assoc()) {
        $idUsuario = $row["idUsuario"];
        echo "<tr>
                <td>" . $row["nombre"]. "</td>
                <td>" . $row["apellido1"]. " " . $row["apellido2"]. "</td>
                <td>" . $row["email"]. "</td>
                <td>" . $row["categoria"]. "</td>
                <td>
                    <a href='ver_perfil.php?id=$idUsuario'>Ver Perfil</a> |
                    <a href='editar_usuario.php?id=$idUsuario'>Editar</a> |
                    <a href='borrar_usuario.php?id=$idUsuario' onclick='return confirm(\"¿Seguro que deseas borrar este usuario?\")'>Borrar</a>
                </td>
              </tr>";
    }
    
    echo "</table>";
} else {
    echo "No se encontraron registros";
}

// Cerrar la conexión
$conn->close();
?>