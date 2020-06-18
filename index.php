<?php

use App\Controllers\MainController;

require __DIR__ . '/vendor/autoload.php';

// Load environnement data
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// // Test purposes
// $email = "greg@gmail.com";
// $controller = new MainController();
// $controller->addEmail($email);

header('Content-Type: application/json ; charset=utf-8');
// header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$req_method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'];

ver_dump($req_method);
ver_dump($path);

// if ($path === "/api/email/add" && $req_method === "POST") {
// 	$data = json_decode(file_get_contents("php://input"), true);
// 	$email = (string) $data["email"];
// 	$controller = new MainController();
//     $controller->addEmail($email);
// }
