<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
$db = new Database();

?>

<?php $title = 'Accueil';

ob_start(); ?>

<?php
    $success = $error_msg = '';
    if (isset($_GET['del'])) {
        $query = "DELETE from comments WHERE comment_id = '$_GET[del]'";
        if($db->delete($query)){
            $success = "Comment removed successfully.";
        }else{
            $error_msg = "Something went wrong.";
        }
    }
    ?>
 <!-- delete book php section -->
 <?php 
 $comments_query = "SELECT comments.* , commenter.nom , commenter.email  FROM comments JOIN commenter ON commenter.commenter_id = comments.commenter_id";
$result = $db->select($comments_query);
    echo $success;
    echo $error_msg;
?>

<main>
    <div class="container-fluid">
        <div class="card mb-4 mt-3 ">
            <h5 class="card-header">
                <i class="fa fa-comments" aria-hidden="true"></i>
                Toutes les commentaires <strong>(1) </strong>
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-light">
                                <th>N°</th>
                                <th>Nom </th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N°</th>
                                <th>Title </th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php $i = 1; if ($result) while($row = $result->fetch_assoc()){  ?>
                            <tr>
                                <td> <?= $i ?> </td>
                                <td><?=  $row['nom'] ?> </td>
                                <td><?=  $row['email'] ?> </td>
                                <td><?= shortText($row['comments'] , 50) ?> </td>
                                <td><?= date("m/d/Y" , strtotime($row['date_created'])) ?> </td>
                                <td>
                                    <a class="mx-1 text-secondary" href="index_comment_view.php?id=<?= $row['comment_id']  ?>"> <strong>View</strong> </a>
                                    <span> ||</span>
                                    <a class="mx-1  text-secondary" href="index_comments_reply.php?id=<?= $row['comment_id']  ?>"> <strong>Reply</strong> </a>
                                    <span> ||</span>
                                    <a class="mx-1  text-secondary" href="index.php?del=<?= $row['comment_id'] ?>"> <strong>Supprimer</strong> </a>
                                </td>
                            </tr>
                        <?php $i++; } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
$content = ob_get_clean();
require_once(__ROOT__ . '/admin/include/template_admin.php');
?>