<?php

class Region {
    private $id;
    private $nombre;

    // Constructor
    public function __construct() {
        $this->pdo = BaseDatos::Conect();
    }

    // Métodos Getter
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    // Métodos Setter
    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getAllRegiones() {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM REGION;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>
