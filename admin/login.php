<?php
define('__ROOT__', dirname(dirname(__FILE__)));
?>

<?php $title = 'Connexion administrateur';

ob_start();
session_start(); ?>

<?php
// database connexion
require_once(__ROOT__ . '/admin/library/login_validation.php');


?>

<section class="bg-success">
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
                                    <h4 class="text-center p-1 text-dark"> Admin Connexion</h4>
                                </div>
                                <small class="text-danger text-center"> <?php echo $error_msg; ?> </small>
                                <div class="card-body">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label class="small mb-1" for="email">Adresse email</label>
                                            <input class="form-control py-4" name="email" type="email" required="required" placeholder="Votre email" />
                                            <small> <?php echo $email_error ?> </small>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Mot de pass</label>
                                            <input class="form-control py-4" type="password" name="password"  placeholder="Votre mot de passe" />
                                            <small> <?php echo $password_error ?> </small>
                                        </div>

                                       
                                        <button type="submit" name="login" class="btn btn-outline-success">Se Connecter</button>
                                    </form>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small text-secondary" href="password_forget.php">Mot de passe Oublié?</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require_once(__ROOT__ . '/admin/include/logintemplate.php');
?>