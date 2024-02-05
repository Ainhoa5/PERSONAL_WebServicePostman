<?php
// /app/controllers/ProductController.php

use Config\Functions;

require_once("app/models/Producto.php");
require_once("config/functions.php");

/**
 * Controlador para manejar las operaciones de productos.
 *
 * Este controlador facilita las acciones CRUD para los productos,
 * interactuando con el modelo Producto para acceder y modificar los datos de la base de datos.
 */
class ProductController
{
    /**
     * Modelo de producto para interactuar con la base de datos.
     *
     * @var Producto
     */
    private $productoModel;

    /**
     * Constructor que inicializa el modelo Producto.
     */
    public function __construct()
    {
        $this->productoModel = new Producto();
    }

    /**
     * Envía todos los productos existentes en formato JSON.
     */
    public function getAll()
    {
        $productos = $this->productoModel->get_productos();
        echo json_encode($productos);
    }

    /**
     * Envía un producto específico por su ID en formato JSON.
     * Requiere que el ID del producto se envíe vía POST.
     */
    public function getById()
    {
        if (!isset($_POST['pro_id'])) {
            echo json_encode(["error" => "ID de producto no proporcionado"]);
            return;
        }

        $producto = $this->productoModel->get_producto_by_id($_POST['pro_id']);
        echo json_encode($producto);
    }

    /**
     * Inserta un nuevo producto con los datos proporcionados vía POST y devuelve el resultado.
     */
    public function insert()
    {
        if (!isset($_POST['pro_nom']) || !isset($_POST['pro_desc']) || !isset($_POST['cat_id'])) {
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        $this->productoModel->insert_producto($_POST['pro_nom'], $_POST['pro_desc'], $_POST['cat_id']);
        echo json_encode(["success" => "Producto insertado correctamente"]);
    }

    /**
     * Actualiza un producto existente con los datos proporcionados vía POST y devuelve el resultado.
     */
    public function update()
    {
        if (!isset($_POST['pro_id']) || !isset($_POST['pro_nom']) || !isset($_POST['pro_desc']) || !isset($_POST['cat_id'])) {
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        $this->productoModel->update_producto($_POST['pro_id'], $_POST['pro_nom'], $_POST['pro_desc'], $_POST['cat_id']);
        echo json_encode(["success" => "Producto actualizado correctamente"]);
    }

    /**
     * Elimina un producto específico por su ID enviado vía POST y devuelve el resultado.
     */
    public function delete()
    {
        if (!isset($_POST['pro_id'])) {
            echo json_encode(["error" => "ID de producto no proporcionado"]);
            return;
        }

        $this->productoModel->delete_producto($_POST['pro_id']);
        echo json_encode(["success" => "Producto eliminado correctamente"]);
    }
}
