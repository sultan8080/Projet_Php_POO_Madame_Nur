<?php
define('__ROOT__', dirname(dirname(__FILE__)));
?>

<?php $title = 'Accueil';

ob_start(); ?>

<main>
    <div class="container-fluid">
        <div class="card mb-4 mt-3 ">
            <h5 class="card-header">
                <i class="fa fa-comments" aria-hidden="true"></i>
                Les informations de tous les administrateurs
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-light">
                                <th>Nom </th>
                                <th>Prenom </th>
                                <th>Email</th>
                                <th>Mote de passe</th>
                                <th>Date created </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="bg-light">
                                <th>Nom </th>
                                <th>Prenom </th>
                                <th>Email</th>
                                <th>Mote de passe</th>
                                <th>Date created </th>
                               <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Samake </td>
                                <td>Issa </td>
                                <td>samake@gmail.com</td>
                                <td> ***** *** </td>
                                <td>25/04/2020</td>
                                <td class="d-flex">
                                    <a class="mx-1  text-secondary" href="admin_update.php"> <strong>Modifier</strong> </a>
                                    <span> ||</span>
                                    <a class="mx-1  text-secondary" href=""> <strong>Supprimer</strong> </a>
                                </td>
                            </tr>
                            <tr>
                                <td> Douprez </td>
                                <td>Mailis </td>
                                <td>seke@gmail.com</td>
                                <td> ***** *** </td>
                                <td>25/04/2020</td>
                                <td class="d-flex">
                                    <a class="mx-1  text-secondary" href="admin_update.php"> <strong>Modifier</strong> </a>
                                    <span> ||</span>
                                    <a class="mx-1  text-secondary" href=""> <strong>Supprimer</strong> </a>
                                </td>
                            </tr>

                            <tr>
                                <td>Kylan </td>
                                <td>M bappe </td>
                                <td>mbapeke@gmail.com</td>
                                <td> ***** *** </td>
                                <td>25/04/2020</td>
                                <td class="d-flex">
                                    <a class="mx-1  text-secondary" href="index_comments_reply.php"> <strong>Modifier</strong> </a>
                                    <span> ||</span>
                                    <a class="mx-1  text-secondary" href=""> <strong>Supprimer</strong> </a>
                                </td>
                            </tr>

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