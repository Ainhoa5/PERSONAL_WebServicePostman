<?php
// /app/models/Producto.php

/**
 * Modelo Producto para interactuar con la tabla de productos en la base de datos.
 *
 * Proporciona funcionalidades para obtener, insertar, actualizar y eliminar productos.
 */
class Producto extends Conectar
{
    /**
     * Obtiene todos los productos de la base de datos.
     *
     * @return array Lista de todos los productos.
     */
    public function get_productos()
    {
        $conectar = parent::conexion();
        parent::set_name();

        $query = "SELECT * FROM tm_producto";
        $stmt = $conectar->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene un producto específico por su ID.
     *
     * @param int $pro_id ID del producto a obtener.
     * @return array Datos del producto solicitado.
     */
    public function get_producto_by_id($pro_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        $query = "SELECT * FROM tm_producto WHERE pro_id = ?";
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $pro_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserta un nuevo producto en la base de datos.
     *
     * @param string $pro_nom Nombre del producto.
     * @param string $pro_desc Descripción del producto.
     * @param int $cat_id ID de la categoría del producto.
     */
    public function insert_producto($pro_nom, $pro_desc, $cat_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        $query = "INSERT INTO tm_producto (pro_id, pro_nom, pro_desc, cat_id) VALUES (NULL, ?, ?, ?);";
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $pro_nom);
        $stmt->bindValue(2, $pro_desc);
        $stmt->bindValue(3, $cat_id);
        $stmt->execute();
    }

    /**
     * Actualiza los datos de un producto existente en la base de datos.
     *
     * @param int $pro_id ID del producto a actualizar.
     * @param string $pro_nom Nuevo nombre del producto.
     * @param string $pro_desc Nueva descripción del producto.
     * @param int $cat_id Nueva categoría del producto.
     */
    public function update_producto($pro_id, $pro_nom, $pro_desc, $cat_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        $query = "UPDATE tm_producto SET pro_nom = ?, pro_desc = ?, cat_id = ? WHERE pro_id = ?";
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $pro_nom);
        $stmt->bindValue(2, $pro_desc);
        $stmt->bindValue(3, $cat_id);
        $stmt->bindValue(4, $pro_id);
        $stmt->execute();
    }

    /**
     * Elimina un producto de la base de datos por su ID.
     *
     * @param int $pro_id ID del producto a eliminar.
     */
    public function delete_producto($pro_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        $query = "DELETE FROM tm_producto WHERE pro_id = ?";
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $pro_id);
        $stmt->execute();
    }
}
