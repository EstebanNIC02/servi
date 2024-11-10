<?php
class Conexion {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "sistemas";
    private $connect;

    public function __construct() {
        try {
            $connectionString = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8";
            $this->connect = new PDO($connectionString, $this->user, $this->pass);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            $this->connect = "error de conexion";
            echo "Error: " . $e->getMessage();
        }
    }
    public function connect(){
        return $this->connect;
    }
}
?>
