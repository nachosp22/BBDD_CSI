<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "colegio");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario a eliminar desde la solicitud
$idUsuario = $_GET['id'];

// Eliminar el registro de la tabla usuario (esto eliminará también los registros en la tabla alumno gracias al ON DELETE CASCADE)
$sql = "DELETE FROM usuario WHERE idUsuario = $idUsuario";
if ($conn->query($sql) === TRUE) {
    echo "Usuario y registros relacionados eliminados correctamente.";
} else {
    echo "Error al eliminar usuario: " . $conn->error;
}

$conn->close();
?>
