<?php

use App\Controllers\MainController;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$email = "greg@gmail.com";
$controller = new MainController();
$controller->addEmail($email);

// header('Content-Type: application/json ; charset=utf-8');
// // header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
// header('Access-Control-Allow-Origin: *');

// $req_method = $_SERVER['REQUEST_METHOD'];
// $path = $_SERVER['PATH_INFO'];

// if ($path === "/api/email/add" && $req_method === "POST") {
// 	$data = json_decode(file_get_contents("php://input"), true);
// 	$email = (string) $data["email"];
// 	$controller = new MainController();
//     $controller->addEmail($email);
// }
