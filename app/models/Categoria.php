<?php
// In /models/Categoria.php
class Categoria extends Conectar
{
    public function get_categoria()
    {
        $conectar = parent::conexion();
        parent::set_name();

        // SQL query string
        $query = "SELECT * FROM tm_categoria WHERE est=1";

        // Preparing the query
        $stmt = $conectar->prepare($query);

        // Executing the statement
        $stmt->execute();

        // Fetching the results
        return $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_categoria_x_id($cat_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        // SQL query string
        $query = "SELECT * FROM tm_categoria WHERE est=1 AND cat_id=?";

        // Preparing the query
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $cat_id);

        // Executing the statement
        $stmt->execute();

        // Fetching the results
        return $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_categoria($cat_nom, $cat_obs)
    {
        $conectar = parent::conexion();
        parent::set_name();

        // SQL query string
        $query = "INSERT INTO tm_categoria (cat_id, cat_nom, cat_obs, est) VALUES (NULL, ?, ?, '1');";

        // Preparing the query
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $cat_nom);
        $stmt->bindValue(2, $cat_obs);

        // Executing the statement
        $stmt->execute();
    }
    public function update_categoria($cat_id, $cat_nom, $cat_obs)
    {
        $conectar = parent::conexion();
        parent::set_name();

        // SQL query string
        $query = "UPDATE tm_categoria SET
        cat_nom = ?,
        cat_obs = ?
        WHERE
        cat_id = ?
        ";

        // Preparing the query
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $cat_nom);
        $stmt->bindValue(2, $cat_obs);
        $stmt->bindValue(3, $cat_id);

        // Executing the statement
        $stmt->execute();
    }
    public function delete_categoria($cat_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        // SQL query string
        $query = "UPDATE tm_categoria SET
        est = '0'
        WHERE
        cat_id = ?
        ";

        // Preparing the query
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $cat_id);

        // Executing the statement
        $stmt->execute();
    }
}
