<?php
require_once("Autoload.php");

class Pedidos extends Conexion
{
    private $intIdPedido;
    private $strCategoria;
    private $intNlote;
    private $floatPeso;
    private $datetimeFechaEntrega;
    private $intIdUsuario;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function insertPedido(string $categoria, int $nlote, float $peso, int $idUsuario)
    {
        try {
            $this->strCategoria = $categoria;
            $this->intNlote = $nlote;
            $this->floatPeso = $peso;
            $this->intIdUsuario = $idUsuario;

            $sql = "INSERT INTO pedidos(categoria, nlote, peso, idUsuario) 
                    VALUES (:categoria, :nlote, :peso, :idUsuario)";
            $insert = $this->conexion->prepare($sql);

            // Array con los datos a insertar
            $arrData = array(
                ":categoria" => $this->strCategoria,
                ":nlote" => $this->intNlote,
                ":peso" => $this->floatPeso,
                ":idUsuario" => $this->intIdUsuario
            );

            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            $insert->closeCursor();
            return $idInsert;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getPedidos()
{
    try {
        $sql = "SELECT p.*, u.nombre AS nombre_usuario, u.email AS email_usuario 
                FROM pedidos p
                INNER JOIN usuario u ON p.idUsuario = u.idUsuario"; // Realiza el JOIN con la tabla usuarios
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchAll(PDO::FETCH_CLASS);
        $execute->closeCursor();
        return $request;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


    public function updatePedido(int $idPedido, string $categoria, int $nlote, float $peso, int $idUsuario)
    {
        try {
            $this->intIdPedido = $idPedido;
            $this->strCategoria = $categoria;
            $this->intNlote = $nlote;
            $this->floatPeso = $peso;
            $this->intIdUsuario = $idUsuario;

            $sql = "UPDATE pedidos 
                    SET categoria = :categoria, nlote = :nlote, peso = :peso, idUsuario = :idUsuario
                    WHERE idPedido = :idPedido";
            $update = $this->conexion->prepare($sql);

            $arrayData = array(
                ":categoria" => $this->strCategoria,
                ":nlote" => $this->intNlote,
                ":peso" => $this->floatPeso,
                ":idUsuario" => $this->intIdUsuario,
                ":idPedido" => $this->intIdPedido
            );

            $resUpdate = $update->execute($arrayData);
            $update->closeCursor();
            return $resUpdate;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
