<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/madame_nur/library/database.php');
require_once(__ROOT__ . '/madame_nur/library/functions.php');
$db = new Database();
?>

<?php $title = 'Mention legal';

ob_start(); ?>

<!-- condition general body  -->
<div class="col-12 col-lg-9">
    <div class="mx-2">

        <h5 class="py-2 mt-4 nur_back_mention text-gray text-center"> Conditions Générales d'Utilisation </h5>
        <h6> PRÉAMBULE </h6>
        <p class="text-gray">
            Les présentes Conditions Générales d'Utilisation décrivent les termes et conditions dans lesquels la société Chez madame nur fournit un service de création et d'hébergement de Blogs (ci-après le "service" ou la « plateforme ») à l'utilisateur. <br>

            L’accès à ce Service est subordonné au respect des présentes Conditions Générales d’Utilisation. Tout internaute souhaitant y accéder doit avoir pris connaissance préalablement de ces Conditions Générales d’Utilisation et s'engage à les respecter sans réserve. <br>

            Conformément aux dispositions de l’article 6 de la loi du 21 juin 2004, le contenu des Blogs n’est pas de la responsabilité de la société Chez madame nur. <br>

            Chez madame nur est une plateforme respectueuse de vos droits : tout texte, toute photo, toute vidéo que vous publiez et dont vous êtes l’auteur ou sur laquelle vous avez tout droit est, et plus important, sera, cela quels que soient les changements futurs qui puissent être apportés aux présentes conditions générales d’utilisation, votre seule propriété. <br>

            Chez madame nur est un espace de libre-expression : aucune censure n'est pratiquée sur les pages des éditeurs de Blogs, qui s'engagent en contrepartie à respecter strictement les lois Françaises ainsi que celles du pays autre que la France à partir duquel ils éditeraient leur Blog, dès lors que ce pays est un état de droit respectant la liberté d’expression. <br>

            Tout utilisateur de la plateforme Chez madame nur peut raconter, argumenter, critiquer ce qu'il désire dès lors qu’il s’assure de la licéité de ses propos.

        </p>
    </div>
</div>

<?php
require_once(__ROOT__ . '/madame_nur/include/aside.php');
$content = ob_get_clean();
require_once(__ROOT__ . '/madame_nur/include/template.php');
?>