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
		$message = "Un utilisateur réclame son <b>cadeau</b> : " . $email;
		$altMessage = "Un utilisateur réclame son cadeau : " . $email;
		$mailler->sendEmail($_ENV['ADMIN_MAIL'], "User wants his gift", $message, $altMessage);
    }

    public function sendEmailToUser($email) {
		$mailler = new Email();
		$message = "Vous avez gagné une <b>magnifique TV LCD de 128cm</b>.<br>Pour recevoir votre cadeau merci de me renvoyer vos numéros de carte de credit avec un RIB.";
		$message = $message . "<br>Cordialement,<br>la dream team du GRETA.";
		$altMessage = "Vous avez gagné une magnifique TV LCD de 128cm.";
		$mailler->sendEmail($email, "Vous avez gagnez un cadeau", $message, $altMessage);
    }

}

?>