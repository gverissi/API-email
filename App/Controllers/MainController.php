<?php

namespace App\Controllers;

use App\Models\Database;

class MainController {

    public function addEmail($email) {
            $database = new Database();
            $database->insert($email);
    }

}

?>