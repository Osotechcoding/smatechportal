<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
  require __DIR__ . "/src/$class.php";
});

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

header("Content-type: application/json; charset=UTF-8");

$parts = explode("/", $_SERVER["REQUEST_URI"]);
// print_r($parts);
// die();

if ($parts[3] != "students") {
  http_response_code(404);
  exit;
} else {
  $id = $parts[4] ?? null;

  $database = new Database();

  $gateway = new AppGateway($database);

  $controller = new AppController($gateway);

  $controller->processRequest($_SERVER["REQUEST_METHOD"], $id);
}