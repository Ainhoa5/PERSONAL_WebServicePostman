<?php
// /app/controllers/CategoriaController.php
require_once("app/models/Categoria.php");
require_once("config/conexion.php");

/**
 * Controlador para manejar las operaciones de la entidad Categoría.
 *
 * Este controlador maneja las rutas y acciones para obtener, insertar, actualizar,
 * y eliminar categorías utilizando el modelo Categoria.
 */
class CategoriaController {
    /**
     * @var Categoria Instancia del modelo de categoría para interactuar con la base de datos.
     */
    private $categoriaModel;

    /**
     * Constructor que inicializa el modelo de categoría.
     */
    public function __construct() {
        $this->categoriaModel = new Categoria();
    }

    /**
     * Envía todas las categorías existentes en formato JSON.
     */
    public function getAll() {
        $categorias = $this->categoriaModel->get_categoria();
        echo json_encode($categorias);
    }

    /**
     * Envía una categoría específica por su ID en formato JSON.
     * Requiere el ID de la categoría enviado vía POST.
     */
    public function getById() {
        if (!isset($_POST['cat_id'])) {
            echo json_encode(["error" => "ID de categoría no proporcionado"]);
            return;
        }

        $categoria = $this->categoriaModel->get_categoria_x_id($_POST['cat_id']);
        echo json_encode($categoria);
    }

    /**
     * Inserta una nueva categoría con los datos proporcionados vía POST y devuelve el resultado.
     */
    public function insert() {
        if (!isset($_POST['cat_nom']) || !isset($_POST['cat_obs'])) {
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        $this->categoriaModel->insert_categoria($_POST['cat_nom'], $_POST['cat_obs']);
        echo json_encode(["success" => "Categoría insertada correctamente"]);
    }

    /**
     * Actualiza una categoría existente con los datos proporcionados vía POST y devuelve el resultado.
     */
    public function update() {
        if (!isset($_POST['cat_id']) || !isset($_POST['cat_nom']) || !isset($_POST['cat_obs'])) {
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        $this->categoriaModel->update_categoria($_POST['cat_id'], $_POST['cat_nom'], $_POST['cat_obs']);
        echo json_encode(["success" => "Categoría actualizada correctamente"]);
    }

    /**
     * Elimina una categoría específica por su ID enviado vía POST y devuelve el resultado.
     */
    public function delete() {
        if (!isset($_POST['cat_id'])) {
            echo json_encode(["error" => "ID de categoría no proporcionado"]);
            return;
        }

        $this->categoriaModel->delete_categoria($_POST['cat_id']);
        echo json_encode(["success" => "Categoría eliminada correctamente"]);
    }
}
