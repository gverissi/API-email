<?php

namespace App\Models;

use PHPMailer\PHPMailer\Exception;

class Email extends EmailManager {
	
    public function sendEmail($email) {
		$mail = $this->maillerConnect();
		try {
			//Recipients
			$mail->addAddress($_ENV['ADMIN_MAIL']);	// Add a recipient
			$mail->addAddress($_ENV['USER_MAIL']);	// Name is optional
			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = 'This is not poker';
			$mail->Body    = 'Un utilisateur réclame son <b>cadeau</b> : ' . $email;
			$mail->AltBody = 'Un utilisateur réclame son cadeau : ' . $email;
			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
	
}

?>