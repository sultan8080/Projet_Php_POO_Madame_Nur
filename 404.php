<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/madame_nur/library/database.php');
require_once(__ROOT__ . '/madame_nur/library/functions.php');
$db = new Database();
?>

<?php $title = '404';

ob_start(); ?>

<div class="mx-auto text-center">
  <img class="mb-5 col-8 img-fluid" src="include/error-404-monochrome.svg" />
  <p>Cette URL demandée n'a pas été trouvée sur ce serveur.</p>
</div>



<?php
$content = ob_get_clean();
require_once(__ROOT__ . '/madame_nur/include/template.php');
?>