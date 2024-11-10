<?php
require_once("Autoload.php");

// Instanciamos la clase Usuario para manejar operaciones de usuario
$objUsuario = new Usuario();

// Obtenemos todos los usuarios y los mostramos
$usuario = $objUsuario->getUsuario();
print_r("<pre>");
print_r($usuario);
print_r("<pre>");

// Instanciamos la clase Pedidos para manejar operaciones de pedidos
$objPedidos = new Pedidos();

// Obtenemos todos los pedidos y los mostramos
$pedidos = $objPedidos->getPedidos();
print_r("<pre>");
foreach ($pedidos as $pedido) {
    echo "ID Pedido: " . $pedido->idPedido . "<br>";
    echo "Categoría: " . $pedido->categoria . "<br>";
    echo "N° Lote: " . $pedido->nlote . "<br>";
    echo "Peso: " . $pedido->peso . " kg<br>";
    echo "ID Usuario: " . $pedido->idUsuario . "<br>";
    echo "Nombre Usuario: " . $pedido->nombre_usuario . "<br>"; // Muestra el nombre del usuario asociado
    echo "Email Usuario: " . $pedido->email_usuario . "<br><br>"; // Muestra el email del usuario asociado
}
print_r("<pre>");
