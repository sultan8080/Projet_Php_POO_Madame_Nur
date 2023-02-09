<?php
define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__ . '/madame_nur/library/database.php');
    require_once(__ROOT__ . '/madame_nur/library/functions.php');
    require_once(__ROOT__ . '/madame_nur/library/add_comment_validation.php');
    $db = new Database();

    $query = "SELECT recipes.* , admins.prenom , recipe_category.cat_name FROM recipes JOIN admins on recipes.admin_id = admins.admin_id JOIN recipe_category ON recipe_category.cat_id = recipes.cat_id where recipe_id = '$_GET[id]'";
    $recipe = $db->select($query);


?>

<?php $title = 'Recette details';

ob_start(); ?>

<!-- recete single details body  -->
<div class="col-12 col-lg-9 mt-3">
    <div class="row justify-content-center">
        <?php $row = $recipe->fetch_assoc() ?>
        <div class="col-1 line_1 d-none d-sm-block align-self-center mr-3 "></div>
        <h3 class="text-secondary text-center"><?= $row['title'] ?></h3>
        <div class="col-1 d-none d-sm-block line_1 align-self-center ml-3 "></div>
        <div class="col-12 col-md-5 mt-0">
            <p class="published_date text_gray mb-0 text-left pl-2 text-center"> Publié le <?= date('M d, Y, h:i A' , strtotime($row['created_on'])) ?>
            </p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 col-md-8">
            <div>
                <img src="/madame_nur/admin/uploads/<?= $row['image'] ?>" alt="" style="min-height: 275px; max-height: 275px;">
            </div>
        </div>
        <div class="col-12 col-md-4 d-flex align-items-start pl-lg-0 mt-3">
            <table class="table text-secondary">
                <tbody class="h6">
                                       <tr>
                        <td class="py-md-1">Temps de préparation</td>
                        <td class="py-md-1"><?= $row['prepare_time'] ?> min</td>

                    </tr>
                    <tr>
                        <td class="py-md-1">Temps de cuisson</td>
                        <td class="py-md-1"><?= $row['cook_time'] ?> min</td>
                    </tr>
                    <tr>
                        <td class="py-md-1">Portions </td>
                        <td class="py-md-1"><?=  $row['portion'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="text_gray h5 text-center text_green_light"><?= $row['summary'] ?>
    </div>

    <div class="row">
        
        <div class="col-12 col-md-4">
            <ul class="list-group text-secondary text-center text-md-left">
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_1'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_2'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_3'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_4'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_5'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_6'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_7'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_8'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_9'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_10'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_11'] ?></li>
                <li class="list-group-item list-group-item-secondary text-black h5 mb-0"><?= $row['qnt_12'] ?></li>
                
            </ul>
        </div>
        <hr>
        <div class="col-12 col-md-8">
            <ul class="list-group text-secondary text-center text-md-left">
                <li class="list-group-item list-group-item-secondary text-black h5">Réalisation
                </li>
            </ul>
            <table class="table border">
                <tbody>
                    <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">1</span> </td>
                        <td> <?= $row['step_1'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">2</span> </td>
                        <td> <?= $row['step_2'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">3</span> </td>
                        <td> <?= $row['step_3'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">4</span> </td>
                        <td> <?= $row['step_4'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">5</span> </td>
                        <td> <?= $row['step_5'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">6</span> </td>
                        <td> <?= $row['step_6'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">7</span> </td>
                        <td> <?= $row['step_7'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">8</span> </td>
                        <td> <?= $row['step_8'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">9</span> </td>
                        <td> <?= $row['step_9'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">10</span> </td>
                        <td> <?= $row['step_10'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">11</span> </td>
                        <td> <?= $row['step_11'] ?>
                        </td>
                    </tr> <tr>
                        <td> <span class="rounded-circle px-2 py-1  border shadow">12</span> </td>
                        <td> <?= $row['step_12'] ?>
                        </td>
                    </tr>
                    

                </tbody>
            </table>
        </div>
    </div>
    <div class="card my-3">
        <div class="row justify-content-center my-3">
            <div class="col-1 line_1 d-none d-sm-block align-self-center mr-3 "></div>
            <h4 class="text-secondary text-center"> Regarder la recette expliquée en vidéo </h4>
            <div class="col-1 d-none d-sm-block line_1 align-self-center ml-3 "></div>
        </div>
        <div class="mx-auto col-12 col-md-9 bg-secondary p-5">
            <div class="embed-responsive embed-responsive-16by9 border">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= substr($row['video_link'], strrpos($row['video_link'], '/') + 1);?>" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="col-12 mt-4">
        <div class="row justify-content-center mb-0">
            <div class="col-1 line_1 d-none d-sm-block align-self-center mr-3 "></div>
            <h4 class="text-secondary text-center"> laisser votre commentaire </h4>
            <div class="col-1 d-none d-sm-block line_1 align-self-center ml-3 "></div>
        </div>
        <p class="text-center text-secondary mt-0"> (Votre adresse de messagerie ne sera pas publiée) </p>
    </div>
    <div class="col-12 mt-3">
        <form action="" method="POST">
            <?=  $success_msg ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" placeholder="Nom" name="last_name" required="required">
                    <small class="text-danger"><?= $nom_error ?></small>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Prenom</label>
                    <input type="text" class="form-control" placeholder="Prenom" name="first_name" required="required">
                     <small class="text-danger"><?= $prenom_error ?></small>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required="required">
                <small class="text-danger"><?= $email_error ?></small>
            </div>
            <div class="form-group form-row justify-content-between">
                <div>
                    <label for="exampleFormControlTextarea1">Votre commentaire</label>
                </div>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="coment" required></textarea>
                <small class="text-danger"><?=  $message_error ?></small>
            </div>
            
            <div class="d-flex justify-content-around">
                <button type="submit" name="add_comment" class="btn w-50 btn-success mt-4">Publié</button>
            </div>
        </form>
    </div>

    <div class="col-12 mt-4">
        <div class="row justify-content-center mb-0">
            <div class="col-1 line_1 d-none d-sm-block align-self-center mr-3 "></div>
            <?php
              $count_query = "SELECT COUNT(comment_id) as total_comment FROM comments WHERE recipe_id = '$_GET[id]'";
              $result = $db->select($count_query);
              $total_comment = $result->fetch_assoc();
             ?>
            <h4 class="text-secondary text-center"> Tous les commentaires (<?= $total_comment['total_comment'] ?>) </h4>
            <div class="col-1 d-none d-sm-block line_1 align-self-center ml-3 "></div>
        </div>

        <div class="card p-4">
            <?php 
                $comments_query = "SELECT comments.* , commenter.nom , commenter.prenom  FROM comments JOIN commenter ON commenter.commenter_id = comments.commenter_id WHERE comments.recipe_id = '$_GET[id]'";
                $result = $db->select($comments_query);
             ?>
            <?php if($result)  while($comment_row = $result->fetch_assoc()){ ?>   
                <div class=" border-bottom p-4">
                    <div class="text-secondary">
                        <p class="mb-0"><strong> <i class="fa fa-user "></i> <?=  $comment_row['prenom'] . " ". $comment_row['nom'] ?></strong> </p>
                        <small class="text-muted"> (Publié le <?= date('M d, Y, h:i A' , strtotime($comment_row['date_created'])) ?>) </small>
                        <p> <?= $comment_row['comments']  ?> </p>
                    </div>
                </div>
                <?php  
                    $reply_query  = "SELECT * FROM reply WHERE comment_id = '$comment_row[comment_id]'";
                    $rep_result = $db->select($reply_query);
                 ?>
                <?php if($rep_result) while($rep_row = $rep_result->fetch_assoc()){ ?>
                    <div class=" border-bottom p-4 ml-5">
                        <div class="text-secondary">
                            <p class="mb-0"><strong> <i class="fa fa-user "></i> Admin </strong> </p>
                            <small class="text-muted"></small>
                            <p> <?= $rep_row['reply_message']  ?> </p>
                        </div>
                    </div>
                <?php } ?>
            <?php  } ?>
            
        </div>
    </div>
</div>

<?php
require_once(__ROOT__ . '/madame_nur/include/aside.php');

$content = ob_get_clean();
require_once(__ROOT__ . '/madame_nur/include/template.php');
?>