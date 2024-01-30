<?php 
// /index.php
require_once("config/conexion.php");
require_once("app/controllers/Router.php");
require_once("app/controllers/CategoriaController.php");
require_once("app/controllers/ProductController.php");

$router = new Router();

// Configuración de rutas para categorías
$categoriaController = new CategoriaController();
$router->register("getAllCategorias", [$categoriaController, "getAll"]);
$router->register("getCategoriaById", [$categoriaController, "getById"]);
// Registra otros métodos como sea necesario

// Configuración de rutas para productos
$productoController = new ProductController(); // Uncomment this line to create an instance of ProductoController
$router->register("getAllProductos", [$productoController, "getAll"]); // Register a route for getting all products
$router->register("getProductoById", [$productoController, "getById"]); // Register a route for getting a product by ID
$router->register("insertProducto", [$productoController, "insert"]); // Register a route for inserting a product
$router->register("updateProducto", [$productoController, "update"]); // Register a route for updating a product
$router->register("deleteProducto", [$productoController, "delete"]); // Register a route for deleting a product
// Add more routes as needed for ProductoController

$router->route($_GET);

