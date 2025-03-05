<?php
$servername = "ip server"; 
$username = "usuario"; 
$password = "contraseña";
$dbname = "nombre bbdd";

// Habilitar reportes de error en mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8"); // Asegurar compatibilidad con caracteres especiales
} catch (mysqli_sql_exception $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
