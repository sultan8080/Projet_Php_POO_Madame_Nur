<?php
define('__ROOT__', dirname(dirname(__FILE__)));
?>

<?php $title = 'Nouvel Admin';

ob_start(); ?>
<div class="container-fluid">
    <div class="card mb-4 mt-3 mt-sm-5 w-75 mx-auto">
        <h5 class="card-header">
            Modifier l'information d'un administrateur </h5>
        <div class="card-body">
            <form class="mt-2" action="" method="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" value="Last name of the admin">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name">Prenom</label>
                        <input type="text" class="form-control" value="First name of the admin">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" value="Email of the admin">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" class="form-control" value="mot de passe" name="mdp">
                    <small class="form-text text-danger"> </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" value="mot de passe" name="mdp">
                    <small class="form-text text-danger"> </small>
                </div>
                
                <div class="d-flex justify-content-around">
                    <button type="submit" name="submit" class="btn w-50 btn-secondary mt-4"> Modifier </button>
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