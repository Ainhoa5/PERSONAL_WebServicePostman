<?php 
// In /models/Categoria.php
class Categoria extends Conectar{
    public function get_categoria(){
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
    
    public function get_categoria_x_id($cat_id){
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
}
