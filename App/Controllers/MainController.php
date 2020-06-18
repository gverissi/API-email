<?php

namespace App\Controllers;

use App\Models\Email;
use App\Models\Database;

class MainController {

    public function persistEmail($email) {
		$database = new Database();
		$database->insert($email);
    }

    public function sendEmailToAdmin($email) {
		$mailler = new Email();
		$mailler->sendEmail($email);
    }

}

?>