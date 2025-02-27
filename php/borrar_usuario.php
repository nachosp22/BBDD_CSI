<?php
include('abrir_conexion.php');

if (isset($_GET['id'])) {
    $idUsuario = $_GET['id'];
    $conn->begin_transaction();

    try {
        $deleteAlumno = "DELETE FROM alumno WHERE idUsuario = $idUsuario";
        $deleteProfesor = "DELETE FROM profesor WHERE idUsuario = $idUsuario";
        $deleteMonitor = "DELETE FROM monitor WHERE idUsuario = $idUsuario";
        $deletePractica = "DELETE FROM practica WHERE idUsuario = $idUsuario";
        $deletePas = "DELETE FROM pas WHERE idUsuario = $idUsuario"; 

        // Ejecutamos las eliminaciones
        $conn->query($deleteAlumno);
        $conn->query($deleteProfesor);
        $conn->query($deleteMonitor);
        $conn->query($deletePractica);
        $conn->query($deletePas); 

        // Ahora eliminamos al usuario de la tabla principal
        $deleteUsuario = "DELETE FROM usuario WHERE idUsuario = $idUsuario";
        $conn->query($deleteUsuario);
        
        $conn->commit();

        // Redirigir al index
        header("Location: ../index.php");
        exit(); 

    } catch (Exception $e) {
        $conn->rollback();
        echo "Hubo un error al borrar el usuario: " . $e->getMessage();
    }
} else {
    echo "No se ha recibido un ID válido para borrar el usuario.";
}

// Cerrar la conexión
$conn->close();
?>
