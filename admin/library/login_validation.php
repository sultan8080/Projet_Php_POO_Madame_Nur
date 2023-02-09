<?php
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
require_once(__ROOT__ . '/admin/library/session.php');


$email_error = $password_error = $success = $error_msg = "";

if (isset($_POST['login'])) {
    $email = data_security($_POST["email"]);
    $error = 0;
    if (empty($email)) {
        $email_error = "L'email est obligatoire";
        $error = 1;
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 1;
            $email_error = "Email invalide";
        }
    }

    $password = data_security($_POST["password"]); 
    if (empty($password)) {
        $password_error = "Mot de passe est obligatoire";
            $error = 1;
    }


    // echo $error;
    // die();

    if ($error !== 1) {
        $db = new Database();
        $query = "SELECT * from admins WHERE email = '$email' AND password = md5('$password')";
        $user = $db->select($query);
        if($user){
            $session = new Session();
            $session->set("alogin" , $_POST['email']);
            header('location: index.php');
        }else{
            $error_msg = "Échec de la connexion";
        }
    }
}
