<?php
header('Content-Type: application/json');

require_once("../../config/conexion.php");
require_once("../models/Categoria.php");

try {
    $categoria = new Categoria();
    $body = json_decode(file_get_contents("php://input"), true);
    $op = $_GET["op"] ?? '';

    switch ($op) {
        case "GetAll":
            echo json_encode($categoria->get_categoria());
            break;
        case "GetId":
            // Validar que cat_id esté presente
            echo json_encode($categoria->get_categoria_x_id($body["cat_id"]));
            break;
        case "Insert":
            $categoria->insert_categoria($body["cat_nom"], $body["cat_obs"]);
            echo "Insert Correcto";
            break;
        case "Update":
            $categoria->update_categoria($body["cat_id"], $body["cat_nom"], $body["cat_obs"]);
            echo "Update Correcto";
            break;
        case "Delete":
            $categoria->delete_categoria($body["cat_id"]);
            echo "Delete Correcto";
            break;
        default:
            http_response_code(400);
            echo json_encode(["error" => "Operación no válida"]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => $e->getMessage()]);
}
