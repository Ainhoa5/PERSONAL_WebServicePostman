<?php
// En /index.php

// Incluir el archivo de configuración de conexión a la base de datos.
require_once("config/conexion.php");

// Incluir el enrutador y los controladores para categorías y productos.
require_once("app/controllers/Router.php");
require_once("app/controllers/CategoriaController.php");
require_once("app/controllers/ProductController.php");

// Crear una nueva instancia del enrutador.
$router = new Router();

// Configuración de rutas para el manejo de categorías.
$categoriaController = new CategoriaController();
$router->register("getAllCategorias", [$categoriaController, "getAll"]); // Ruta para obtener todas las categorías.
$router->register("getCategoriaById", [$categoriaController, "getById"]); // Ruta para obtener una categoría por ID.
$router->register("insertCategoria", [$categoriaController, "insert"]); // Ruta para insertar una nueva categoría.
$router->register("updateCategoria", [$categoriaController, "update"]); // Ruta para actualizar una categoría.
$router->register("deleteCategoria", [$categoriaController, "delete"]); // Ruta para eliminar una categoría.

// Configuración de rutas para el manejo de productos.
$productoController = new ProductController(); // Crear una instancia del controlador de productos.
$router->register("getAllProductos", [$productoController, "getAll"]); // Ruta para obtener todos los productos.
$router->register("getProductoById", [$productoController, "getById"]); // Ruta para obtener un producto por ID.
$router->register("insertProducto", [$productoController, "insert"]); // Ruta para insertar un nuevo producto.
$router->register("updateProducto", [$productoController, "update"]); // Ruta para actualizar un producto.
$router->register("deleteProducto", [$productoController, "delete"]); // Ruta para eliminar un producto.

// Procesar la solicitud entrante basada en el parámetro 'op' de la URL.
$router->route($_GET);
