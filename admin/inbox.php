<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
$db = new Database();

$success = $error_msg = '';
if (isset($_GET['del'])) {
    $query = "DELETE from contact_table WHERE cont_person_id = '$_GET[del]'";
    if($db->delete($query)){
        $success = "Contact removed successfully.";
    }else{
        $error_msg = "Something went wrong.";
    }
}



$query = "SELECT * FROM contact_table ORDER BY date_contact DESC";
$result = $db->select($query);
?>

<?php $title = 'boîtes de réception';

ob_start(); ?>

<main>
    <div class="container-fluid">
        <div class="card mb-4 mt-3">
            <?php
                echo $success;
                echo $error_msg;
            ?>
            <h5 class="card-header">
                <i class="fa fa-inbox" aria-hidden="true"></i>
                Boites des reception <strong>(1) </strong>
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
                            <?php $i = 1;  while($row = $result->fetch_assoc()){ ?>
                                <tr>
                                    <td> <?= $i ?> </td>
                                    <td> <?= $row['nom'] ?> </td>
                                    <td> <?= $row['email'] ?> </td>
                                    <td> <?= shortText($row['email_texts'] , 30) ?> </td>
                                    <td> <?= date('m/d/Y' , strtotime($row['date_contact'])) ?> </td>
                                    <td class="d-flex">
                                        <a class="mx-1 text-secondary" href="inbox_email_view.php?id=<?= $row['cont_person_id'] ?>"> <strong>View</strong> </a>
                                        <span> ||</span>
                                        <a class="mx-1  text-secondary" href="inbox_email_reply.php?id=<?= $row['cont_person_id'] ?>"> <strong>Reply</strong> </a>
                                        <span> ||</span>
                                        <a class="mx-1  text-secondary" href="inbox.php?del=<?= $row['cont_person_id'] ?>"onclick="return confirm('Are you sure you want to delete?');"> <strong>Supprimer</strong> </a>
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