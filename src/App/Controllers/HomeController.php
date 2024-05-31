<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;


class HomeController
{
    private TemplateEngine $view;

    public function __construct()
    {
        $this->view = new TemplateEngine(Paths::VIEW);
    }

    public function home()
    {
        //dd($this->view);  //überprüfen ob eine instanz der klasse erzeugt wurde
        $this->view->render("/index.php", [
            'title' => 'Home Page Title'
        ]);
    }
}
