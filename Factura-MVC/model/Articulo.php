<?php
class Articulo {
    private $id;
    private $nombre;
    private $cantidad;
    private $valor;
    private $comentario;

    public function __construct($id, $nombre, $cantidad, $valor, $comentario) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->valor = $valor;
        $this->comentario = $comentario;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
}
