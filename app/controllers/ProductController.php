<?php
// /app/controllers/ProductController.php

use Config\Functions;

require_once("app/models/Producto.php");
require_once("config/functions.php");

class ProductController
{
    private $productoModel;

    public function __construct()
    {
        $this->productoModel = new Producto();
    }

    // Obtener todos los productos
    public function getAll()
    {
        $productos = $this->productoModel->get_productos();
        echo json_encode($productos);
    }

    // Obtener un producto por ID
    public function getById($request)
    {
        if (!isset($_POST['pro_id'])) {
            echo json_encode(["error" => "ID de producto no proporcionado"]);
            return;
        }
        
        $producto = $this->productoModel->get_producto_by_id($_POST['pro_id']);
        echo json_encode($producto);
    }

    // Insertar un nuevo producto
    public function insert()
    {
        Functions::debug($_POST);
        // Utilizar directamente $_POST para acceder a los datos enviados
        if (!isset($_POST['pro_nom']) || !isset($_POST['pro_desc']) || !isset($_POST['cat_id'])) {
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        // Llama al modelo para insertar el producto
        $this->productoModel->insert_producto($_POST['pro_nom'], $_POST['pro_desc'], $_POST['cat_id']);
        echo json_encode(["success" => "Producto insertado correctamente"]);
    }



    // Actualizar un producto
    public function update($request)
    {
        if (!isset($_POST['pro_id']) || !isset($_POST['pro_nom']) || !isset($_POST['pro_desc']) ||  !isset($_POST['cat_id']) ) {
            echo json_encode(["error" => "Datos incompletos"]);
            return;
        }

        $this->productoModel->update_producto($_POST['pro_id'], $_POST['pro_nom'], $_POST['pro_desc'], $_POST['cat_id']);
        echo json_encode(["success" => "Producto actualizado correctamente"]);
    }

    // Eliminar un producto
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
