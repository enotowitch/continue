<? 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "DB.php";
require_once "functions.php";


require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


$forgot_pass = generatePassword();
$user_mail = $_POST['mail'];
$server_name = $_SERVER["SERVER_NAME"];


if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){

	// ! update & store
	$user = R::find('user', 'user_mail = ?', [$_POST['mail']]);

	// if such user exists
	if($user){
		foreach($user as $user){
			$user_id = $user['id'];
		}
		$user = R::load('user', $user_id);
		$user->user_pass = md5($forgot_pass);
		R::store($user);
	
		// ! send mail
		$mail = new PHPMailer();
		$mail->isSMTP();                   
		$mail->Host = "ssl://smtp.gmail.com";
		$mail->SMTPAuth   = true;
		$mail->Username   = 'en.enotowitch4';
		$mail->Password   = 'qwerty123Q_';
		$mail->SMTPSecure = 'ssl';
		$mail->Port   = 465;
		
		$mail->setFrom('en.enotowitch4@gmail.com', '1 click apply, Remote Jobs!'); // from
		$mail->addAddress($_POST['mail'], ''); // to
		
		$mail->Subject = '1 click apply, Remote Jobs!';
		$mail->msgHTML("<html><body>
							 <h1>You resetted the password!</h1>
							 <p>Your NEW password: $forgot_pass</p>
							 <p><a href='$server_name/login.php?mail=$user_mail&pass=$forgot_pass&role=$role'>Your profile</a></p>
							 </html></body>");
		// Sending
		if ($mail->send()) {
		  echo 'Email Sent!';
		} else {
		  echo 'Error: ' . $mail->ErrorInfo;
		}
	}
	
}

?>