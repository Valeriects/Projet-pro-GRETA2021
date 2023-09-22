<?php
$title = 'Anthony Lucchini site officiel, écrivain français de livre roman jeunesse';
ob_start();
?>
<!-- mes styles -->
<link rel="stylesheet" href="./public/styles/style-accueil.css">
<?php
$liens = ob_get_clean();

ob_start();
?>
<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php
$meta = ob_get_clean();
ob_start();
?>
<main>
    <div id="ensemble">
        <div id="grand" class='identite'>
            <p>Qui suis-je ?</p>
            <img class="portrait" src="./public/ressources/shooting_antho_31Juillet2021_bis/trilogie-01.jpg" alt="photo_trilogie">
        </div>
        <div class="nouveaute">
            <img src="<?= htmlentities($new['livre_jacquette']) ?>" alt="Les nocturnes tome 3 : l'illumination" class="couv">
            <div>
                <p class="saga"><?= htmlentities($new['livre_tome']) ?></p>
                <p class="nom"><?= htmlentities($new['livre_nom']) ?></p>
                <p class="date"> Paru le : <?= htmlentities($new['parution']) ?></p>
            </div>
        </div>
        <div class="agendaAccueil">
            <p class="event">Les prochains évènements</p>
            <article>
                <img class="imgevent" src="./public/ressources/shooting_antho_31Juillet2021_bis/lune.jpg" alt="photo lune et livres">
                <p class="textArticle">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni architecto delectus quis deleniti vero, nisi possimus aperiam maiores? Natus ad et earum aliquam delectus cum. Odio ratione facere provident similique!</p>
            </article>
        </div>
    </div>
</main>

<?php
$content = ob_get_clean();
ob_start();
?>
<!-- mes scripts -->
<script src="./public/scripts/script_header-footer.js"></script>
<?php
$scripts = ob_get_clean();
require './view/template.php';
?>