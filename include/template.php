<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/5385071fb0.js" crossorigin="anonymous"></script>
   
    <!-- css privé -->
    <link rel="stylesheet" href="public/css/nur_styles.css">

    <title> <?php if (isset($title)) {
                echo $title;
            } ?> </title>
</head>

<body>
    <?php
    require_once(__ROOT__ . '/madame_nur/include/header.php');
    require_once(__ROOT__ . '/madame_nur/include/menu.php');
    ?>
    <div class="container mt-3">
        <div class="row">
            
            <!-- all body contents including aside will be here -->

            <?= $content ?>

        </div>
    </div>

    <?php
    require_once(__ROOT__ . '/madame_nur/include/footer.php'); ?>