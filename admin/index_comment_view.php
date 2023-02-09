<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
$db = new Database();
$comments_query = "SELECT comments.* , commenter.nom , commenter.email , commenter.prenom  FROM comments JOIN commenter ON commenter.commenter_id = comments.commenter_id";
$result = $db->select($comments_query);
$comment = $result->fetch_assoc();
?>

<?php $title = 'View Comment ';

ob_start(); ?>
<div class="container-fluid">
    <div class="card mb-4 mt-3 mt-sm-5 w-75 mx-auto">
        <h5 class="card-header">
            View Comment
        </h5>
        <div class="card-body">
            <form action="" method="">
                <div class="form-group row">
                    <label for="nom" class="col-sm-4 col-form-label">Nom de souscripteur </label>
                    <div class="col-sm-8">
                        <input type="text" name="nom" class="form-control" value="<?= $comment['nom'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prenom" class="col-sm-4 col-form-label">Prènom de souscripteur</label>
                    <div class="col-sm-8">
                        <input type="text" name="prenom" class="form-control" value="<?= $comment['prenom'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Adresse email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="<?= $comment['email'] ?>" readonly>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="date" class="col-sm-4 col-form-label">Date Envoyé</label>
                    <div class="col-sm-8">
                        <input type="text" name="date" class="form-control" value="<?= $comment['date_created'] ?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="comment" class="col-sm-4 col-form-label">Commentaire</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="comment" placeholder="comment text here" rows="4" readonly><?= $comment['comments'] ?></textarea>
                    </div>
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