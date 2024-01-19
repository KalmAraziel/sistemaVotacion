<?php 
    require_once "models/Region.php";
    class RegionController {
        
        private $region;

        public function __CONSTRUCT() {
            $this->region = new Region();
        }

        public function getRegiones() {                        
            try {               
                // Se obtienen desde la clase Region
                $regiones = $this->region->getAllRegiones();  
                print(json_encode($regiones));                           
            } catch (Exception $e) {
                // Manejo de errores
                print json_encode(['error' => true]);
            }
        }        
    }
?>