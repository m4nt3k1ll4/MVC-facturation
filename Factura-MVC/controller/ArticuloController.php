<?php
require_once('model/ArticuloDAO.php');

class ArticuloController {
    private $dao;

    public function __construct() {
        $this->dao = new ArticuloDAO();
    }

    public function main() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'listar';
        switch ($action) {
            case 'listar':
                $this->listarArticulos();
                break;
            case 'agregar':
                $this->agregarArticulo();
                break;
            case 'editar':
                $this->editarArticulo();
                break;
            case 'eliminar':
                $this->eliminarArticulo();
                break;
            default:
                echo "Error: Acción no soportada";
        }
    }

    private function listarArticulos() {
        $articulos = $this->dao->getArticulos();
        include_once('view/listar.php');
    }

    private function agregarArticulo() {
        if (isset($_POST['btnGuardar'])) {
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $valor = $_POST['valor'];
            $comentario = $_POST['comentario'];
            $this->dao->addArticulo($nombre, $cantidad, $valor, $comentario);
            header('Location: index.php');
        } else {
            include_once('view/agregar.php');
        }
    }

    private function editarArticulo() {
        $id = $_GET['id'];
        if (isset($_POST['btnGuardar'])) {
            $nombre = $_POST['nombre'];
            $cantidad = $_POST['cantidad'];
            $valor = $_POST['valor'];
            $comentario = $_POST['comentario'];
            $this->dao->updateArticulo($id, $nombre, $cantidad, $valor, $comentario);
            header('Location: index.php');
        } else {
            $articulo = $this->dao->getArticuloById($id);
            include_once('view/editar.php');
        }
    }

    private function eliminarArticulo() {
        $id = $_GET['id'];
        $this->dao->deleteArticulo($id);
        header('Location: index.php');
    }
}
