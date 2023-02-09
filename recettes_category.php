<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/madame_nur/library/database.php');
require_once(__ROOT__ . '/madame_nur/library/functions.php');
$db = new Database();
$query = "SELECT recipes.* , admins.prenom , recipe_category.cat_name FROM recipes JOIN admins on recipes.admin_id = admins.admin_id JOIN recipe_category ON recipe_category.cat_id = recipes.cat_id WHERE recipes.cat_id = '$_GET[id]'  ORDER BY recipes.created_on  DESC LIMIT 6  ";

$recipes = $db->select($query);

$query = "SELECT cat_name from recipe_category WHERE cat_id = '$_GET[id]'";
$cat_name = $db->select($query);
$row = $cat_name->fetch_assoc();;
$cat_name = $row['cat_name'];

?>

<?php $title = 'recette category';

ob_start(); ?>

<!-- recettes_category body  -->
<div class=" col-12 col-md-9 mt-3 mb-1">
    <div class="row justify-content-center">
        <div class="col-1 line_1 d-none d-sm-block align-self-center mr-3 "></div>
        <p class="text-secondary text-center h3"> Toutes les recettes <?= $cat_name  ?> </p>
        <div class="col-1 d-none d-sm-block line_1 align-self-center ml-3 "></div>
    </div>
    <hr class="mb-0">
    <!-- all recipes category such as d'papéritif, recette d'entrée  -->

    <div class="container row mt-2">
        <?php if($recipes) while($row = $recipes->fetch_assoc()){ ?>
            <div class="col-12 col-sm-6 mt-3">
                <div class="card">
                    <h5 class="text-center nur_back_color py-1 text-white "> <?= shortText($row['title'] , 30) ?>
                    </h5>
                    <div class="p-1">
                        <p class="mx-2 mb-2 text-secondary"> <?= shortText($row['summary'] , 145) ?>
                        </p>

                        <div>
                            <img class="d-block w-100"  src="/madame_nur/admin/uploads/<?= $row['image'] ?>" alt="Second slide" style="min-height: 250px; max-height: 250px;" alt="Second slide">
                        </div>
                    </div>
                    <div class="mt-1">
                        <div class="text-center mb-2 mr-3">
                            <small class="text-muted pl-2"> Publié le: <?= date('m/d/Y' , strtotime($row['created_on'])) ?>
                            </small>
                        </div>
                        <div class="col-12 text-center">
                            <a href="recettes_single.php?id=<?= $row['recipe_id'] ?>" class="h6 col-8 col-md- btn btn-sm btn-outline-success">En savoir
                                plus</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
require_once(__ROOT__ . '/madame_nur/include/aside.php');
$content = ob_get_clean();

require_once(__ROOT__ . '/madame_nur/include/template.php');
?>