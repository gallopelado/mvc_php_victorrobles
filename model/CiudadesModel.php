<?php
class CiudadesModel extends ModeloBase{
    private $table;
    
    public function __construct($table) {
        $this->table = "ciudades";
        parent::__construct($this->table);
    }
    
    public function getUnUsuario(){
        $query = "SELECT * FROM ciudades WHERE ciu_descri='CAPIATA'";
        $ciudad = $this->ejecutarSql($query);
        return $ciudad;
    }
}
?>

