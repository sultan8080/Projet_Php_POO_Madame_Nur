<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/add_reply_validation.php');
?>

<?php $title = 'Repondre commentaire ';

ob_start(); ?>
<div class="container-fluid">
    <div class="card mb-4 mt-3 mt-sm-5 w-75 mx-auto">
        <?= $error_msg ?>
        <h5 class="card-header">
            Repondre de commentaire
        </h5>
        <div class="mt-1 text-danger text-center"> <?php echo $error_msg  ?> </div>
        <div class="text-success text-center"> <?php echo $success_msg ?> </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group row">
                    <label for="comment" class="col-sm-4 col-form-label">Admin comments</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="reply_msg" placeholder="admin reply of a subscriber comment will  be here" rows="4" required="required"></textarea>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" name="add_reply" class="btn btn-outline-secondary col-sm-3 "> Publier </button>
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