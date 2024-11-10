<?php
require_once("Autoload.php");

$objUsuario = new Usuario();
$usuarios = $objUsuario->leerWebService();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
</head>
<body>
    <h1>Usuarios Registrados</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Fecha de Registro</th>
            <th>Status</th>
        </tr>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario->idUsuario; ?></td>
                    <td><?= $usuario->nombre; ?></td>
                    <td><?= $usuario->telefono; ?></td>
                    <td><?= $usuario->email; ?></td>
                    <td><?= $usuario->direccion; ?></td>
                    <td><?= $usuario->fecharegistro; ?></td>
                    <td><?= $usuario->status; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No hay usuarios registrados.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
