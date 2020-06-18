<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EmailManager {
    protected function maillerConnect() {
		$mail = new PHPMailer(true);
		//Server settings
		// $mail->SMTPDebug	= SMTP::DEBUG_SERVER;			// Enable verbose debug output
		$mail->isSMTP();									// Send using SMTP
		$mail->Host			= $_ENV['SMTP_HOST'];			// Set the SMTP server to send through
		$mail->SMTPAuth		= true;							// Enable SMTP authentication
		$mail->Username		= $_ENV['SMTP_USERNAME'];		// SMTP username
		$mail->Password		= $_ENV['SMTP_PASSWORD']; 		// SMTP password
		$mail->SMTPSecure	= PHPMailer::ENCRYPTION_SMTPS;	// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port			= $_ENV['SMTP_PORT'];			// TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		//Recipients
		$mail->setFrom($_ENV['ADMIN_MAIL'], 'This is not poker');
		return $mail;
    }
}

?>