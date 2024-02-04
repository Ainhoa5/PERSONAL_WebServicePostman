<?php
// /app/models/Categoria.php

/**
 * Modelo Categoria para interactuar con la tabla de categorías en la base de datos.
 *
 * Proporciona funcionalidades para obtener, insertar, actualizar y eliminar categorías.
 */
class Categoria extends Conectar
{
    /**
     * Obtiene todas las categorías activas de la base de datos.
     *
     * @return array Lista de todas las categorías activas.
     */
    public function get_categoria()
    {
        $conectar = parent::conexion();
        parent::set_name();

        $query = "SELECT * FROM tm_categoria WHERE est=1";
        $stmt = $conectar->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Obtiene una categoría específica por su ID.
     *
     * @param int $cat_id ID de la categoría a obtener.
     * @return array Datos de la categoría solicitada.
     */
    public function get_categoria_x_id($cat_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        $query = "SELECT * FROM tm_categoria WHERE est=1 AND cat_id=?";
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $cat_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserta una nueva categoría en la base de datos.
     *
     * @param string $cat_nom Nombre de la nueva categoría.
     * @param string $cat_obs Observaciones de la nueva categoría.
     */
    public function insert_categoria($cat_nom, $cat_obs)
    {
        $conectar = parent::conexion();
        parent::set_name();

        $query = "INSERT INTO tm_categoria (cat_id, cat_nom, cat_obs, est) VALUES (NULL, ?, ?, '1');";
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $cat_nom);
        $stmt->bindValue(2, $cat_obs);
        $stmt->execute();
    }

    /**
     * Actualiza los datos de una categoría existente en la base de datos.
     *
     * @param int $cat_id ID de la categoría a actualizar.
     * @param string $cat_nom Nuevo nombre para la categoría.
     * @param string $cat_obs Nuevas observaciones para la categoría.
     */
    public function update_categoria($cat_id, $cat_nom, $cat_obs)
    {
        $conectar = parent::conexion();
        parent::set_name();

        $query = "UPDATE tm_categoria SET cat_nom = ?, cat_obs = ? WHERE cat_id = ?";
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $cat_nom);
        $stmt->bindValue(2, $cat_obs);
        $stmt->bindValue(3, $cat_id);
        $stmt->execute();
    }

    /**
     * Elimina una categoría de la base de datos, marcándola como inactiva.
     *
     * @param int $cat_id ID de la categoría a eliminar.
     */
    public function delete_categoria($cat_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        $query = "UPDATE tm_categoria SET est = '0' WHERE cat_id = ?";
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $cat_id);
        $stmt->execute();
    }
}
