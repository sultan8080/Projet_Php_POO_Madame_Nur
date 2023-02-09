<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/recipe_validation.php');
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
$db = new Database();
$query = "SELECT * FROM recipe_category";
$cats = $db->select($query);

$query = "SELECT recipes.* , admins.prenom , recipe_category.cat_name FROM recipes JOIN admins on recipes.admin_id = admins.admin_id JOIN recipe_category ON recipe_category.cat_id = recipes.cat_id where recipe_id = '$_GET[id]'";
$recipe = $db->select($query);


?>
<?php $title = 'Nouvelle recette ';

ob_start(); ?>
<div class="container-fluid">
    <div class="card mb-4 mt-3">
        <h5 class="card-header">
            Modifier une nouvelle recette
        </h5>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <?= $success_msg ?>
                <?= $error_msg ?>
                <?php $recipe = $recipe->fetch_assoc();  ?>
                <div class="form-group row">
                    <label for="titre" class="col-sm-4 col-form-label">Titre</label>
                    <div class="col-sm-8">
                        <input type="text" name="title" class="form-control" placeholder="Ecrire le titre" required="required" value="<?= $recipe['title'] ?>">
                        <small class="text-danger"><?= $title_error ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="recette_category" class="col-sm-4 col-form-label"> Type de catégorie de recette </label>
                    <div class="col-sm-8">
                        <select class="form-control" name="cat_type" required="required">
                                <?php while($row = $cats->fetch_assoc()){ ?>
                                        <option <?php if($recipe['cat_id'] == $row['cat_id'] ) echo "selected"; ?>   value="<?= $row['cat_id'] ?>"> <?= $row['cat_name'] ?> </option>
                                <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="temps_preparation" class="col-sm-4 col-form-label">Temps de Préparation</label>
                    <div class="col-sm-8">
                        <input type="text" name="prep_time" class="form-control" placeholder="Entrez le temps de préparation" value="<?= $recipe['prepare_time'] ?>" required="required">
                        <small class="text-danger"><?= $prep_time_error ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="temps_cuissons" class="col-sm-4 col-form-label">Temps de cuisson</label>
                    <div class="col-sm-8">
                        <input type="text" name="cook_time" class="form-control" placeholder="Entrez le temps de cuisson" value="<?= $recipe['cook_time'] ?>" required="required">
                        <small class="text-danger"><?= $cook_time_error ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="portions" class="col-sm-4 col-form-label">Portions</label>
                    <div class="col-sm-8">
                        <input type="text" name="portion" class="form-control" placeholder="Entrez le portions" value="<?= $recipe['portion'] ?>" required="required">
                        <small class="text-danger"><?= $portion_error ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="imgae1" class="col-sm-4 col-form-label">Télécharger une image</label>
                    <div class="col-sm-8">
                            <img src="<?= 'uploads/'.$recipe['image'] ?>" style="min-height: 150px; max-height: 150px;">
                        <div class="custom-file">
                            <input type="hidden" name="old_cover_image" value="<?= $recipe['image'] ?>">
                            <input type="file" name="cover_image"  id="validatedCustomFile">
                            <small class="text-danger"><?= $img_error ?></small>
                        </div>
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="video_link" class="col-sm-4 col-form-label">Le lien Vidéo </label>
                    <div class="col-sm-8">
                        <input type="url" name="video_link" class="form-control" placeholder="Entrez le lien Vidéo" value="<?= $recipe['video_link'] ?>"  required>
                        <small class="text-danger"><?= $video_error ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="summary" class="col-sm-4 col-form-label">Résumé de la recette</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="summary" rows="3" required><?= $recipe['summary'] ?></textarea>
                        <small class="text-danger"><?= $summary_error ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <?php 

                        $ingr_query = "SELECT * FROM ingredients_used WHERE recipe_id = '$recipe[recipe_id]' ";
                        $result = $db->select($ingr_query);
                        $ingr = $result->fetch_assoc();

                      ?>
                    <label for="ingredient" class="col-sm-4 col-form-label"> Ingredients </label>
                    <div class="col-sm-8 d-flex flex-column" id="more_field">
                        <input type="text" name="ingredient1" class="form-control my-2" placeholder="l'ingredient et l'quantité " required="required" value="<?= $ingr['qnt_1'];  ?>">
                        <small class="text-danger"><?= $ingredient1_error ?></small>
                        <input type="text" name="ingredient2" class="form-control my-2" placeholder="l'ingredient et l'quantité "
                        value="<?= $ingr['qnt_2'];  ?>">
                        <input type="text" name="ingredient3" class="form-control my-2" placeholder="l'ingredient et l'quantité "value="<?= $ingr['qnt_3'];  ?>">
                        <input type="text" name="ingredient4" class="form-control my-2" placeholder="l'ingredient et l'quantité " value="<?= $ingr['qnt_4'];  ?>">
                        <input type="text" name="ingredient5" class="form-control my-2" placeholder="l'ingredient et l'quantité " value="<?= $ingr['qnt_5'];  ?>">
                        <input type="text" name="ingredient6" class="form-control my-2" placeholder="l'ingredient et l'quantité " value="<?= $ingr['qnt_6'];  ?>">
                        <input type="text" name="ingredient7" class="form-control my-2" placeholder="l'ingredient et l'quantité " value="<?= $ingr['qnt_7'];  ?>">
                        <input type="text" name="ingredient8" class="form-control my-2" placeholder="l'ingredient et l'quantité " value="<?= $ingr['qnt_8'];  ?>">
                        <input type="text" name="ingredient9" class="form-control my-2" placeholder="l'ingredient et l'quantité " value="<?= $ingr['qnt_9'];  ?>">
                        <input type="text" name="ingredient10" class="form-control my-2" placeholder="l'ingredient et l'quantité " value="<?= $ingr['qnt_10'];  ?>">
                        <input type="text" name="ingredient11" class="form-control my-2" placeholder="l'ingredient et l'quantité " value="<?= $ingr['qnt_11'];  ?>">
                        <input type="text" name="ingredient12" class="form-control my-2" placeholder="l'ingredient et l'quantité " value="<?= $ingr['qnt_12'];  ?>">
                    </div>
                    
                </div>
                <?php 

                    $prep_query = "SELECT * FROM preparation_details WHERE recipe_id = '$recipe[recipe_id]' ";
                    $result = $db->select($prep_query);
                    $prep = $result->fetch_assoc();

                  ?>
                <div class="form-group row">
                    <label for="preparation" class="col-sm-4 col-form-label"> Preparation </label>
                    <div class="col-sm-8 d-flex flex-column " id="more_field">
                        <input type="text" name="preparation1" class="form-control my-2" placeholder="étape 1" required="required" value="<?= $prep['step_1'] ?>">
                        <small class="text-danger"><?= $preparation1_error ?></small>
                        <input type="text" name="preparation2" class="form-control my-2" placeholder="Étape 2" value="<?= $prep['step_2'] ?>">
                        <input type="text" name="preparation3" class="form-control my-2" placeholder="Étape 3" value="<?= $prep['step_3'] ?>">
                        <input type="text" name="preparation4" class="form-control my-2" placeholder="Étape 4" value="<?= $prep['step_4'] ?>">
                        <input type="text" name="preparation5" class="form-control my-2" placeholder="Étape 5" value="<?= $prep['step_5'] ?>">
                        <input type="text" name="preparation6" class="form-control my-2" placeholder="Étape 6" value="<?= $prep['step_6'] ?>">
                        <input type="text" name="preparation7" class="form-control my-2" placeholder="Étape 7" value="<?= $prep['step_7'] ?>">
                        <input type="text" name="preparation8" class="form-control my-2" placeholder="Étape 8" value="<?= $prep['step_8'] ?>">
                        <input type="text" name="preparation9" class="form-control my-2" placeholder="Étape 9" value="<?= $prep['step_9'] ?>">
                        <input type="text" name="preparation10" class="form-control my-2" placeholder="Étape 10" value="<?= $prep['step_10'] ?>">
                        <input type="text" name="preparation11" class="form-control my-2" placeholder="Étape 11" value="<?= $prep['step_11'] ?>">
                        <input type="text" name="preparation12" class="form-control my-2" placeholder="Étape 12" value="<?= $prep['step_12'] ?>">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="update_recipe" class="btn btn-outline-success col-sm-6 col-12 "> Enregistrer</button>
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