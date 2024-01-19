<?php

class Comuna {
    private $id;
    private $idRegion;
    private $nombre;

    // Constructor
    public function __construct() {
        $this->pdo = BaseDatos::Conect();
    }

    // Métodos Getter
    public function getId() {
        return $this->id;
    }

    public function getIdRegion() {
        return $this->idRegion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    // Métodos Setter
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdRegion($idRegion) {
        $this->idRegion = $idRegion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getAllComunasByIdRegion($id) {
        try {
            $sql = "SELECT * FROM COMUNA WHERE ID_REGION = ?;";              
            $consulta = $this->pdo->prepare($sql);
            $consulta->execute(array($id));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>
