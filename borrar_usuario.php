<?php
include('abrir_conexion.php');

// Obtener el ID del usuario desde la URL
if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];

    // Empezamos la transacción para asegurar la integridad de los datos
    $conn->begin_transaction();

    try {
        // Eliminar datos de las tablas relacionadas con el usuario (alumno, profesor, monitor, practica, pas)
        $deleteAlumno = "DELETE FROM alumno WHERE idUsuario = $idUsuario";
        $deleteProfesor = "DELETE FROM profesor WHERE idUsuario = $idUsuario";
        $deleteMonitor = "DELETE FROM monitor WHERE idUsuario = $idUsuario";
        $deletePractica = "DELETE FROM practica WHERE idUsuario = $idUsuario";
        $deletePas = "DELETE FROM pas WHERE idUsuario = $idUsuario"; // Eliminación de datos de la tabla PAS

        // Ejecutamos las eliminaciones
        $conn->query($deleteAlumno);
        $conn->query($deleteProfesor);
        $conn->query($deleteMonitor);
        $conn->query($deletePractica);
        $conn->query($deletePas);  // Ejecutamos eliminación para la tabla PAS

        // Ahora eliminamos al usuario de la tabla principal
        $deleteUsuario = "DELETE FROM usuario WHERE idUsuario = $idUsuario";
        $conn->query($deleteUsuario);

        // Si todo sale bien, confirmamos la transacción
        $conn->commit();
        echo "El usuario ha sido borrado correctamente.";

    } catch (Exception $e) {
        // Si hay algún error, revertimos la transacción
        $conn->rollback();
        echo "Hubo un error al borrar el usuario: " . $e->getMessage();
    }
} else {
    echo "No se ha recibido un ID válido para borrar el usuario.";
}

// Cerrar la conexión
$conn->close();
?>
