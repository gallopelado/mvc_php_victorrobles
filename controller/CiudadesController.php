<?php
class CiudadesController extends ControladorBase{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $ciudad = new Ciudades();
        
        $allciudades = $ciudad->getAll();
        
        $this->view("index", array(
            "allciudades" => $allciudades,
            "Hola" => "Video EJEMPLO MVC PHP"
        ));
    }
    
    public function crear(){
        if(isset($_POST['descripcion'])){
            $ciudad = new Ciudades();
            
            $descripcion = $_POST['descripcion'];
            
            $ciudad->setDescripcion($descripcion);
            
            $save = $ciudad->save();
        }
        
        $this->redirect("Ciudades", "index");
    }
    
    public function borrar(){
        if(isset($_GET['id'])){
            $id = (int)$_GET["id"];
            
            $ciudad = new Ciudades();
            $ciudad->deleteById($id);
            
            $this->redirect();
        }
    }
}
?>
