<?php
require_once('Articulo.php');

class ArticuloDAO {
    private $db;

    public function __construct() {
        
        $this->db = new mysqli('localhost', 'root', '', 'facturacion');
    }

    public function getArticulos() {
        $result = $this->db->query("SELECT * FROM articulos");
        $articulos = [];

        while ($row = $result->fetch_assoc()) {
            $articulos[] = new Articulo($row['id'], $row['nombre'], $row['cantidad'], $row['valor'], $row['comentario']);
        }

        return $articulos;
    }

    public function addArticulo($nombre, $cantidad, $valor, $comentario) {
        $stmt = $this->db->prepare("INSERT INTO articulos (nombre, cantidad, valor, comentario) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('siis', $nombre, $cantidad, $valor, $comentario);
        $stmt->execute();
    }

    public function updateArticulo($id, $nombre, $cantidad, $valor, $comentario) {
        $stmt = $this->db->prepare("UPDATE articulos SET nombre = ?, cantidad = ?, valor = ?, comentario = ? WHERE id = ?");
        $stmt->bind_param('siisi', $nombre, $cantidad, $valor, $comentario, $id);
        $stmt->execute();
    }

    public function deleteArticulo($id) {
        $stmt = $this->db->prepare("DELETE FROM articulos WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }
}
