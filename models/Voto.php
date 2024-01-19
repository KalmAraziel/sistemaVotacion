<?php

class Voto {
    
    private $id;
    private $idCandidato;
    private $idPersona;
    private $redesSociales;
    private $tv;
    private $web;
    private $amigo;

    // Constructor
    public function __construct() {
        $this->pdo = BaseDatos::Conect();
    }

    // Métodos Getter
    public function getAmigo() {
        return $this->amigo;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdCandidato() {
        return $this->idCandidato;
    }

    public function getIdPersona() {
        return $this->idPersona;
    }

    public function getRedesSociales() {
        return $this->redesSociales;
    }

    public function getTv() {
        return $this->tv;
    }

    public function getWeb() {
        return $this->web;
    }

    // Métodos Setter
    public function setAmigo($amigo) {
        $this->amigo = $amigo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdCandidato($idCandidato) {
        $this->idCandidato = $idCandidato;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function setRedesSociales($redesSociales) {
        $this->redesSociales = $redesSociales;
    }

    public function setTv($tv) {
        $this->tv = $tv;
    }

    public function setWeb($web) {
        $this->web = $web;
    }

    public function insertarVoto(Voto $v) {
        try {//,WEB,TV,REDES_SOCIALES,AMIGO
            /*
               $v->getWeb(),
                    $v->getTv(),
                    $v->getRedesSociales(),
                    $v->getAmigo()
            
             */
            $consulta = "INSERT INTO VOTO (ID_PERSONA, ID_CANDIDATO,REDES_SOCIALES)
            VALUES (?,?,?);";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $v->getIdPersona(),
                    $v->getIdCandidato(),
                    $v->getRedesSociales()
            )); 
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>
