<?php
include('abrir_conexion.php');
// Obtener el ID del usuario desde la URL
$idUsuario = $_GET['id'];

// Obtener los datos actuales del usuario
$sql = "
SELECT u.*, a.curso, p.departamento, p.etapa, m.idMonitor, pr.idPractica
FROM usuario u
LEFT JOIN alumno a ON u.idUsuario = a.idUsuario
LEFT JOIN profesor p ON u.idUsuario = p.idUsuario
LEFT JOIN monitor m ON u.idUsuario = m.idUsuario
LEFT JOIN practica pr ON u.idUsuario = pr.idUsuario
WHERE u.idUsuario = $idUsuario
";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $categoria = $_POST['categoria'];
    
    // Obtener los campos específicos de la categoría
    $curso = $_POST['curso'];
    $departamento = $_POST['departamento'];
    $etapa = $_POST['etapa'];

    // Actualizar los datos en la base de datos
    $updateSql = "
    UPDATE usuario SET nombre = '$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', 
                      email = '$email', dni = '$dni', telefono = '$telefono', categoria = '$categoria' 
    WHERE idUsuario = $idUsuario";
    
    if ($conn->query($updateSql) === TRUE) {
        // Actualizar los datos de las categorías
        if ($categoria == 'Alumno') {
            $updateCurso = "UPDATE alumno SET curso = '$curso' WHERE idUsuario = $idUsuario";
            $conn->query($updateCurso);
        } elseif ($categoria == 'Profesor') {
            $updateDepartamento = "UPDATE profesor SET departamento = '$departamento', etapa = '$etapa' WHERE idUsuario = $idUsuario";
            $conn->query($updateDepartamento);
        } elseif ($categoria == 'Monitor') {
            // Actualizar campos de Monitor si es necesario
        } elseif ($categoria == 'Practicas') {
            // Actualizar campos de Practicas si es necesario
        }

        echo "Datos actualizados con éxito!";
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}

// Mostrar el formulario de edición
echo "<h1>Editar usuario</h1>";
echo "<form method='POST'>
        <label>Nombre:</label><br>
        <input type='text' name='nombre' value='" . $row['nombre'] . "' required><br><br>
        
        <label>Apellido1:</label><br>
        <input type='text' name='apellido1' value='" . $row['apellido1'] . "' required><br><br>
        
        <label>Apellido2:</label><br>
        <input type='text' name='apellido2' value='" . $row['apellido2'] . "' required><br><br>
        
        <label>Email:</label><br>
        <input type='email' name='email' value='" . $row['email'] . "' required><br><br>
        
        <label>DNI:</label><br>
        <input type='text' name='dni' value='" . $row['dni'] . "' required><br><br>
        
        <label>Teléfono:</label><br>
        <input type='text' name='telefono' value='" . $row['telefono'] . "' required><br><br>
        
        <label>Categoría:</label><br>
        <input type='text' name='categoria' value='" . $row['categoria'] . "' required><br><br>";

if ($row['categoria'] == 'Alumno') {
    echo "<label>Curso:</label><br>
          <input type='text' name='curso' value='" . $row['curso'] . "'><br><br>";
} elseif ($row['categoria'] == 'Profesor') {
    echo "<label>Departamento:</label><br>
          <input type='text' name='departamento' value='" . $row['departamento'] . "'><br><br>
          <label>Etapa:</label><br>
          <input type='text' name='etapa' value='" . $row['etapa'] . "'><br><br>";
}

// Otros campos para categorías como Monitor o Practicas se pueden añadir aquí si lo necesitas.

echo "<button type='submit'>Guardar cambios</button>
      </form>";

$conn->close();
?>
