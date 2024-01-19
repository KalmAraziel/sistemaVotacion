<?php

class TipoPersona {
    private $id;
    private $descripcion;

    // Constructor
    public function __construct() {
        $this->pdo = BaseDatos::Conect();
    }

    // Métodos Getter
    public function getId() {
        return $this->id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    // Métodos Setter
    public function setId($id) {
        $this->id = $id;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}

?>
