<?php

declare(strict_types=1);

namespace Framework;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path)
    {
        $path = $this->normalizePath($path);

        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method)
        ];
    }

    private function normalizePath(string $path): string      // typisiert den Rückgabewert als string
    {
        $path = trim($path, '/');   //falls bereits schrägstriche vorhanden
        $path = "/{$path}/";        //vor und hinter dem pfad werden schrägstriche gesetzt
        $path = preg_replace('#[/]{2,}#', '/', $path);  // die 2 Schrägstriche durch einen ersetzen

        return $path;
    }
}
