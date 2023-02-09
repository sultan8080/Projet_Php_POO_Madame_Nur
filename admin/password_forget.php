<!DOCTYPE html>
<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
require_once(__ROOT__ . '/admin/library/sendEmail.php');
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Réinitialisation mdp</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-success">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">

                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="row mt-2 ">
                                    <img src="../public/images/logo/logo.png" class="col-5 mx-auto img-fluid" alt="responsive design">
                                </div>

                                <div class="card-header border mt-3 " style="background-color: #d6f5d6">

                                    <h5 class="text-center p-1 text-dark"> Réinitialisation du mot de passe</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="text-danger text-center"> <?php echo $error_msg ?> </div>
                                        <div class="text-success text-center"> <?php echo $success ?> </div>
                                                                               <h6>Entrez l’adresse email de votre compte </h6>
                                        <div class="form-group">

                                            <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Votre email" / name="email" required="required">
                                        </div>

                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small text-secondary" href="login.php">Retour à la page de connexion</a>
                                            <input type="submit" name="forget_password" value="Réinitialisez">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">

                        <div class="text-muted">Copyright &copy; chezMadameNur - Tous droit
                            réservés </div>
                        <div>
                            <a class="text-secondary" href="../mention_legal.php">Mentions
                                Légales et CGU</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>