<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Categorías</title>
</head>
<body>

    <h2>Selecciona una Categoría</h2>

    <form method="POST" action="procesar_formulario.php">
        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria">
            <option value="Pas">PAS</option>
            <option value="Monitor">Monitor</option>
            <option value="Alumno">Alumno</option>
            <option value="Profesor">Profesor</option>
            <option value="Practica">Prácticas</option>
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>

</body>
</html>
