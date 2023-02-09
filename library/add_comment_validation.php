
<?php

require_once(__ROOT__ . '/madame_nur/library/Database.php');
require_once(__ROOT__ . '/madame_nur/library/functions.php');


// image insertion ok
$nom_error = $prenom_error = $comment_error = $message_error =  $error_msg  = $email_error = $success_msg = "";

if (isset($_POST['add_comment'])) {
    // last name check
    $error = 0;
    $last_name = data_security($_POST['last_name']);
    if (empty($last_name)) {
        $nom_error = "You can't let this field empty.";
        $error = 1;
    }
   
    // first name check
    $first_name = data_security($_POST['first_name']);
    if (empty($first_name)) {
        $prenom_error = "You can't let this field empty.";
            $error = 1;
    }
    // emails check
    $email = data_security($_POST['email']);
    if (empty($email)) {
        $email_error = "You can't let this field empty";
            $error = 1;
    }else{
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 1;
            $email_error = "Invalid email format";
        }
    }

    $message = data_security($_POST['coment']);
    if (empty($message)) {
        $message_error = "You can't let this field empty.";
            $error = 1;
    }

    if ($error !== 1) {
        $db = new Database();
        $query = "INSERT INTO commenter (nom, prenom , email)
        VALUES ('$last_name' , '$first_name', '$email');";
        $is_inserted = $db->insert($query);
        if($is_inserted){
            $query = "INSERT INTO comments (comments , recipe_id , commenter_id)
            VALUES('$message' , '$_GET[id]' , '$is_inserted');
            ";
            $is_inserted = $db->insert($query);
            $success_msg = "Comment added successfully";
        }else{

        }
    }
}
