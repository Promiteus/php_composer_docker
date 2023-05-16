<?php

namespace App;

// Autoload files using the Composer autoloader.
use App\Greetings\Greeting;
use App\Greetings\HttpCreeting;

require_once __DIR__ . '/../vendor/autoload.php';

echo Greeting::sayHelloWorld();

$g=10;

$httpGreeting = new HttpCreeting();

echo '<br/>'.$httpGreeting->getHttpTestRequest();