<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/madame_nur/admin/library/Database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/madame_nur/admin/library/functions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/madame_nur/admin/library/session.php');


$title_error = $prep_time_error = $cook_time_error = $portion_error = $img_error = $video_error = $summary_error = $preparation1_error = $ingredient1_error = $success_msg = $error_msg = "";

if (isset($_POST['add_recipe']) || isset($_POST['update_recipe'])) {
    $title = data_security($_POST["title"]);
    $error = 0;
    if (empty($title)) {
        $title_error = "Vous devez écrire le titre du livre";
        $error = 1;
    }

    $prep_time = data_security($_POST["prep_time"]);
    if (empty($prep_time)) {
        $prep_time_error = "Vous devez écrire le temps de préparation";
        $error = 1;
    }

    $cook_time = data_security($_POST["cook_time"]);
    if (empty($cook_time)) {
        $cook_time_error = "Vous devez entrer le temps de cuisine";
        $error = 1;
    }

    $portion = data_security($_POST["portion"]);
    if (empty($portion)) {
        $portion_error = "Vous devez entrer le portion";
        $error = 1;
    }

    if (strlen($_FILES['cover_image']['name']) > 0) {
        $file_parts = pathinfo($_FILES['cover_image']['name']);
        $allow_extension = array("JPEG", "jpeg", "jpg", "JPG", "PNG", "png", "gif", "GIF");
        if (!in_array($file_parts['extension'], $allow_extension)) {
            $img_error = "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés à télécharger";
            $error = 1;
        }
        $cover_image = upload_img('cover_image', __ROOT__ . '/admin/uploads/');
    } else {
        if (isset($_POST['add_recipe'])) {
            $img_error = "Vous devez télécharger une image";
            $error = 1;
        } else {
            $cover_image = $_POST['old_cover_image'];
        }
    }

    if (isset($_POST['old_cover_image'])) {
        unlink(__ROOT__ . '/admin/uploads/' . $_POST['old_cover_image']);
    }

    $video_link = data_security($_POST["video_link"]);
    if (empty($video_link)) {
        $video_error = "Vous devez ajouter un video lien";
        $error = 1;
    }

    $summary = data_security($_POST["summary"]);
    if (empty($summary)) {
        $summary_error = "You can't left this field empty.";
        $error = 1;
    }
    $preparation1 = data_security($_POST["preparation1"]);
    $preparation2 = data_security($_POST["preparation2"]);
    $preparation3 = data_security($_POST["preparation3"]);
    $preparation4 = data_security($_POST["preparation4"]);
    $preparation5 = data_security($_POST["preparation5"]);
    $preparation6 = data_security($_POST["preparation6"]);
    $preparation7 = data_security($_POST["preparation7"]);
    $preparation8 = data_security($_POST["preparation8"]);
    $preparation9 = data_security($_POST["preparation9"]);
    $preparation10 = data_security($_POST["preparation10"]);
    $preparation11 = data_security($_POST["preparation11"]);
    $preparation12 = data_security($_POST["preparation12"]);
    $ingredient1 = data_security($_POST["ingredient1"]);
    $ingredient2 = data_security($_POST["ingredient2"]);
    $ingredient3 = data_security($_POST["ingredient3"]);
    $ingredient4 = data_security($_POST["ingredient4"]);
    $ingredient5 = data_security($_POST["ingredient5"]);
    $ingredient6 = data_security($_POST["ingredient6"]);
    $ingredient7 = data_security($_POST["ingredient7"]);
    $ingredient8 = data_security($_POST["ingredient8"]);
    $ingredient9 = data_security($_POST["ingredient9"]);
    $ingredient10 = data_security($_POST["ingredient10"]);
    $ingredient11 = data_security($_POST["ingredient11"]);
    $ingredient12 = data_security($_POST["ingredient12"]);
    // die();

    if ($error !== 1) {
        $db = new Database();
        $title = mysqli_real_escape_string($db->link, $title);
        $prep_time =  mysqli_real_escape_string($db->link, $prep_time);
        $cook_time =  mysqli_real_escape_string($db->link, $cook_time);
        $portion =  mysqli_real_escape_string($db->link, $portion);
        $video_link =  mysqli_real_escape_string($db->link, $video_link);
        $summary =  mysqli_real_escape_string($db->link, $summary);
        $ingredient1 =  mysqli_real_escape_string($db->link, $ingredient1);
        $preparation1 =  mysqli_real_escape_string($db->link, $preparation1);
        $preparation2 = mysqli_real_escape_string($db->link, $preparation2);
        $preparation3 = mysqli_real_escape_string($db->link, $preparation3);
        $preparation4 = mysqli_real_escape_string($db->link, $preparation4);
        $preparation5 = mysqli_real_escape_string($db->link, $preparation5);
        $preparation6 = mysqli_real_escape_string($db->link, $preparation6);
        $preparation7 = mysqli_real_escape_string($db->link, $preparation7);
        $preparation8 = mysqli_real_escape_string($db->link, $preparation8);
        $preparation9 = mysqli_real_escape_string($db->link, $preparation9);
        $preparation10 = mysqli_real_escape_string($db->link, $preparation10);
        $preparation11 = mysqli_real_escape_string($db->link, $preparation11);
        $preparation12 = mysqli_real_escape_string($db->link, $preparation12);
        $ingredient2 =  mysqli_real_escape_string($db->link, $ingredient2);
        $ingredient3 = mysqli_real_escape_string($db->link, $ingredient3);
        $ingredient4 =  mysqli_real_escape_string($db->link, $ingredient4);
        $ingredient5 =  mysqli_real_escape_string($db->link, $ingredient5);
        $ingredient6 =  mysqli_real_escape_string($db->link, $ingredient6);
        $ingredient7 =  mysqli_real_escape_string($db->link, $ingredient7);
        $ingredient8 =  mysqli_real_escape_string($db->link, $ingredient8);
        $ingredient9 =  mysqli_real_escape_string($db->link, $ingredient9);
        $ingredient10 =  mysqli_real_escape_string($db->link, $ingredient10);
        $ingredient11 =  mysqli_real_escape_string($db->link, $ingredient11);
        $ingredient12 =  mysqli_real_escape_string($db->link, $ingredient12);

        $session = new Session();
        $admin_email = $session->get("alogin");
        $query = "SELECT admin_id from admins WHERE email = '$admin_email'";
        $result = $db->select($query);
        $row = $result->fetch_assoc();
        $admin_id = $row['admin_id'];
        if (isset($_POST['add_recipe'])) {

            // INSERT INTO `recipes` (`title`, `prepare_time`, `cook_time`, `portion`, `summary`, `image`, `video_link`, 
            // `cat_id`, `admin_id`, `qnt_1`, `qnt_2`, `qnt_3`, `qnt_4`, `qnt_5`, `qnt_6`, `qnt_7`, `qnt_8`, `qnt_9`, `qnt_10`,
            // `qnt_11`, `qnt_12`, `step_1`, `step_2`, `step_3`, `step_4`, `step_5`, `step_6`, `step_7`, `step_8`, `step_9`,
            // `step_10`, `step_11`, `step_12`)
            //  VALUES (NULL, 'fsd', 'dsfsd', 'sdfsd', 'sdffd', 'dsfd', 'sdff', 'sdfsd', 'dsfsd', current_timestamp(),
            //   current_timestamp(), '1', '1', 'dsfd', 'sdfsd', 'sdf', 
            //   NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 
            //   NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);




            $query = "INSERT INTO recipes (
                title , prepare_time , cook_time , portion , summary , image , video_link , cat_id, admin_id)
            VALUES (
                '$title'  ,   '$prep_time' , '$cook_time' ,    '$portion' , '$summary' ,  '$cover_image' , '$video_link' , '$_POST[cat_type]' , '$admin_id' )";
            $is_inserted = $db->insert($query);
            if ($is_inserted) {
                $ingr_query = "INSERT INTO ingredients_used (qnt_1 , qnt_2, qnt_3 , qnt_4 , qnt_5 , qnt_6 , qnt_7 , qnt_8 , qnt_9 , qnt_10 , qnt_11 , qnt_12 , recipe_id) 
                        VALUES ('$ingredient1' , '$ingredient2' , '$ingredient3' , '$ingredient4' , '$ingredient5' , '$ingredient6' , '$ingredient7' , '$ingredient8' , '$ingredient9' , '$ingredient10' , '$ingredient11' , '$ingredient12' , '$is_inserted')";
                $db->insert($ingr_query);
                $prep_query = "INSERT INTO preparation_details (step_1 , step_2, step_3 , step_4 , step_5 , step_6 , step_7 , step_8 , step_9 , step_10 , step_11 , step_12 , recipe_id) 
                        VALUES ('$preparation1' , '$preparation2' , '$preparation3' , '$preparation4' , '$preparation5' , '$preparation6' , '$preparation7' , '$preparation8' , '$preparation9' , '$preparation10' , '$preparation11' , '$preparation12' , '$is_inserted')";
               
               $db->insert($prep_query);
                header('Location: recipeList.php');
                // $success_msg = "<span class='text-success'>Recipe added successfully.</span>";
            } else {
                $error_msg = "<span class='text-danger'>Something went wrong.</span>";
            }
        } else {
            $query = "UPDATE recipes SET 
                title = '$title' , 
                prepare_time = '$prep_time' , 
                cook_time = '$cook_time' , 
                portion = '$portion' , 
                summary = '$summary' , 
                image = '$cover_image' , 
                video_link = '$video_link' , 
                cat_id = '$_POST[cat_type]'  
            WHERE recipe_id = $_GET[id]";
            $is_updated = $db->update($query);
            if ($is_updated) {
                $ingr_query = "UPDATE ingredients_used
                    SET qnt_1 = '$ingredient1',
                        qnt_2 = '$ingredient2',
                        qnt_3 = '$ingredient3',
                        qnt_4 = '$ingredient4',
                        qnt_5 = '$ingredient5',
                        qnt_6 = '$ingredient6',
                        qnt_7 = '$ingredient7',
                        qnt_8 = '$ingredient8',
                        qnt_9 = '$ingredient9',
                        qnt_10 = '$ingredient10',
                        qnt_11 = '$ingredient11',
                        qnt_12 = '$ingredient12'
                    WHERE recipe_id = '$_GET[id]'
                ";

                $db->update($ingr_query);
                $prep_query = "UPDATE preparation_details
                    SET step_1 = '$preparation1',
                        step_2 = '$preparation2',
                        step_3 = '$preparation3',
                        step_4 = '$preparation4',
                        step_5 = '$preparation5',
                        step_6 = '$preparation6',
                        step_7 = '$preparation7',
                        step_8 = '$preparation8',
                        step_9 = '$preparation9',
                        step_10 = '$preparation10',
                        step_11 = '$preparation11',
                        step_12 = '$preparation12'
                    WHERE recipe_id = '$_GET[id]'
                 ";
                $db->update($prep_query);

                $success_msg = "Vous avez modifier la recette avec success ";
                header("Refresh:2; url=recipeList.php");
            } else {
                $error_msg = "Un problème est survenu";
            }
        }
    }
}
