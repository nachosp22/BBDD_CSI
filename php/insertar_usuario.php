<?php
include 'abrir_conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica que se haya enviado el formulario por POST

    // Recibir datos del formulario (y validarlos/sanitizarlos - ¡MUY IMPORTANTE!)
    $nombre = trim($_POST["nombre"]);
    $apellido1 = trim($_POST["apellido1"]);
    $apellido2 = trim($_POST["apellido2"]);
    $email = trim($_POST["email"]); // Validar formato de email
    $dni = trim($_POST["dni"]); // Validar formato de DNI
    $telefono = trim($_POST["telefono"]);
    $comentario = trim($_POST["comentario"]);
    $usuarioActivo = $_POST["usuarioActivo"];
    $categoria = $_POST["categoria"];

    // ... (Añade validación y sanitización completa de todos los campos) ...

    try {
        // 1. Insertar en la tabla usuario
        $stmtUsuario = $conn->prepare("INSERT INTO usuario (nombre, apellido1, apellido2, email, dni, telefono, comentario, usuarioActivo, categoria) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmtUsuario->bind_param("sssssssss", $nombre, $apellido1, $apellido2, $email, $dni, $telefono, $comentario, $usuarioActivo, $categoria);

        if ($stmtUsuario->execute()) {
            $idUsuario = $conn->insert_id; // Obtener el ID del usuario insertado

            // 2. Insertar en la tabla correspondiente según la categoría
            switch ($categoria) {
                case "Alumno":
                    $curso = trim($_POST["curso"]); // Validar y sanitizar
                    $stmtAlumno = $conn->prepare("INSERT INTO alumno (idUsuario, curso) VALUES (?, ?)");
                    $stmtAlumno->bind_param("is", $idUsuario, $curso);
                    $stmtAlumno->execute();
                    $stmtAlumno->close();
                    break;
                case "Profesor":
                    $departamento = trim($_POST["departamento"]); // Validar y sanitizar
                    $etapa = trim($_POST["etapa"]); // Validar y sanitizar
                    $stmtProfesor = $conn->prepare("INSERT INTO profesor (idUsuario, departamento, etapa) VALUES (?, ?, ?)");
                    $stmtProfesor->bind_param("iss", $idUsuario, $departamento, $etapa);
                    $stmtProfesor->execute();
                    $stmtProfesor->close();
                    break;
                case "Pas":
                    $stmtPas = $conn->prepare("INSERT INTO pas (idUsuario) VALUES (?)");
                    $stmtPas->bind_param("i", $idUsuario);
                    $stmtPas->execute();
                    $stmtPas->close();
                    break;
                case "Monitor":
                    $stmtMonitor = $conn->prepare("INSERT INTO monitor (idUsuario) VALUES (?)");
                    $stmtMonitor->bind_param("i", $idUsuario);
                    $stmtMonitor->execute();
                    $stmtMonitor->close();
                    break;
                case "Practicas":
                    $stmtPracticas = $conn->prepare("INSERT INTO practica (idUsuario) VALUES (?)");
                    $stmtPracticas->bind_param("i", $idUsuario);
                    $stmtPracticas->execute();
                    $stmtPracticas->close();
                    break;
            }

            // 3. Insertar en la tabla acceso (si es necesario)
            // ... (código para insertar en la tabla acceso) ...

            echo "Usuario registrado correctamente.";
            header("Location: index.php?mensaje=Usuario registrado correctamente");
            exit();

        } else {
            echo "Error al registrar usuario: " . $stmtUsuario->error;
        }

        $stmtUsuario->close();

    } catch (Exception $e) {
        echo "Error general: " . $e->getMessage();
        // Log del error para depuración
        error_log($e->getMessage());
    }

}

$conn->close();
?>
