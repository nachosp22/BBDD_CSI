<?php
session_start(); 

require 'abrir_conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT idAcceso, contraseña, rol FROM acceso WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($idAcceso, $hashedPassword, $rol);
    
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        
        if (password_verify($contraseña, $hashedPassword)) {

            $_SESSION['idAcceso'] = $idAcceso;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $rol;
            
            header("Location: index.php");
            exit();
        } else {

            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
    $stmt->close();
    $conn->close();
}
?>
