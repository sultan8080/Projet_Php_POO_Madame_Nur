<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/admin/library/Database.php');
require_once(__ROOT__ . '/admin/library/functions.php');
$db = new Database();
$query = "SELECT * FROM recipe_category";
$result = $db->select($query);
?>

<?php $title = 'Toutes les catégories';

ob_start(); ?>

<main>
    <div class="container-fluid">
        <div class="card mb-4 mt-3">
            <div id="result">
                  <?php if(isset($_SESSION['flash_msg'])): ?>
                    <div class="alert">
                        <div class="alert alert-domain alert-success alert-dismissible fade-in  msg-alert" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: black;">×</span></button><?= $_SESSION['flash_msg'] ?> 
                        </div>
                    </div>
                <?php unset($_SESSION['flash_msg']);  endif; ?>
            </div>
            <h5 class="card-header">
                Toutes les catégories de recettes
            </h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-light">
                                <th>N°</th>
                                <th>Nom de catégorie </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;  while($row = $result->fetch_assoc()){ ?> 
                                    <tr>
                                        <td> <?= $i; ?> </td>
                                        <td> <?= $row['cat_name'] ?> </td>
                                    </tr>
                            <?php $i++; } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>N°</th>
                                <th>Nom de catégorie </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    var base_url = "<?= "/"  ?>";
    function remove(x , id){
        $(x).attr("disabled" , "disabled");
        $(x).find("svg").show();
         $.ajax({
            url: base_url + 'admin/forms.php',
            type: 'POST',
            data: {'cat_id' : id , 'request': 'remove_cat' },
        }).then(function(result) {
            $(x).find("svg").hide();
            $(x).find('button').removeAttr("disabled");
            var data = JSON.parse(result);
            if(data.type == 'success'){
                window.location = base_url + 'admin/recipe_category_list.php';
            } else {
                $('.msg-alert').css('display', 'block');
                $("#result").html('<div class="alert" ><div class="alert alert-domain alert-danger alert-dismissible fade-in  msg-alert" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="color: black;">×</span> </button>' + data.msg + '</div></div>');
                $("#result").fadeTo(2000, 500).slideUp(500, function(){
                    $("#result").slideUp(500);
                });
            }
        });
    }
</script>

<?php
$content = ob_get_clean();
require_once(__ROOT__ . '/admin/include/template_admin.php');
?>