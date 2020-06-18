<?php

use App\Controllers\MainController;

require __DIR__ . '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env')) {
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

// // Load environnement data
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

// // Test purposes
// $email = "greg@gmail.com";
// $controller = new MainController();
// $controller->addEmail($email);

header('Content-Type: application/json ; charset=utf-8');
// header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$req_method = $_SERVER['REQUEST_METHOD'];
// $path = $_SERVER['PATH_INFO'];
$path = $_GET["route"];

// var_dump($req_method);
// var_dump($path);

// echo $req_method;
// echo $_GET["route"];

if ($path === "email" && $req_method === "POST") {
	$data = json_decode(file_get_contents("php://input"), true);
	$email = (string) $data["email"];
	$controller = new MainController();
    $controller->addEmail($email);
}
