<?php 
    require_once "models/Comuna.php";
    class ComunaController {
        
        private $comuna;

        public function __CONSTRUCT() {
            $this->comuna = new Comuna();
        }

        public function Inicio() {            
            require_once "views/header.php";
            require_once "views/Comuna/Inicio.php";
            require_once "views/footer.php";

        } 
        public function getComunasByIdRegion() {
            try {               
                $idRegion = $_GET['id'];               
                // Se obtienen desde la clase Region
                $comunas = $this->comuna->getAllComunasByIdRegion($idRegion);  
                print(json_encode($comunas));                           
            } catch (Exception $e) {
                // Manejo de errores
                print json_encode(['error' => true]);
            }
        }       
    }
?>