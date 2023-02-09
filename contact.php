<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/madame_nur/library/database.php');
require_once(__ROOT__ . '/madame_nur/library/functions.php');
$db = new Database();
?>

<?php $title = 'Contact';
    require_once(__ROOT__ . '/madame_nur/library/add_contact_validation.php');
ob_start(); ?>
<!-- Formulaire de contact -->
<section class="mx-auto col-12 col-md-10 bg-white ">
    <div class="row mt-3 ">
        <div class="col-12 col-md-3 bg-light border ">
            <h4 class="my-3 text-center text-secondary"> Nous contacter</h4>
            <hr>
            <p class="text-center text-secondary" >Nous serions ravis de vous entendre</p>
        </div>
        <div class="col-12 col-md-9  px-4 pt-5 pb-4 border">
            <small class="text-success"> <?php echo $success; ?> </small>
           <form class ="mt-2 text-secondary" id="contact_form" action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Nom">
                        <small class="text-danger"> <?php echo $nom_error; ?> </small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Prenom">
                        <small class="text-danger"> <?php echo $prenom_error; ?> </small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" >
                    <small class="text-danger"> <?php echo $email_error; ?> </small>
                </div>
                <div class="form-group">
                        <label for="sujet">Sujet</label>
                        <input type="text" class="form-control" name="subject" placeholder="Sujet">
                        <small class="text-danger"> <?php echo $subject_error ?> </small>
                    </div>
                <div class="form-group">
                    <label for="messages">Votre Message </label>
                    <textarea class="form-control" name="message" placeholder="Ecrire votre message ici" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <small class="text-danger"> <?php echo $message_error ?> </small>
                </div>
                <div class="text-center">
                <button type="submit" name="add_contact" class="btn btn-outline-success w-100">Envoyer <i class="fa fa-spinner fa-spin" style="display: none;"></i> </button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require_once(__ROOT__ . '/madame_nur/include/template.php');
?>