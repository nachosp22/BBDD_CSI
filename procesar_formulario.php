<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la categoría seleccionada
    $categoria = $_POST['categoria'];
    
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

    // Consulta SQL para obtener usuarios según la categoría seleccionada
    $sql = "SELECT nombre, apellido1, apellido2 FROM usuario WHERE categoria = '$categoria'";
    
    // Ejecutar la consulta
    $result = $conn->query($sql);

    // Inicializar la variable para almacenar los resultados
    $usuarios = [];

    // Almacenar los resultados en la variable si hay filas
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $usuarios[] = $row; // Añadir cada fila al array
        }
    }

    // Cerrar la conexión
    $conn->close();

    // Mostrar los resultados en un párrafo o procesarlos como prefieras
    if (count($usuarios) > 0) {
        echo "<h3>Resultados para la categoría '$categoria':</h3>";
        echo "<ul>";
        foreach ($usuarios as $usuario) {
            echo "<li>" . $usuario["nombre"] . " " . $usuario["apellido1"] . " " . $usuario["apellido2"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No se encontraron resultados para la categoría '$categoria'.</p>";
    }
}
?>
