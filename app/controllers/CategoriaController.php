<?php
// /app/controllers/CategoriaController.php
require_once("app/models/Categoria.php");
require_once("config/conexion.php");

class CategoriaController {
    private $categoriaModel;

    public function __construct() {
        $this->categoriaModel = new Categoria();
    }

    // Obtener todas las categorías
    public function getAll() {
        $categorias = $this->categoriaModel->get_categoria();
        echo json_encode($categorias);
    }

    // Obtener una categoría por ID
    public function getById() {
        if (!isset($_POST['cat_id'])) {
            echo json_encode(["error" => "ID de categoría no proporcionado"]);
            return;
        }

        $categoria = $this->categoriaModel->get_categoria_x_id($_POST['cat_id']);
        echo json_encode($categoria);
    }

    // Insertar una nueva categoría
    public function insert() {
        if (!isset($_POST['cat_nom']) || !isset($_POST['cat_obs'])) {
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        $this->categoriaModel->insert_categoria($_POST['cat_nom'], $_POST['cat_obs']);
        echo json_encode(["success" => "Categoría insertada correctamente"]);
    }

    // Actualizar una categoría
    public function update() {
        if (!isset($_POST['cat_id']) || !isset($_POST['cat_nom']) || !isset($_POST['cat_obs'])) {
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        $this->categoriaModel->update_categoria($_POST['cat_id'], $_POST['cat_nom'], $_POST['cat_obs']);
        echo json_encode(["success" => "Categoría actualizada correctamente"]);
    }

    // Eliminar una categoría
    public function delete() {
        if (!isset($_POST['cat_id'])) {
            echo json_encode(["error" => "ID de categoría no proporcionado"]);
            return;
        }

        $this->categoriaModel->delete_categoria($_POST['cat_id']);
        echo json_encode(["success" => "Categoría eliminada correctamente"]);
    }
}
