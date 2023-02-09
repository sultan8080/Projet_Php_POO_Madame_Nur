<!DOCTYPE html>
<?php 
    require_once(__ROOT__ . '/admin/library/session.php');
    $session = new Session();
    if($session->get('alogin')){
         header("Location:index.php");
    }

?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> <?php if (isset($title)) {
                echo $title;
            } ?> </title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="../public/css/nur_styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>


<body>

    <!-- all pages of admin body would be here -->

    <?php echo $content ?>

    <!-- body finish-->



    <!-- footer start-->

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

    <!-- footer -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/datatables-demo.js"></script>
</body>

</html>