<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
$db = new Database();
$query = "SELECT recipes.* , admins.prenom , recipe_category.cat_name FROM recipes JOIN admins on recipes.admin_id = admins.admin_id JOIN recipe_category ON recipe_category.cat_id = recipes.cat_id";
$result = $db->select($query);
$success_msg = "";
?>

<?php $title = 'Listes de recettes';

ob_start(); ?>
<div class="container-fluid">
    <div class="card mb-4 mt-3">
        <?php
                $success = $error_msg = '';
                if (isset($_GET['del'])) {
                    $query = "DELETE from recipes WHERE recipe_id = '$_GET[del]'";
                    if($db->delete($query)){
                        unlink(__ROOT__.'/admin/uploads/'.$_GET['img']);
                        $success = "Recette supprimée avec succès";
                        header('Refresh:2; url=recipeList.php');
                    
                    }else{
                        $error_msg = "Un problème est survenu.";
                    }
                }
                ?>
                 <!-- delete book php section -->
                 <?php 
                    echo $success;
                    echo $error_msg;
            ?>
        <h5 class="card-header">
            Liste de toutes les recettes
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <?= $success_msg ?>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-light">
                            <th>N°</th>
                            <th>Titre</th>
                            <th class="d-none d-md-table-cell">Description</th>
                            <th>Recette type </th>
                            <th>publié par</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Titre</th>
                            <th class="d-none d-md-table-cell"> Description</th>
                            <th>Recette type </th>
                            <th>publié par</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;  if($result) while($row = $result->fetch_assoc()){ ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['title'] ?></td>
                                <td> <?= shortText($row['summary'] , 40) ?> </td>
                                <td><?= $row['cat_name'] ?></td>
                                <td class="d-none d-md-table-cell"> <?= $row['prenom'] ?></td>
                                <td> <?=  date('m/d/Y' , strtotime($row['created_on'])) ?> </td>
                                <td>
                                     <a class="mx-1 text-secondary" href="recipeEdit.php?id=<?= $row['recipe_id'] ?>"> <strong>Edit</strong> </a>
                                        <span> ||</span>
                                        <a class="mx-1  text-secondary" href="recipeList.php?del=<?= $row['recipe_id'] ?>&img=<?= $row['image']?>"onclick="return confirm('Are you sure you want to delete?');"> <strong>Supprimer</strong> </a>
                                </td>
                            </tr>
                        <?php $i++ ; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>

<?php
$content = ob_get_clean();
require_once(__ROOT__ . '/admin/include/template_admin.php');
?>