<?php

namespace App\Models;

class Database extends DatabaseManager {
	
    public function insert($email) {
        $db = $this->dbConnect();
		$req = $db->prepare("INSERT INTO emails(email) VALUES(?)");
		$affectedLines = $req->execute(array($email));
		return $affectedLines;
	}
	
}

?>