<?php
require('abrir_conexion.php');

$tipo       = $_FILES['csv_file']['type'];
$tamanio    = $_FILES['csv_file']['size'];
$archivotmp = $_FILES['csv_file']['tmp_name'];

if ($_FILES['csv_file']['error'] !== UPLOAD_ERR_OK) {
    $mensaje = "Error al subir el archivo. Código de error: " . $_FILES['csv_file']['error'];
    $tipo_mensaje = "error";
} elseif (!file_exists($archivotmp) || filesize($archivotmp) == 0) {
    $mensaje = "El archivo está vacío o no se encuentra.";
    $tipo_mensaje = "error";
} else {
    $lineas = file($archivotmp);
    if (count($lineas) < 2) {
        $mensaje = "El archivo no tiene suficientes datos.";
        $tipo_mensaje = "error";
    } else {
        $cabecera = str_getcsv(trim($lineas[0]), ";");

        // Buscar índices de las columnas
        $pos_nombre  = array_search('NOMBRE', $cabecera);
        $pos_apellido1  = array_search('APELLIDO1', $cabecera);
        $pos_apellido2 = array_search('APELLIDO2', $cabecera);
        $pos_email = array_search('EMAIL', $cabecera);
        $pos_dni = array_search('DNI', $cabecera);
        $pos_telefono = array_search('TELEFONO', $cabecera);
        $pos_categoria = array_search('CATEGORIA', $cabecera);
        $pos_curso = array_search('CURSO', $cabecera);

        if ($pos_nombre === false || $pos_apellido1 === false || $pos_apellido2 === false || 
            $pos_email === false || $pos_dni === false || $pos_telefono === false || $pos_categoria === false) {
            $mensaje = "Error: El archivo CSV no contiene las columnas esperadas.";
            $tipo_mensaje = "error";
        } else {
            $mensajes = [];
            for ($i = 1; $i < count($lineas); $i++) {
                $datos = str_getcsv(trim($lineas[$i]), ";");

                // Validar que la fila tiene el número correcto de columnas
                if (count($datos) < count($cabecera)) {
                    continue;
                }

                // Extraer y limpiar los valores
                $nombre  = trim($datos[$pos_nombre] ?? '');
                $apellido1  = trim($datos[$pos_apellido1] ?? '');
                $apellido2 = trim($datos[$pos_apellido2] ?? '');
                $email = trim($datos[$pos_email] ?? '');
                $dni = trim($datos[$pos_dni] ?? '');
                $telefono = trim($datos[$pos_telefono] ?? '');
                $categoria = trim($datos[$pos_categoria] ?? '');
                $curso = $pos_curso !== false ? trim($datos[$pos_curso] ?? '') : null;

                // Validar que el DNI no esté vacío
                if (empty($dni)) {
                    $mensajes[] = "Fila $i-1 omitida: DNI vacío.";
                    continue;
                }

                // Verificar si el usuario ya está registrado (por DNI o EMAIL)
                $check_query = "SELECT idUsuario FROM usuario WHERE dni = ? OR email = ?";
                $stmt = $conn->prepare($check_query);
                $stmt->bind_param("ss", $dni, $email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $stmt->close();
                    $mensajes[] = "El usuario con DNI: $dni o EMAIL: $email ya está registrado.";
                    continue;
                }
                $stmt->close();

                // Insertar usuario en la tabla usuario
                $insert_query = "INSERT INTO usuario (nombre, apellido1, apellido2, email, dni, telefono, categoria) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insert_query);
                $stmt->bind_param("sssssss", $nombre, $apellido1, $apellido2, $email, $dni, $telefono, $categoria);
                $stmt->execute();
                
                // Obtener el ID del usuario recién insertado
                $idUsuario = $stmt->insert_id;
                $stmt->close();
                
                $mensajes[] = "Usuario registrado: $nombre $apellido1 $apellido2 (DNI: $dni).";

                // Insertar en la tabla alumno si es necesario
                if (strtolower($categoria) === "alumno" && !empty($curso)) {
                    $insert_alumno = "INSERT INTO alumno (idUsuario, curso) VALUES (?, ?)";
                    $stmt = $conn->prepare($insert_alumno);
                    $stmt->bind_param("is", $idUsuario, $curso);
                    $stmt->execute();
                    $stmt->close();
                    $mensajes[] = "Alumno registrado con ID: $idUsuario y curso: $curso.";
                }
            }
            $mensaje = "Archivo procesado correctamente.";
            $tipo_mensaje = "success";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Carga</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; }
        .container { width: 50%; margin: 50px auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .message { padding: 10px; margin-bottom: 15px; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        ul { text-align: left; padding-left: 20px; }
        .back-btn { display: inline-block; padding: 10px 15px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
        .back-btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <div class="message <?php echo $tipo_mensaje; ?>">
            <?php echo $mensaje; ?>
        </div>
        <?php if (!empty($mensajes)) { ?>
            <ul>
                <?php foreach ($mensajes as $msg) { echo "<li>$msg</li>"; } ?>
            </ul>
        <?php } ?>
        <a href="../index.php" class="back-btn">Volver</a>
    </div>
</body>
</html>