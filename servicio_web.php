<?php
require_once("Autoload.php");
$objUsuario = new Usuario();
$usuarios = $objUsuario->getUsuario();

header('Content-Type: application/json');
echo json_encode($usuarios);
?>
