<?php
include('abrir_conexion.php');

if (isset($_POST['idUsuario'])) {
    $idUsuario = $_POST['idUsuario'];

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
        $nombre = $row['nombre'];
        $apellido1 = $row['apellido1'];
        $apellido2 = $row['apellido2'];
        $email = $row['email'];
        $dni = $row['dni'];
        $telefono = $row['telefono'];
        $comentario = $row['comentario'];
        $categoria = $row['categoria'];
        $curso = $row['curso'];
        $departamento = $row['departamento'];
        $etapa = $row['etapa'];

        // Generar el formulario HTML aquí
        echo "<form action='editar_usuario.php' method='POST'>";
        echo "<input type='hidden' name='idUsuario' value='" . $idUsuario . "'>";
        // ... (resto del formulario HTML, usando las variables $nombre, $apellido1, etc.)

        echo "<div class='mb-3'>
            <label class='form-label'>ID Usuario</label>
            <input type='text' class='form-control' value='" . $idUsuario . "' readonly>
        </div>"; // Campo ID de usuario (solo lectura)

        echo "<div class='mb-3'>
            <label for='nombre' class='form-label'>Nombre</label>
            <input type='text' class='form-control' id='nombre' name='nombre' value='" . $nombre . "' required>
        </div>
        <div class='mb-3'>
            <label for='apellido1' class='form-label'>Primer Apellido</label>
            <input type='text' class='form-control' id='apellido1' name='apellido1' value='" . $apellido1 . "' required>
        </div>
        <div class='mb-3'>
            <label for='apellido2' class='form-label'>Segundo Apellido</label>
            <input type='text' class='form-control' id='apellido2' name='apellido2' value='" . $apellido2 . "' required>
        </div>
        <div class='mb-3'>
            <label for='email' class='form-label'>Email</label>
            <input type='email' class='form-control' id='email' name='email' value='" . $email . "' required>
        </div>
        <div class='mb-3'>
            <label for='dni' class='form-label'>DNI</label>
            <input type='text' class='form-control' id='dni' name='dni' value='" . $dni . "' required>
        </div>
        <div class='mb-3'>
            <label for='telefono' class='form-label'>Teléfono</label>
            <input type='text' class='form-control' id='telefono' name='telefono' value='" . $telefono . "'>
        </div>
        <div class='mb-3'>
            <label for='comentario' class='form-label'>Comentario</label>
            <textarea class='form-control' id='comentario' name='comentario' rows='3'>" . $comentario . "</textarea>
        </div>

        <div class='mb-3'>
            <label class='form-label'>Categoría</label>
            <input type='text' class='form-control' value='" . $categoria . "' readonly>
        </div>"; // Campo categoría (solo lectura)


        if ($categoria == 'Alumno') {
            echo "<div class='mb-3'>
                <label for='curso' class='form-label'>Curso</label>
                <input type='text' class='form-control' id='curso' name='curso' value='" . $curso . "'>
            </div>";
        } elseif ($categoria == 'Profesor') {
            echo "<div class='mb-3'>
                <label for='departamento' class='form-label'>Departamento</label>
                <input type='text' class='form-control' id='departamento' name='departamento' value='" . $departamento . "'>
            </div>
            <div class='mb-3'>
                <label for='etapa' class='form-label'>Etapa</label>
                <input type='text' class='form-control' id='etapa' name='etapa' value='" . $etapa . "'>
            </div>";
        }

        echo "<button type='submit' class='btn btn-primary' name='guardar'>Guardar Cambios</button>";
        echo "</form>";

    } else {
        echo "Error: Usuario no encontrado.";
    }
}
$conn->close();

?>