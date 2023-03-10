<?php

namespace Helpers;

use Exception;

const DEFAULT_PAGE = "../public/index.php";

/**
 * Redirige a la URL especificada.
 *
 * @param string $url La URL a la que se redirige.
 * @throws Exception Si no se puede redirigir a la URL especificada.
 */
function redirect(string $url): void
{
    if (!header("Location: $url")) {
        throw new Exception("No se pudo redirigir a la URL especificada.");
    }
}

/**
 * Imprime la variable especificada de forma legible y detiene la ejecución del script.
 *
 * @param mixed $var La variable a imprimir.
 */
function dd($var): void
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    die();
}

/**
 * Genera la URL para el controlador y la acción especificados.
 *
 * @param string $module El módulo que contiene el controlador.
 * @param string $controller El controlador que contiene la acción.
 * @param string $action La acción que se va a ejecutar.
 * @param array $params Los parámetros adicionales que se van a incluir en la URL.
 * @param string|null $page La página que contiene la URL generada. Si no se especifica, se utiliza la página predeterminada.
 * @return string La URL generada.
 */
function generateUrl(string $module, string $controller, string $action, array $params = [], string $page = null): string
{
    $page = $page ?? DEFAULT_PAGE;
    $url = "$page?module=$module&controller=$controller&action=$action";

    foreach ($params as $key => $value) {
        $url .= "&$key=$value";
    }

    return $url;
}

/**
 * Resuelve la URL y ejecuta la acción correspondiente en el controlador especificado.
 *
 * @throws Exception Si la acción o el controlador especificados no existen.
 */
function resolve(): void
{
    $module = ucwords($_GET["module"] ?? "");
    $controller = ucwords($_GET["controller"] ?? "");
    $action = $_GET["action"] ?? "";

    $controllerClass = "\\MyApp\\$module\\{$controller}Controller";
    if (!class_exists($controllerClass)) {
        throw new Exception("El controlador especificado no existe.");
    }

    $controllerInstance = new $controllerClass();
    if (!method_exists($controllerInstance, $action)) {
        throw new Exception("La acción especificada no existe.");
    }

    $controllerInstance->$action();
}

?>