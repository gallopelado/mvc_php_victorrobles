<?php

class Conectar {

    private $driver, $host, $user, $pass, $database, $puerto;

    public function __construct() {
        $db_cfg = require_once 'config/database.php';
        $this->driver = $db_cfg['driver'];
        $this->host = $db_cfg['host'];
        $this->user = $db_cfg['usuario'];
        $this->pass = $db_cfg['clave'];
        $this->database = $db_cfg['nombreBD'];
        $this->puerto = $db_cfg['puerto'];
    }

    public function conexion() {
        if ($this->database == "postgresql" || $this->driver == null) {
            $con = new PDO("pgsql:host=$this->host;port=$this->puerto;dbname=$this->database;user=$this->user;password=$this->pass");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $con;
    }

    // OTROS METODOS PARA CARGAR QUERY BUILDERS U ORMS, ETC. 
}
?>

