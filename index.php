<?php

use App\Controllers\MainController;

require __DIR__ . '/vendor/autoload.php';

// Load environnement data
if (file_exists(__DIR__ . '/.env')) {
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

// // Test purposes
// $email = "greg@gmail.com";
// $controller = new MainController();
// $controller->persistEmail($email);

header('Content-Type: application/json ; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$req_method = $_SERVER['REQUEST_METHOD'];
$route = $_GET["route"];
// $path = $_SERVER['PATH_INFO'];

if ($route === "email" && $req_method === "POST") {
// if ($path === "/api/email" && $req_method === "POST") {
	$data = json_decode(file_get_contents("php://input"), true);
	$email = (string) $data["email"];
	$controller = new MainController();
    $controller->persistEmail($email);
    $controller->sendEmailToAdmin($email);
	$controller->sendEmailToUser($email);
}
