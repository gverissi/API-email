# API-email
This is a demo web service for sending an email using php mailer and Send grid.  
This web service is used by [This-Is-Not-Poker](https://github.com/gverissi/This-Is-Not-Poker) app to persist a user's email, 
email him instruction to get a gift and email the admin to notify that someone wants his gift.  
The entry point is `index.php` the there is only one end point at `/api/email` that is rewritten by the `.htacces` file 
to become `index.php?route=email`.  
There is one controller in `App/Controllers` folder with 3 functions for persisting the user's email, emailing the user and emailing the admin.  
The database and php mailer config are done with `DatabaseManager.php` and `EmailManager.php` in  `App/Models` folder. 
In the same folder the file `Database.php` has a function with the SQL query to persist an email, and `Email.php` uses php mailer to send an email.

# Get Started

## Dependencies
Clone the repo and run: `composer install`

## Send Grid
Create a free account on [SendGrid](https://sendgrid.com/).  
Create a [Single Sender Verification](https://sendgrid.com/docs/ui/sending-email/sender-verification/).  
Under the tab `Email API` -> `Integration Guide` choose SMTP Relay and `Create Key`.

## Credentials
Rename the file `.env.example` to `.env` and fil it with your database and send grid credentials.

## Access the web service
This web service is deploy in heroku at: `https://api-email-greg.herokuapp.com/`.  
If you want to use this web service from javascript do the following:  
````javascript
function fetchEmail(email) {

	let data = {
		email: email
	};
	let options = {
		method: 'POST',
		body: JSON.stringify(data)
	};
	
	let url = "https://api-email-greg.herokuapp.com/api/email";

	fetch(url, options).then(
		function () {
			alert("Votre email a bien été envoyé !\nVous allez être redirigé vers la page d'accueil.")
			window.location.replace("index.html");
		}
	).catch(
		function (error) {
			alert("Il y a eu un problème lors de l'envoie de votre email !\n Réessayer.")
			console.log("Il y a eu un problème avec l'opération fetch : ", error.message)
		}
	)

}
````
