<?php
$query = "SELECT * FROM recipe_category";
$cats = $db->select($query);
?>
<footer class="container mt-5">
    <hr>
    <div class="row text-muted justify-content-sm-between text-center">
        <div class="col-12 col-md-3 align-self-center"><a class="navbar-brand" href="">
                <img src="public/images/logo/logo.png" width="" height="60px" alt="">
            </a></div>
        <div class="col-12 col-md-7 text-center">
            <nav class="navbar navbar-expand-lg  navbar-light p-1 m-0">
                <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center mt-2" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="accueil.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="apropos.php">À propos</a>
                        </li>

                        <li class="nav-item dropup">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Catégorie de recette </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <?php if($cats) while($row = $cats->fetch_assoc()){  ?>
                        <!-- <a class="dropdown-item" href="recettes_category.php">Entrée</a> -->
                            <a class="dropdown-item" href="recettes_category.php?id=<?= $row['cat_id'] ?>"><?= $row['cat_name'] ?></a>
                        <?php } ?>
                            </div>
                        </li>

                       <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-12 col-md-2 align-self-center ">
            <div class="d-sm-flex">
                <a href="#" class="btn m-1  btn-sm btn-outline-success rounded-circle"><i class="fab fa-facebook"></i></a>
                <a href="#" class="btn m-1 btn-sm btn-outline-success rounded-circle"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn m-1 btn-sm btn-outline-success rounded-circle"><i class="fab fa-instagram"></i></a>
                <a href="#" class="btn m-1 btn-sm btn-outline-success rounded-circle"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <div class="col-12 text-center py-1 bg-light text-secondary">  <small> @Copyright 2020 chezMadameNur - Tous droit
        réservés  <a href="mention_legal.php" class="text-success">Mentions
            Légales</a> -  et <a class="text-success" href="CGU.php">  Conditions Générales d'Utilisation</a>   - Conçu et développé par moti sultan nur</small>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="public/js/nur.js"></script>
</body>

</html>