<?php
// /app/models/Producto.php
class Producto extends Conectar
{
    public function get_productos()
    {
        $conectar = parent::conexion();
        parent::set_name();

        // SQL query string
        $query = "SELECT * FROM tm_producto";

        // Preparing the query
        $stmt = $conectar->prepare($query);

        // Executing the statement
        $stmt->execute();

        // Fetching the results
        return $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_producto_by_id($pro_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        // SQL query string
        $query = "SELECT * FROM tm_producto WHERE pro_id = ?";

        // Preparing the query
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $pro_id);

        // Executing the statement
        $stmt->execute();

        // Fetching the results
        return $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_producto($pro_nom, $pro_desc, $cat_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        // SQL query string
        $query = "INSERT INTO tm_producto (pro_id, pro_nom, pro_desc, cat_id) VALUES (NULL, ?, ?, ?);";

        // Preparing the query
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $pro_nom);
        $stmt->bindValue(2, $pro_desc);
        $stmt->bindValue(3, $cat_id);

        // Executing the statement
        $stmt->execute();
    }

    public function update_producto($pro_id, $pro_nom, $pro_desc, $cat_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        // SQL query string
        $query = "UPDATE tm_producto SET
        pro_nom = ?,
        pro_desc = ?,
        cat_id = ?
        WHERE
        pro_id = ?
        ";

        // Preparing the query
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $pro_nom);
        $stmt->bindValue(2, $pro_desc);
        $stmt->bindValue(3, $cat_id);
        $stmt->bindValue(4, $pro_id);

        // Executing the statement
        $stmt->execute();
    }

    public function delete_producto($pro_id)
    {
        $conectar = parent::conexion();
        parent::set_name();

        // SQL query string
        $query = "DELETE FROM tm_producto WHERE pro_id = ?";

        // Preparing the query
        $stmt = $conectar->prepare($query);
        $stmt->bindValue(1, $pro_id);

        // Executing the statement
        $stmt->execute();
    }

}

