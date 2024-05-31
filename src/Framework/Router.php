<?php

declare(strict_types=1);

namespace Framework;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, array $controller)
    {
        $path = $this->normalizePath($path);

        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }

    private function normalizePath(string $path): string      // typisiert den Rückgabewert als string; Returntype ist string
    {
        $path = trim($path, '/');   //falls bereits schrägstriche vorhanden
        $path = "/{$path}/";        //vor und hinter dem pfad werden schrägstriche gesetzt
        $path = preg_replace('#[/]{2,}#', '/', $path);  // die 2 Schrägstriche durch einen ersetzen

        return $path;
    }

    public function dispatch(string $path, string $method)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        // echo $path . $method;

        foreach ($this->routes as $route) {
            if (
                !preg_match("#^{$route['path']}$#", $path) ||
                $route['method'] !== $method
            ) {
                continue;  // erlaubt, zum nächsten element zu wechseln
            }

            // echo 'route found';

            [$class, $function] = $route['controller'];  // destruction array! controller = array, speichert den namen der class und der methode

            $controllerInstance = new $class;  // instanziert die klasse

            $controllerInstance->{$function}(); // ruft die methode auf
        }
    }
}
