<?php
define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__ . '/madame_nur/library/database.php');
    require_once(__ROOT__ . '/madame_nur/library/functions.php');
    $db = new Database();
    $query = "SELECT recipes.* , admins.prenom , recipe_category.cat_name FROM recipes JOIN admins on recipes.admin_id = admins.admin_id JOIN recipe_category ON recipe_category.cat_id = recipes.cat_id ORDER BY recipes.created_on  DESC LIMIT 2 ";

    $last_recipes = $db->select($query);
   

?>

<?php $title = 'Accueil';

ob_start(); ?>

<!-- recette dernières et recette populaires sections -->
<div class="col-12 col-lg-9">
    <div class="row">
        <div class="col-12">
            <!-- recettes dernières -->
            <div class="col-12 mt-3 ">
                <div class="row justify-content-center">
                    <span class="col-3 border-top mt-4 border-success"></span>
                    <div>
                        <h5 class="col-2 text-secondary mb-0"> dernièrs </h5>
                        <h5 class="col -2 text-success mb-0"> recettes </h5>
                    </div>
                    <span class="col-3 border-top mt-4 border-success"></span>
                </div>
            </div>
            <!-- slide start -->
        </div>
        <?php if($last_recipes) while($row = $last_recipes->fetch_assoc()){ ?>
            <div class="col-12 col-sm-6 mt-3">
                <div class="card">
                    <h5 class="text-center nur_back_color py-1 text-white "> <?= shortText($row['title'] , 30) ?>
                    </h5>
                    <div class="p-1">
                        <p class="mx-2 mb-2 text-secondary"> <?= shortText($row['summary'] , 145) ?>
                        </p>

                        <div>
                            <img class="d-block w-100" src="/madame_nur/admin/uploads/<?= $row['image'] ?>" alt="Second slide" style="min-height: 250px; max-height: 250px;">
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