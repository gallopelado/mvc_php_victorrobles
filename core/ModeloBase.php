<?php

class ModeloBase extends EntidadBase {

    private $table;

    public function __construct($table) {
        $this->table = (string) $table;
        parent::__construct($table);
    }

    public function ejecutarSql($query) {
        $query = $this->db()->query($query);
        
        if ($query) {
            $count = $query->rowCount();
            if ($count > 1) {
                while ($row = $query->fetchObject()) {
                    $resultSet[] = $row;
                }
            } elseif ($count == 1) {
                if ($row = $query->fetchObject()) {
                    $resultSet = $row;
                }
            } else {
                $resultSet = true;
            }
        }else{
            $resultSet = false;
        }
        return $resultSet;
    }

}
?>

