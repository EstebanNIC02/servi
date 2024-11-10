<?php
require_once("Autoload.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];

    $objUsuario = new Usuario();
    $insert = $objUsuario->insertUsuario($nombre, $telefono, $email, $direccion);

    if ($insert) {
        echo "Usuario registrado con éxito. ID: " . $insert;
    } else {
        echo "Error al registrar el usuario.";
    }
}
?>
