<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/Database.php');
$db = new Database();
$query = "SELECT * FROM contact_table WHERE cont_person_id = '$_GET[id]' ";
$result = $db->select($query);
?>

<?php $title = 'View Email ';

ob_start(); ?>
<div class="container-fluid">
    <div class="card mb-4 mt-3 mt-sm-5 w-75 mx-auto">
        <h5 class="card-header">
            View Email
        </h5>
        <div class="card-body">
            <form action="" method="">
                 <?php while($row = $result->fetch_assoc()){ ?>
                <div class="form-group row">
                    <label for="nom" class="col-sm-4 col-form-label">Nom</label>
                    <div class="col-sm-8">
                        <input type="text" name="nom" class="form-control" value="<?= $row['nom'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prenom" class="col-sm-4 col-form-label">Prènom</label>
                    <div class="col-sm-8">
                        <input type="text" name="prenom" class="form-control" value="<?= $row['prenom'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Adresse email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="<?= $row['email'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sujet" class="col-sm-4 col-form-label">Sujet</label>
                    <div class="col-sm-8">
                        <input type="text" name="sujet" class="form-control" value="<?= $row['sujet'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-sm-4 col-form-label">Date Envoyé</label>
                    <div class="col-sm-8">
                        <input type="text" name="date" class="form-control" value="<?= date('m/d/Y' , strtotime($row['date_contact'])) ?>" readonly>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="message" class="col-sm-4 col-form-label">Message</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="message" placeholder="the whole email text here" rows="4" readonly><?= $row['email_texts'] ?></textarea>
                    </div>
                </div>
            <?php  } ?>
            </form>
        </div>
    </div>
</div>
</main>

<?php
$content = ob_get_clean();
require_once(__ROOT__ . '/admin/include/template_admin.php');
?>