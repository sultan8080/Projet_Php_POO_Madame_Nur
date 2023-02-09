<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(__ROOT__ . '/admin/vendor/autoload.php');


//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
$mail->SMTPDebug = FALSE;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = TRUE;                          
//Provide username and password     
$mail->Username = "chezmadamenur@gmail.com";                 
$mail->Password = "madamenur2020";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;  
//From email address and name

//CC and BCC

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->From = "chezmadamenur@gmail.com";
$mail->FromName = "Madame NUR";

//To address and name
$subject_error = $email_to_error = $message_error = $success = $error_msg = "";

if (isset($_POST['send_email'])) {
    $subject = data_security($_POST["subject"]);
    $error = 0;
    if (empty($subject)) {
        $subject_error = "Ce champ ne peut pas être vide";
        $error = 1;
    }

    $message = data_security($_POST["message"]); 
    if (empty($message)) {
        $message_error = "Ce champ ne peut pas être vide";
        $error = 1;
    }
    $email_to = data_security($_POST['email_to']);
    if (empty($email_to)) {
        $email_error = "L'email est obligatoire";
        $error = 1;
    }else{
        if(!filter_var($email_to, FILTER_VALIDATE_EMAIL)) {
            $error = 1;
            $email_error = "Email doit être valide";
        }
    }


    if ($error !== 1) {
		$mail->addAddress($email_to);
		$mail->Subject = $subject;
		$mail->Body = "<p>". $message ."</p>";
		// $mail->AltBody = "This is the plain text version of the email content";
		try {
		    $mail->send();
		    $success = "L'email a été envoyé";
		} catch (Exception $e) {
		    $error_msg = "Veuillez réessayer";
		}        
    }
}
$email_error = "";
if (isset($_POST['forget_password'])) {
    $email = data_security($_POST["email"]);
    $error = 0;
    if (empty($email)) {
        $email_error = "Ce champ ne peut pas être vide";
        $error = 1;
    }


    if ($error !== 1) {
        $db = new Database();
        $check_user_query = "SELECT * FROM admins WHERE email = '$email'";
        $is_user = $db->select($check_user_query);
        if($is_user){
            $new_pass = generateRandomString(8);
            $mail->addAddress($email);
            $mail->Subject = "Reset Password";
            $mail->Body = "<p> Votre nouveau mot de passe est maintenant: ". $new_pass ."</p>";
            // $mail->AltBody = "This is the plain text version of the email content";
            try {
                $mail->send();
                $query = "UPDATE admins set password = md5('$new_pass')";
                $db->update($query);
                $success = "Le nouveau mot de passe est envoyé à votre adresse e-mail";
            } catch (Exception $e) {
                $error_msg = "Veuillez réessayer";
            }    
        }else{
            $error_msg = "cet e-mail n'existe pas";
        }
                
    }
}
