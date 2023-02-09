<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/madame_nur/library/database.php');
require_once(__ROOT__ . '/madame_nur/library/functions.php');
$db = new Database();
?>
<?php $title = 'A Propose';
ob_start(); ?>

<div class="col-12 mt-3">
    <div class="col-11 mx-auto p-5 h2 nur_back_mention text-secondary text-center bg-light mb-2">
        Qui suis-je ?
    </div>
    <div class=" col-11 mx-auto row text-secondary text-ju">
        <div class="col-md-4 col-12"><img src="public/images/madame_nur.jpg" alt="Photo Madame Nur"></div>
        <div class="col-md-8 col-12 mt-5">
            Je suis Sanjida Bithi Nur, mère de trois enfants et amoureuse de la nature.
            <p class="mt-3">Merci pour la visite!
            </p>
            <p class="mt-3">
                Bienvenue sur mon blog culinaire, où je vais vous aider à créer de la magie dans vos cuisines avec mes recettes simples et délicieuses indiennes et bangladaises, toutes les recettes sont essayées et testées dans ma cuisine et approuvées par ma famille. J'espère que vous essayez ces recettes et que vous les appréciez comme nous.
                Si vous décidez de faire mon plat, j'aimerais voir comment cela s'est passé pour vous
            </p>

            <p class="mt-3"> Envoyez-moi un email avec des photos à <span class="text-success">cheamadamenur@gmail.com </span> </p>

            <p class="mt-3">
                Dans cet espace, je partage toujours des recettes fraîches, savoureuses et (principalement) saines que j'aime préparer et manger dans ma vraie vie quotidienne. Si je ne voulais pas le manger dans la vraie vie, je ne le mettrais pas sur le blog. Mon objectif est de vous inspirer avec des aliments à la fois abordables ET excitants, que vous cuisiniez pour vous-même, votre famille, vos colocataires ou vos amis. Je veux que vous soyez si enthousiasmé par ces recettes que vous attendez avec impatience 17 heures lorsque vous pourrez rentrer du travail et commencer à cuisiner.
            </p>
        </div>
    </div>

</div>


<?php
$content = ob_get_clean();
require_once(__ROOT__ . '/madame_nur/include/template.php');
?>