<?php
$title = 'Anthony Lucchini Revue de presse';
ob_start();
?>
<link rel="stylesheet" href="./public/styles/style-presse.css">
<link rel="stylesheet" href="./public/styles/style_btn_retour.css">
<?php
$liens = ob_get_clean();

ob_start()
?>

<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php $meta = ob_get_clean();

ob_start(); ?>

<main>

    <div id="colonne">
        <ul id="press">
            <!-- ici est le HTML généré par le JS -->
        </ul>
    </div>


    <div id="btnRetour">
        <a href="#bandeHaut"><button id="retourHaut" title="Retour haut de page"><i class="fas fa-sort-up"></i></button></a>
    </div>
</main>
<?php $content = ob_get_clean();

ob_start();

?>
<script src="./public/scripts/script_press.js"></script>
<script src="./public/scripts/script_bouton_retour.js"></script>

<?php

$scripts = ob_get_clean();
require './view/template.php';
?>