<?php
error_log("Inicio de generar_excel.php");

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

include 'abrir_conexion.php';

if ($conn->connect_error) {
    error_log("Error de conexión a la base de datos: " . $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT u.idUsuario, u.nombre, u.apellido1, u.apellido2, u.email, u.dni, u.telefono, u.comentario, u.usuarioActivo, u.categoria, a.curso, p.area, p.etapa FROM usuario u LEFT JOIN alumno a ON u.idUsuario = a.idUsuario LEFT JOIN profesor p ON u.idUsuario = p.idUsuario LEFT JOIN monitor m ON u.idUsuario = m.idUsuario LEFT JOIN practica pr ON u.idUsuario = pr.idUsuario LEFT JOIN pas pa ON u.idUsuario = pa.idUsuario;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    error_log("Se encontraron resultados: " . $result->num_rows);
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $headers = array_keys($result->fetch_assoc());
    $result->data_seek(0);

    for ($i = 0; $i < count($headers); $i++) {
        $sheet->setCellValueByColumnAndRow($i + 1, 1, $headers[$i]);
    }

    $rowIndex = 2;
    while ($row = $result->fetch_assoc()) {
        $colIndex = 1;
        foreach ($row as $value) {
            $sheet->setCellValueByColumnAndRow($colIndex, $rowIndex, $value);
            $colIndex++;
        }
        $rowIndex++;
    }

    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="usuarios.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    error_log("Excel generado y enviado.");
} else {
    error_log("No se encontraron resultados en la consulta.");
    echo "No se encontraron resultados.";
}

$conn->close();
error_log("Fin de generar_excel.php");
?>