<?php
require_once("Autoload.php");
class Usuario extends Conexion
{
    private $strNombre;
    private $intId;
    private $intTelefono;
    private $strEmail;
    private $strDireccion;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function insertUsuario(string $nombre, int $telefono, string $email, string $direccion)
    {
        try {
            $this->strNombre = $nombre;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->strDireccion = $direccion;

            $sql = "INSERT INTO usuario(nombre, telefono, email, direccion) 
                    VALUES (:nom, :tel, :email, :dir)";
            $insert = $this->conexion->prepare($sql);

            // Array to pass parameters
            $arrData = array(
                ":nom" => $this->strNombre,
                ":tel" => $this->intTelefono,
                ":email" => $this->strEmail,
                ":dir" => $this->strDireccion
            );

            $resInsert = $insert->execute($arrData);
            $idInsert = $this->conexion->lastInsertId();
            $insert->closeCursor();
            return $idInsert;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUsuario()
    {
        try {
            $sql = "SELECT * FROM usuario";
            //conj la variable execute a generar la conexion
            $execute = $this->conexion->query($sql);
            $request = $execute->fetchall(PDO::FETCH_CLASS);
            $execute->closeCursor();
            return $request;
        } catch (Exception $e) {
            echo "error: " . $e->getMessage();
        }
    }
    public function leerWebService()
    {
        try {
            $url = 'http://localhost/servi/servicio_web.php';
            $json = file_get_contents($url);
            $datos = json_decode($json);
            return $datos;
        } catch (Exception $e) {
            echo "Error al leer el servicio web: " . $e->getMessage();
        }
    }

    public function updateUsuario(int $id, string $nombre, int $telefono, string $email, string $direccion)
    {
        try {
            $this->intId = $id;
            $this->strNombre = $nombre;
            $this->intTelefono = $telefono;
            $this->strEmail = $email;
            $this->strDireccion = $direccion;

            $sql = "UPDATE usuario
                SET nombre = :nom, telefono = :tel, email = :email, direccion = :dir
                WHERE idUsuario = :id";
            $update = $this->conexion->prepare($sql);
            $arrayData = array(
                ":nom" => $this->strNombre,
                ":tel" => $this->intTelefono,
                ":email" => $this->strEmail,
                ":dir" => $this->strDireccion,
                ":id" => $this->intId
            );
            $resUpdate = $update->execute($arrayData);
            $update->closeCursor();
            return $resUpdate;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}
