<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Usuario</title>
    <link rel="stylesheet" href="styles.css"> <!-- Opcional: para estilos -->
</head>
<body>
    <h1>Registrar Usuario</h1>
    <form action="procesar_registro.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <br><label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required><br>

        <br><label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <br><label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br>

        <br><button type="submit">Registrar</button>
    </form>
</body>
</html>
