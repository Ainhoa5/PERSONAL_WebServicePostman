<?php
namespace Config;

// In /config/function.php

/**
 * Clase Functions con métodos de utilidad para debugging y log de errores.
 *
 * Provee funcionalidades estáticas para facilitar el desarrollo y mantenimiento
 * de la aplicación, permitiendo una visualización amigable de datos y el registro
 * de errores en un archivo log.
 */
class Functions
{
    /**
     * Imprime una representación formateada de una variable y termina la ejecución del script.
     *
     * @param mixed $content El contenido a ser impreso. Puede ser de cualquier tipo.
     */
    public static function debug($content)
    {
        echo '<pre>';
        if (is_bool($content) || is_null($content)) {
            var_dump($content);
        } else {
            print_r($content);
        }
        echo '</pre>';
        exit();
    }

    /**
     * Registra un mensaje de error en un archivo de log.
     *
     * @param string $error El mensaje de error a registrar.
     */
    public static function logError($error)
    {
        // Ruta al archivo de log. Asegúrate de ajustar esta ruta según tu estructura de directorios.
        $logFile = './logfile.log';

        // Mensaje a registrar, incluyendo un timestamp para facilidad de seguimiento.
        $message = '[' . date('Y-m-d H:i:s') . '] Error: ' . $error . PHP_EOL;

        // Escribir el mensaje de error en el archivo de log, agregándolo al final del archivo.
        file_put_contents($logFile, $message, FILE_APPEND);
    }
}


?>