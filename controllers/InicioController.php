<?php 

    require_once "models/Persona.php";
    require_once "models/Voto.php";

    class InicioController {
        
        private $candidatos;
        private $persona;
        private $voto;

        public function __CONSTRUCT() {
            $this->candidatos = new Persona();
            $this->persona = new Persona();
            $this->voto = new Voto();
        }
        //Vista inicio
        public function Inicio() {            
            require_once "views/header.php";
            require_once "views/Inicio/Inicio.php";
            require_once "views/footer.php";
        }        
        //Vista Grafico
        public function Analisis() {            
            require_once "views/header.php";
            require_once "views/Inicio/Analisis.php";
            require_once "views/footer.php";
        }

        public function InsertarVoto() {
            try {             
                $mensaje = "";  
                $error = false;              
                //Agregar Persona                    
                $p = new Persona();
                $p->setRut($_POST['rut']);
                $p->setAlias($_POST['alias']);
                $p->setApellidos($_POST['apellidos']);
                $p->setEmail($_POST['email']);
                $p->setIdComuna(intval($_POST['idComuna']));
                // 1 persona 2 candidato
                $p->setIdTipoPersona(1);
                $p->setNombre($_POST['nombre']);
                $existe = $this->persona->existeUsuario($p->getRut())->Existe;  
                //valido que no haya votado
                if($existe > 0 ){
                    $mensaje = "El rut ingresado ya voto.";
                    $error=true;
                } else {
                    // se inserta persona
                    $this->persona->insertarPersona($p);        
                    // recupero el idPersona
                    $id = $this->persona->getIdUsuarioByRut($p->getRut())->Id;                     
                    // insertar Voto 
                    $v = new Voto();
                    $v->setIdCandidato(intval($_POST['idCandidato']));
                    $v->setIdPersona(intval($id));                                        
                    $v->setRedesSociales(intval($_POST['redesSociales']));                
                    $v->setAmigo(intval($_POST['amigo']));
                    $v->setTv(intval($_POST['tv']));
                    $v->setWeb(intval($_POST['web']));                    
                    // se inserta Voto
                    $this->voto->insertarVoto($v);
                    // respuestas
                    $mensaje = "Voto registrado correctamente.";
                    $error=false;                    
                } 
                // devuelvo la respuesta
                print json_encode(['error' => $error, "msj"=> $mensaje  , "existe"=>$existe]);
            } catch (Exception $th) {
                print json_encode(['error' => true]);
            }
            
        }            
        
    }
?>