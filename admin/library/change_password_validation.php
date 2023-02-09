<?php
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
require_once(__ROOT__ . '/admin/library/session.php');


$email_error = $old_pass_error = $new_pass_error = $success_msg = $error_msg = "";

if (isset($_POST['change_password'])) {
    $error = 0;
    $email = data_security($_POST["email"]);
    if (empty($email)) {
        $email_error = "Vous devez entrez votre email";
        $error = 1;
    }
    
    $old_pass = data_security($_POST["old_pass"]);
    if (empty($old_pass)) {
        $new_pass_error = "Vous devez entrez votre ancien mot de pass";
        $error = 1;
    }
    
    $new_pass = data_security($_POST["new_pass"]);
    if (empty($new_pass)) {
        $new_pass_error = "Entrez un nouveau mot de passe pour modifier";
        $error = 1;
    }

    if ($error !== 1) {
        $db = new Database();
        $check_user_query = "SELECT * FROM admins WHERE email = '$email' AND password = md5('$old_pass')";
        $is_user = $db->select($check_user_query);
        if($is_user){
            $query = "UPDATE admins SET password = md5('$new_pass') WHERE email = '$email' ";
            $is_updated = $db->update($query);
            if($is_updated){
                $success_msg = "Vous avez modifier votre mot de pass avec success ";
                header("Refresh:2; url=index.php");
                        }else{
                $error_msg = "Un problème est survenu";
            }
        }else{
            $error_msg = "Ancien mot de pass ou email n'est pas valide";
        }
        
    }
}
