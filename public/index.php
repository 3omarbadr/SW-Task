<?php

use TestTask\Http\Request;
use TestTask\Http\Response;
use TestTask\Http\Route;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../routes/web.php';


$route = new Route(new Request, new Response);

$route->resolve();