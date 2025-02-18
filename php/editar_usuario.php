<?php
include('abrir_conexion.php');

var_dump($_POST); // Para depuración

if (isset($_POST['guardar'])) {
    if (isset($_POST['idUsuario'])) {
        $idUsuario = $_POST['idUsuario'];

        // Obtener los datos actuales del usuario (incluyendo los campos específicos)
        $stmt = $conn->prepare("SELECT u.*, a.curso, p.departamento, p.etapa FROM usuario u
            LEFT JOIN alumno a ON u.idUsuario = a.idUsuario
            LEFT JOIN profesor p ON u.idUsuario = p.idUsuario
            WHERE u.idUsuario = ?");
        $stmt->bind_param("i", $idUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        if ($row) {
            // Recibir datos del formulario (SIN ESCAPAR - SOLO PARA DEPURACIÓN)
            $nombre = $_POST['nombre'];
            $apellido1 = $_POST['apellido1'];
            $apellido2 = $_POST['apellido2'];
            $email = $_POST['email'];
            $dni = $_POST['dni'];
            $telefono = $_POST['telefono'];
            $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;
            $categoria = $_POST['categoria'];
            $usuarioActivo = isset($_POST['usuarioActivo']) ? $_POST['usuarioActivo'] : 'Inactivo';

            // Actualizar tabla usuario (SIN CONSULTAS PREPARADAS)
            $updateSql = "UPDATE usuario SET nombre = '$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', email = '$email', dni = '$dni', telefono = '$telefono', comentario = '$comentario', usuarioActivo = '$usuarioActivo' WHERE idUsuario = $idUsuario";

            if ($conn->query($updateSql)) { // Ejecutar consulta directamente
                // Actualizar tablas relacionadas (CON MANEJO DE ERRORES)
                if ($categoria == 'Alumno') {
                    $curso = isset($_POST['curso']) ? $_POST['curso'] : null; // Recuperar curso solo si es alumno
                    $updateCurso = "UPDATE alumno SET curso = '$curso' WHERE idUsuario = $idUsuario";
                    if (!$conn->query($updateCurso)) {
                        echo "Error al actualizar alumno: " . $conn->error;
                    }
                } elseif ($categoria == 'Profesor') {
                    $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : null; // Recuperar departamento solo si es profesor
                    $etapa = isset($_POST['etapa']) ? $_POST['etapa'] : null; // Recuperar etapa solo si es profesor
                    $updateProfesor = "UPDATE profesor SET departamento = '$departamento', etapa = '$etapa' WHERE idUsuario = $idUsuario";
                    if (!$conn->query($updateProfesor)) {
                        echo "Error al actualizar profesor: " . $conn->error;
                    }
                }

                echo "Datos actualizados con éxito!";
                header("Location: index.php");
                exit;
            } else {
                echo "Error al actualizar usuario: " . $conn->error; // Mostrar error específico
            }
        } else {
            echo "No se encontró el usuario.";
        }
    } else {
        echo "No se recibió el ID de usuario.";
    }
}

$conn->close();
?>