<?php 
// /app/controllers/Router.php
class Router {
    private $routes = [];

    public function register($route, $callback) {
        $this->routes[$route] = $callback;
    }

    public function route($request) {
        $action = $request['op'] ?? null;
        if (array_key_exists($action, $this->routes)) {
            call_user_func($this->routes[$action], $request);
        } else {
            // Aquí puedes manejar rutas no encontradas o errores
            echo json_encode(["error" => "Acción no encontrada"]);
        }
    }
}
