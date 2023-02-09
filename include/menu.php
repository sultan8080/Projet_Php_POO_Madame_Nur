<?php

$query = "SELECT * FROM recipe_category";
$cats = $db->select($query);


?>
<div class="container mt-1 mt-lg-0">
    <!-- Main logo -->
    <div class="background_image mt-0">
        <div class="w-25 mx-auto d-none d-lg-block mb-3 mt-sm-0 ">
            <img src="public/images/logo/logo.png" class="img-fluid" alt="responsive design">
        </div>
    </div>
    <nav class="navbar  navbar-expand-lg text-left navbar-light border-top border-bottom border-success p-1 m-0">
        <!-- logo nav bar-->
        <nav class="navbar d-lg-none navbar-light py-0">
            <a class="navbar-brand" href="home.html">
                <img src="public/images/logo/logo.png" width="" height="60px" alt="">
            </a>
            <!-- Navbar Menu -->
        </nav>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
            <?php
            $path = $_SERVER['SCRIPT_FILENAME'];
            $currentpage = basename($path, '.php');
            ?>
            <ul class="navbar-nav mr-auto">
                <li <?php
                    if ($currentpage == 'index') {
                        echo 'class="active"';
                    } else if ($currentpage == 'recettes_single') {
                        echo 'class="active"';
                    }
                    ?> class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li <?php
                    if ($currentpage == 'apropos') {
                        echo 'class="active"';
                    }
                    ?> class="nav-item">
                    <a class="nav-link" href="apropos.php">À propos</a>
                </li>

                <li <?php
                    if ($currentpage == 'recettes_category') {
                        echo 'class="active dropdown"';
                    } 
                    ?> class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Catégorie de recette</a>
                    <div class="dropdown-menu">
                        <?php if($cats) while($row = $cats->fetch_assoc()){  ?>
                        <!-- <a class="dropdown-item" href="recettes_category.php">Entrée</a> -->
                            <a class="dropdown-item" href="recettes_category.php?id=<?= $row['cat_id'] ?>"><?= $row['cat_name'] ?></a>
                        <?php } ?>
                    </div>
                </li>

                <li <?php
                    if ($currentpage == 'contact') {
                        echo 'class="active"';
                    }
                    ?> class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

            </ul>
            <div>
                <form action="search_result.php" method="POST">
                    <div class="form-inline row justify-content-end mr-0">
                        <input class="form-control col-4 col-lg-8 mr-1" type="text" placeholder="Chercher" name="search_text">
                        <button class="btn btn-success col-2" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </nav>
</div>