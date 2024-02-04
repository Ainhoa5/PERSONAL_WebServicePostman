<?php
// En /app/controllers/Router.php

/**
 * Clase Router que gestiona el enrutamiento de las solicitudes a la API.
 *
 * Esta clase se encarga de registrar las rutas disponibles y sus callbacks correspondientes,
 * y de dirigir las solicitudes entrantes a la acción adecuada basada en el parámetro 'op' de la solicitud.
 */
class Router
{
    /**
     * Array asociativo de rutas registradas y sus callbacks.
     *
     * @var array
     */
    private $routes = [];

    /**
     * Registra una nueva ruta y su callback en el enrutador.
     *
     * @param string $route La ruta o acción a registrar.
     * @param callable $callback El callback a ejecutar cuando se accede a la ruta.
     */
    public function register($route, $callback)
    {
        $this->routes[$route] = $callback;
    }

    /**
     * Maneja una solicitud entrante, ejecutando el callback registrado para la acción solicitada.
     *
     * @param array $request Array asociativo que representa la solicitud, típicamente $_GET o $_POST.
     */
    public function route($request)
    {
        $action = $request['op'] ?? null;
        if (array_key_exists($action, $this->routes)) {
            call_user_func($this->routes[$action], $request);
        } else {
            // Aquí puedes manejar rutas no encontradas o errores
            echo json_encode(["error" => "Acción no encontrada"]);
        }
    }
}
