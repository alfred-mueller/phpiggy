<?php

declare(strict_types=1);

namespace Framework;


// Die Klasse App soll die Framework-Tools vorbereiten
class App
{
    private Router $router;    // der Typ ist eine Router Klasse

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);  //parse_url: erlaubt uns teile aus einer url zu extrahieren
        $method = $_SERVER['REQUEST_METHOD'];  // $_SERVER['REQUEST_METHOD'] liefert die methode (GET)
        $this->router->dispatch($path, $method);
    }

    public function get(string $path, array $controller)
    {
        $this->router->add('GET', $path, $controller);
    }
}
