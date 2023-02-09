
<?php

require_once(__ROOT__ . '/madame_nur/library/Database.php');
require_once(__ROOT__ . '/madame_nur/library/functions.php');


// image insertion ok
$nom_error = $prenom_error = $subject_error = $email_error = $message_error = $success = "";

if (isset($_POST['add_contact'])) {
    // name check
    $error = 0;
    $last_name = data_security($_POST['last_name']);
    if (empty($last_name)) {
        $nom_error = "Vous devez insérer votre nom";
        $error = 1;
    }
   
    // last name check
    $first_name = data_security($_POST['first_name']);
    if (empty($first_name)) {
        $prenom_error = "Vous devez insérer votre prenom";
        if($error != 0){
            $error = 1;
        }
    }
    // subject check
    $subject = data_security($_POST['subject']);
    if (empty($subject)) {
        $subject_error = "Vous devez écrire votre sujet";
        if($error != 0){
            $error = 1;
        }
    }
    // Emal check
    $email = data_security($_POST['email']);
    if (empty($email)) {
        $email_error = "Vous devez insérer votre email";
        if($error != 0){
            $error = 1;
        }
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 1;
            $email_error = "votre n'est pas valide";
        }
    }
    $message = data_security($_POST['message']);
    if (empty($message)) {
        $message_error = "Vous devez écrire votre message";
        if($error != 0){
            $error = 1;
        }
    } else {
    }

    if ($error !== 1) {
        $db = new Database();
        $query = "INSERT INTO contact_table (nom, prenom , email , sujet , email_texts )
        VALUES ('$last_name' , '$first_name', '$email' , '$subject' , '$message');";
        $db->insert($query);
        $success = "Votre message a été envoyé avec succès, nous vous contacterons dans les plus brefs délais";
    }
}
