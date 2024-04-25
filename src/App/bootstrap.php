<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Controllers\HomeController;

// echo HomeController::class;   //jede klasse besitzt automatisch eine konstante, die nach der klasse benannt ist



$app = new App();

$app->get('/', [HomeController::class, 'home']);

return $app;
