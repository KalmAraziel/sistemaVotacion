<?php

class Persona {
    private $id;
    private $alias;
    private $apellidos;
    private $email;
    private $idComuna;
    private $idTipoPersona;
    private $nombre;
    private $rut;
    
    // Constructor
    public function __construct() {
        $this->pdo = BaseDatos::Conect();
    }

    // Métodos Getter
    public function getId() {
        return $this->id;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIdComuna() {
        return $this->idComuna;
    }

    public function getIdTipoPersona() {
        return $this->idTipoPersona;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getRut() {
        return $this->rut;
    }

    // Métodos Setter
    public function setId($id) {
        $this->id = $id;
    }

    public function setAlias($alias) {
        $this->alias = $alias;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setIdComuna($idComuna) {
        $this->idComuna = $idComuna;
    }

    public function setIdTipoPersona($idTipoPersona) {
        $this->idTipoPersona = $idTipoPersona;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setRut($rut) {
        $this->rut = $rut;
    }

    public function listarCandidatos() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM PERSONA WHERE ID_TIPO_PERSONA = 2; ");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insertarPersona(Persona $p) {
        try {
            $consulta = "INSERT INTO PERSONA (NOMBRE, APELLIDOS,ALIAS,ID_COMUNA,RUT,EMAIL,ID_TIPO_PERSONA)
            VALUES (?,?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getNombre(),
                    $p->getApellidos(),
                    $p->getAlias(),
                    $p->getIdComuna(),
                    $p->getRut(),
                    $p->getEmail(),
                    $p->getIdTipoPersona()
            )); 
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function totalCandidatos() {
        try {
            $consulta = $this->pdo->prepare("SELECT SUM(id) AS Cantidad FROM PERSONA WHERE ID_TIPO_PERSONA = 2; ");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function existeUsuario($id) {
        try {
            // TIpo Persona 1 
            $consulta = $this->pdo->prepare("SELECT count(id) AS Existe FROM PERSONA WHERE ID_TIPO_PERSONA = 1 AND RUT = ?; ");
            $consulta->execute(array($id));
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getAllVotos() {
        try {
            $consulta = "SELECT Persona.id,CONCAT('#', SUBSTRING(MD5(RAND()), 1, 6)) AS color , CONCAT('#', SUBSTRING(MD5(RAND()), 1, 6)) AS highlight , PERSONA.NOMBRE as label, PERSONA.APELLIDOS, COUNT(Voto.ID_CANDIDATO) AS value FROM Persona LEFT JOIN Voto ON Persona.id = Voto.ID_CANDIDATO where Persona.ID_TIPO_PERSONA = 2 GROUP BY Persona.ID;";                     
            $consulta = $this->pdo->prepare($consulta);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        
    }

    public function getIdUsuarioByRut($rut) {
        try {
            // TIpo Persona 1 votante
            $consulta = $this->pdo->prepare("SELECT ID AS Id FROM PERSONA WHERE ID_TIPO_PERSONA = 1 AND RUT = ?; ");
            $consulta->execute(array($rut));
            return $consulta->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>
