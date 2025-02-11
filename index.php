<?php
// Configuración de la conexión a la base de datos
$servername = "127.0.0.1:3306"; 
$username = "u941813118_administrador"; // Tu usuario de la base de datos
$password = "8l2UEwH@m"; // Tu contraseña de la base de datos
$dbname = "u941813118_colegio"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Realizar una consulta
$sql = "SELECT nombre, apellido1, apellido2 FROM usuario"; // Cambia esta consulta a la que necesites
$result = $conn->query($sql);

// Mostrar el resultado
if ($result->num_rows > 0) {
    // Si hay resultados, los mostramos en un párrafo
    echo "<p>Usuarios:</p>";
    while($row = $result->fetch_assoc()) {
        echo "<p>" . $row["nombre"] . " " . $row["apellido1"] . " " . $row["apellido2"] . "</p>";
    }
} else {
    echo "<p>No se encontraron resultados.</p>";
}

// Cerrar la conexión
$conn->close();
?>
