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
    public function getById($request) {
        if (!isset($request['cat_id'])) {
            echo json_encode(["error" => "ID de categoría no proporcionado"]);
            return;
        }

        $categoria = $this->categoriaModel->get_categoria_x_id($request['cat_id']);
        echo json_encode($categoria);
    }

    // Insertar una nueva categoría
    public function insert($request) {
        if (!isset($request['cat_nom']) || !isset($request['cat_obs'])) {
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        $this->categoriaModel->insert_categoria($request['cat_nom'], $request['cat_obs']);
        echo json_encode(["success" => "Categoría insertada correctamente"]);
    }

    // Actualizar una categoría
    public function update($request) {
        if (!isset($request['cat_id']) || !isset($request['cat_nom']) || !isset($request['cat_obs'])) {
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        $this->categoriaModel->update_categoria($request['cat_id'], $request['cat_nom'], $request['cat_obs']);
        echo json_encode(["success" => "Categoría actualizada correctamente"]);
    }

    // Eliminar una categoría
    public function delete($request) {
        if (!isset($request['cat_id'])) {
            echo json_encode(["error" => "ID de categoría no proporcionado"]);
            return;
        }

        $this->categoriaModel->delete_categoria($request['cat_id']);
        echo json_encode(["success" => "Categoría eliminada correctamente"]);
    }
}
