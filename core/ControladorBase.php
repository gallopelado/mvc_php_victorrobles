<?php
class ControladorBase{
    public function __construct() {
        require_once 'EntidadBase.php';
        require_once 'ModeloBase.php';
        /*
         * La función glob() busca todos los nombres de ruta que coinciden con pattern 
         * según las reglas usadas por la función glob() de la biblioteca estándar de C, 
         * las cuales son similares a las reglas usadas por intérpretes de comandos comunes. 
         * 
         */
        foreach (glob("model/*.php") as $file){
            require_once $file;
        }
    }
    
    public function view($vista, $datos){
        foreach ($datos  as $id_assoc => $valor){
            ${$id_assoc} = $valor;
        }
        
        require_once 'core/AyudaVistas.php';
        $helper =  new AyudaVistas();
        
        require_once 'view/'.$vista.'View.php';
    }
    
    public function redirect($controlador=CONTROLADOR_DEFECTO, $accion=ACCION_DEFECTO){
        header("Location:index.php?controller=".$controlador."&action=".$accion);
    }
}
?>

