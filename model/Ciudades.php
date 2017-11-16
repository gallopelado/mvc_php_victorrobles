<?php
class Ciudades extends EntidadBase{
    private $id, $descripcion;
    
    public function __construct($table) {
        $table = "ciudades";
        parent::__construct($table);
    }
    
    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function save(){
        $query = "INSERT INTO public.ciudades(id, ciu_descri)VALUES (NULL, ?)";
        $save = $this->db()->prepare($query);
        $save->execute(array($this->descripcion));
        return $save;
    }
}
?>
