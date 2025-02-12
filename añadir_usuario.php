<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <h2>Registro de Usuario</h2>
    
    <form method="POST" action="registro_usuario.php">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Primer Apellido:</label>
        <input type="text" name="apellido1" required>

        <label>Segundo Apellido:</label>
        <input type="text" name="apellido2">

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>DNI:</label>
        <input type="text" name="dni" required>

        <label>Teléfono:</label>
        <input type="text" name="telefono">

        <label>Comentario:</label>
        <textarea name="comentario"></textarea>

        <label>Usuario Activo:</label>
        <select name="usuarioActivo">
            <option value="Activo" selected>Sí</option>
            <option value="Inactivo">No</option>
        </select>

        <label>Categoría:</label>
        <select name="categoria" id="categoria" onchange="mostrarCampos()">
            <option value="" selected disabled>Seleccione una categoría</option>
            <option value="Alumno">Alumno</option>
            <option value="Profesor">Profesor</option>
            <option value="Pas">PAS</option>
            <option value="Monitor">Monitor</option>
            <option value="Practicas">Prácticas</option>
        </select>

        <!-- Campos especificos de la categoria -->
        <div id="camposAlumno" class="hidden">
            <label>Curso:</label>
            <input type="text" name="curso">
        </div>

        <div id="camposProfesor" class="hidden">
            <label>Departamento:</label>
            <input type="text" name="departamento">
            
            <label>Etapa:</label>
            <input type="text" name="etapa">
        </div>

        <button type="submit">Registrar</button>
    </form>

    <script>
        /* Script para cambiar los campos especificos de la categoria */
        function mostrarCampos() {
            let categoria = document.getElementById("categoria").value;

            document.getElementById("camposAlumno").style.display = categoria == "Alumno" ? "block" : "none";
            document.getElementById("camposProfesor").style.display = categoria == "Profesor" ? "block" : "none";
        }
    </script>

</body>
</html>
