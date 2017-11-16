<?php
class EntidadBase{
    
    private $table, $db, $conectar;
    
    public function __construct($table) {
        $this->table = (string) $table;
        
        require_once 'Conectar.php';
        $this->conectar = new Conectar();
        $this->db = $this->conectar->conexion();
    }
    
    public function getConectar(){
        return $this->conectar;
    }
    
    public function db(){
        return $this->db;
    }
    
    public function getAll(){
        $query = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");
        
        while($row = $query->fetchObject()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    
    public function getById($id){
        $query = $this->db->prepare("SELECT * FROM $this->table WHERE id = ?");
        $query->execute(array($id));
        if ($row = $query->fetchObject()) {
            $resultSet = $row;
        }
        return $resultSet;
    }
    
    public function getBy($column, $value){
        $query = $this->db->prepare("SELECT * FROM $this->table WHERE :columna=':valor'");
        $query->execute(array(":columna"=>$column, ":valor"=>$value));
        while($row = $query->fetchObject()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    
    public function deleteById($id){
        $query = $this->db->prepare("DELETE FROM $this->table WHERE id = ?");
        $query->execute(array($id));
        return $query ;
    }
}
?>

