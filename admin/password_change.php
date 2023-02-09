<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/change_password_validation.php');
?>

<?php $title = 'Changer mdp';

ob_start(); ?>
<div class="container-fluid">
    <div class="card mb-4 mt-3 mt-sm-5 w-75 mx-auto">
        <div class="text-danger text-center"> <?php echo $error_msg  ?> </div>
        <div class="text-success text-center"> <?php echo $success_msg ?> </div>
        <h5 class="card-header">
            Changer le mot de passe
        </h5>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">L'adresse Email </label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" placeholder="Entrez votre email">
                        <small class="text-danger"><?= $email_error ?></small>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="sujet" class="col-sm-4 col-form-label">Ancien mot de passe</label>
                    <div class="col-sm-8">
                        <input type="text" name="old_pass" class="form-control" placeholder="Entrez ancien mot de passe">
                        <small class="text-danger"><?= $old_pass_error ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sujet" class="col-sm-4 col-form-label">Nouveau mot de passe</label>
                    <div class="col-sm-8">
                        <input type="password" name="new_pass" class="form-control" placeholder="Entrez un nouveau mot de passe">
                        <small class="text-danger"><?= $new_pass_error  ?></small>
                    </div>
                </div>
                
                <div class="text-right">
                    <button type="submit" name="change_password" class="btn btn-outline-secondary col-sm-3 "> Modifier </button>
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