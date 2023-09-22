<?php
$title = 'Anthony Lucchini Biographie';
ob_start();
?>
<link rel="stylesheet" href="./public/styles/style-bio.css">
<?php
$liens = ob_get_clean();

ob_start()
?>

<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php $meta = ob_get_clean();

ob_start(); ?>

<main class="container_bio">
    <div class="photoBio">
        <img class="photoBiographie" src="./public/ressources/shooting_antho_31Juillet2021_bis/Trilogie11-01.jpg" alt="photo de l'auteur derrière sa trilogie : Les Nocturnes.">
    </div>

    <div class="bioText">
        <p class="moi">Parlons un peu de moi :</p>
        <p class="texte"> ANTHONY LUCCHINI est un autodidacte au parcours professionnel atypique. Il s’est lancé dans
            l’écriture d’une trilogie onirique, Les Nocturnes, publiés par Beta Publisher en 2018 (tome 1) et
            2019 (tome 2). À l’image de son personnage, les pieds sur terre mais la tête dans les étoiles, il a
            rejoint le collectif Plumes et Ecrivains du Pays Salonais afin de partager les projets qui gravitent
            autour de sa ville natale, Salon de Provence.
        </p>
    </div>

    <div class="rubanPhoto">
        <img class="miniature" src="./public/ressources/shooting_antho_31Juillet2021_bis/DSCF2953(2).jpg" alt="miniphoto" onclick="myFunction(this);">
        <img class="miniature1" src="./public/ressources/shooting_antho_31Juillet2021_bis/DSCF2959(2).jpg" alt="miniphoto" onclick="myFunction(this);">
        <img class="miniature2" src="./public/ressources/shooting_antho_31Juillet2021_bis/Trilogie10.jpg" alt="miniphoto" onclick="myFunction(this);">
        <img class="miniature3" src="./public/ressources/shooting_antho_31Juillet2021_bis/Trilogie13.jpg" alt="miniphoto" onclick="myFunction(this);">

    </div>

</main>
<?php $content = ob_get_clean();

ob_start();

?>

<!-- mes scripts -->
<script src="./public/scripts/script_bioimg.js"></script>

<?php

$scripts = ob_get_clean();
require './view/template.php';

header("Refresh:30");
?>