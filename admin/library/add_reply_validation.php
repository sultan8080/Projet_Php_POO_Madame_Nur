<?php
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
require_once(__ROOT__ . '/admin/library/session.php');


$reply_msg_error = $success_msg = $error_msg = "";

if (isset($_POST['add_reply'])) {
    $reply_msg = data_security($_POST["reply_msg"]);
    $error = 0;
    if (empty($reply_msg)) {
        $reply_msg_error = "Vous devez remplir ce champs";
        $error = 1;
    }

    if ($error !== 1) {
        $db = new Database();

        $session = new Session();
        $admin_email = $session->get("alogin");
        $query = "SELECT admin_id from admins WHERE email = '$admin_email'";
        $result = $db->select($query);
        $row = $result->fetch_assoc();
        $admin_id = $row['admin_id'];

        $query = "INSERT INTO reply (reply_message , comment_id , admin_id) VALUES('$reply_msg' , '$_GET[id]' , '$admin_id')";
        $is_inserted = $db->insert($query);
        if ($is_inserted) {
            $success_msg = " message répondu avec success ";
            header("Refresh:2; url=index.php");
        } else {
            $error_msg = "Un problème est survenu";
        }
    }
}
