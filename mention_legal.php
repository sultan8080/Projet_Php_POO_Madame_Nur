<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/madame_nur/library/database.php');
require_once(__ROOT__ . '/madame_nur/library/functions.php');
$db = new Database();
?>

<?php $title = 'Mention legal';

ob_start(); ?>

<!-- mention legal body  -->
<div class="col-12 col-lg-9">
    <div class="mx-2">
        
        <h5 class="py-2 text-gray nur_back_mention mt-4 text-center">Mentions Légales</h5>

        <div class="row d-flex mx-2 justify-content-between text-gray">
            <div class="col-sm-6 col-12 mt-2">
                <h6> Présentation du site : </h6>
                <p class="m-0"> Nom : chezmadamenur </p>
                <p class="m-0"> Adresse : https://chezmadamenur.fr</p>
                <p class="m-0"> Date de création : Aout 2020</p>
                <p class="m-0"> Auteur : Sanjida Bithi NUR</p>
                <p class="m-0"> Adresse : 02400 Chteâuu Thierry</p>
            </div>
            <div class="col-sm-6 col-12 mt-2">
                <h6> Hébergement : </h6>
                <p class="m-0"> blog https://chezmadamenur.fr est créer par M Moti Sultan, hébergé par ..... – 2 rue Kellermann – 02400 Chateau Thierry – France. </p>

            </div>
            <div class="col-12  mt-3">
                <h6> Réclamations : </h6>
                <p> En cas de réclamation sur le contenu de ce blog, commentaire ou billet, je vous propose de m’adresser un courrier électronique.
                    La loi vous permet même de vous adresser directement à l’hébergeur sous réserve de l’article 6, I, 4° de la loi 2004-575 du 21 juin 2004 : </p>
                <p>
                    "Le fait, pour toute personne, de présenter aux [hébergeurs du site] un contenu ou une activité comme étant illicite dans le but d’en obtenir le retrait ou d’en faire cesser la diffusion, alors qu’elle sait cette information inexacte, est puni d’une peine d’un an d’emprisonnement et de 15 000 EUR d’amende. "
                </p>
            </div>
            <div class="col-12  mt-3">
                <h6> Déclaration CNIL : </h6>
                <p>Déclaration CNIL :
                    Lorsque vous postez un commentaire sur chezmadamenur.fr, vous devez fournir votre nom (ou votre pseudo) ainsi que votre adresse e-mail. Ces informations sont stockées dans une base de données. En conformité avec les dispositions de la loi n°78-17 du 6 janvier 1978 relative à l’Informatique, aux fichiers et aux libertés, le traitement automatisé de ces données a fait l’objet d’une déclaration auprès de la Commission Nationale de l’Informatique et des Libertés (CNIL). L’utilisateur est informé qu’il dispose d’un droit d’accès, de rectification et de suppression portant sur les données le concernant en m’écrivant par e-mail à l’adresse suivante : chezmadamenur.fr</p>
            </div>
            <div class="col-12  mt-3">
                <h6> Propriété : </h6>
                <p>Tous les éléments du blog Chez madame nur (textes, recettes, photographies) sont ma propriété exclusive (sauf mention contraire explicite). Ils sont protégés par les lois relatives aux droits d’auteurs et à la propriété intellectuelle (code de la propriété Intellectuelle et convention de Berne notamment). Sauf autorisation formelle écrite et préalable, toute reproduction, de tout ou en partie, par quelque moyen ou procédé que ce soit, pour des fins autres que celles d’utilisation personnelle, est strictement interdite. Tous droits réservés – All Rights Reserved</p>
                <p>Pour toute photo publiée sur un site ou un blog sans mon accord préalable, une facture sera envoyée à hauteur de 200% de mon tarif de base et même 300% si la mention de copyright a été éliminée ou rendue illisible.</p>
            </div>
            <div class="col-12  mt-3">
                <h6> Concernant la création de liens : </h6>
                <p>Liens entrants : Chez madame nur autorise la mise en place d’un lien hypertexte pointant vers son contenu, sous réserve de ne pas utiliser la technique du lien profond (deep linking), c’est-à-dire que les pages ne doivent pas être imbriquées à l’intérieur des pages d’un autre site, mais accessible par l’ouverture d’une fenêtre ; mentionner la source Chez madame nur du contenu visé est obligatoire. Cette autorisation ne s’applique pas aux sites Internet diffusant des informations à caractère polémique, pornographique, xénophobe ou pouvant, dans une plus large mesure, porter atteinte à la sensibilité du plus grand nombre ou à l’ordre public.</p>
                <p>Liens sortants : Chez madame nur contient des liens hypertextes permettant l’accès à des sites qui ne sont pas édités par lui. En conséquence, Chez madame nur ne saurait être tenu pour responsable du contenu des sites ou de tout élément ou service présentés sur ces sites et auxquels vous aurez ainsi l’accès.</p>
            </div>
            <div class="col-12  mt-3">
                <h6> Concernant la création de liens : </h6>
                <p>En accédant à ce blog, les internautes acceptent les présentes conditions générales d’utilisation.</p>
                <ul>
                    <li>Chez madame nur met à la disposition des internautes des informations pour lesquelles le maximum a été fait pour s’assurer de leur exactitude au moment de leur mise en ligne. Chez madame nur ne saurait être tenu pour responsable d’éventuelles erreurs ni d’éventuels préjudices liés à la consultation de ces informations.</li>
                    <li>Chez madame nur se réserve le droit de modifier, corriger ou suspendre le contenu du blog.
                    </li>
                    <li>Chez madame nur ne saurait être tenu responsable de l’utilisation qui serait faite par les internautes des informations contenues dans le blog.
                    </li>
                    <li>Des liens hypertextes présents sur le site Chez madame nur permettent l’accès à d’autres sites/blogs .. sur lesquels Marcia Tack n’exerce aucun contrôle. La responsabilité de Chez madame nur ne saurait en aucun cas être engagée en cas de préjudice causé par le contenu d’un ou plusieurs des sites/blogs … rattachés par un lien hypertexte.
                    </li>
                </ul>
            </div>

        </div>


        <div>

        </div>

    </div>
</div>

<?php
require_once(__ROOT__ . '/madame_nur/include/aside.php');
$content = ob_get_clean();
require_once(__ROOT__ . '/madame_nur/include/template.php');
?>