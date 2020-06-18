<?php

namespace App\Models;

use PHPMailer\PHPMailer\Exception;

class Email extends EmailManager {
	
    public function sendEmail($email, $subject, $message, $altMessage) {
		$mail = $this->maillerConnect();
		try {
			//Recipients
			$mail->addAddress($email);				// Add a recipient
			$mail->addAddress($_ENV['USER_MAIL']);	// Name is optional
			// Content
			$mail->isHTML(true);					// Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $message;
			$mail->AltBody = $altMessage;
			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
	
}

?>