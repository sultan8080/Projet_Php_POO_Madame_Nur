<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
require_once(__ROOT__ . '/admin/library/sendEmail.php');
$db = new Database();
$query = "SELECT email FROM contact_table WHERE cont_person_id = '$_GET[id]' ";
$result = $db->select($query);
$row = $result->fetch_assoc();
?>

<?php $title = 'Repondre Email ';

ob_start(); ?>
<div class="container-fluid">
    <div class="card mb-4 mt-3 mt-sm-5 w-75 mx-auto">
        <h5 class="card-header">
            Repondre de l'email
        </h5>
        <div class="card-body">
            <form action="" method="POST">
                <small class="text-success text-center"><?php  echo $success; ?></small>
                <small class="text-danger text-center"><?php  echo $error_msg; ?></small>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">À</label>
                    <div class="col-sm-8">
                        <input type="text" name="email_to" class="form-control" value="<?= $row['email'] ?>" readonly>
                        <small class="text-danger"> <?php echo $email_to_error; ?> </small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sujet" class="col-sm-4 col-form-label">Sujet</label>
                    <div class="col-sm-8">
                        <input type="text" name="subject" class="form-control" placeholder="Subjet of the Email" required="required">
                        <small class="text-danger"> <?php echo $subject_error; ?> </small>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="message" class="col-sm-4 col-form-label">Message</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="message" placeholder="the whole email text here" rows="4" required="required"></textarea>
                         <small class="text-danger"> <?php echo $message_error; ?> </small>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" name="send_email" class="btn btn-outline-secondary col-sm-3 "> Envoyer l'email </button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>

<?php
$content = ob_get_clean();
require_once(__ROOT__ . '/admin/include/template_admin.php');
?>