<?php

use Framework\Http\Request;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$request = (new Request())
    ->withQueryParams($_GET)
    ->withParsedBody($_POST);

$name = $request->getQueryParams()['name'] ?? 'Guest';
header('X-Developer: frNicky');
echo 'Hello'. $name . '!';