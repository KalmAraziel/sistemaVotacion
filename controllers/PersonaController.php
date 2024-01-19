<?php
    // Modelos a Ocupar
    require_once "models/Persona.php";
    class PersonaController {

        private $persona;

        public function __CONSTRUCT() {
            $this->persona = new Persona();
        }
        
        public function totalCandidatos() {            
            try {               
                // Se obtiene desde la clase Persona
                $totalCandidatos = $this->persona->totalCandidatos();             
                // Devuelve el resultado como JSON
                print(json_encode(['totalCandidatos' => $totalCandidatos, 'error'=> false]));
            } catch (Exception $e) {
                // Manejo de errores
                print json_encode(['error' => true]);
            }
        }

        public function getAllCandidatos() {            
            try {               
                // Se obtiene desde la clase Persona
                $candidatos = $this->persona->listarCandidatos();  
                print(json_encode($candidatos));                           
            } catch (Exception $e) {
                // Manejo de errores
                print json_encode(['error' => true]);
            }
        }

        public function getVotos() {
            try {                
                $votos = $this->persona->getAllVotos();               
                //var_dump(json_encode($votos));
                print(json_encode(["votos"=>$votos, "error"=> false]));
            } catch (Exception $e) {
                print json_encode(['error' => true]);
            }                       
        }

        public function validarVoto() {            
            try {               
                $p = new Persona();
                $p->setRut($_POST['rut']);                
                $existe = $this->persona->existeUsuario($p->getRut())->Existe;
                print json_encode(['error' => false, "existe"=>$existe]);                                
            } catch (Exception $e) {
                // Manejo de errores
                print json_encode(['error' => true]);
            }
        }
    }
?>