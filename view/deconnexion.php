<?php
$title = 'Anthony Lucchini deconnexion du compte';
ob_start();
?>
<link rel="stylesheet" href="./public/styles/style_deconnexion.css">
<?php
$liens = ob_get_clean();

ob_start()
?>

<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php
$meta = ob_get_clean();
$scripts = "";
ob_start(); ?>

<main id="deconnexion">

    <p class="verif">Vous allez être déconnecté.</p>
    <a href="./index.php?action=connecte">
        <button>Déconnexion</button>
    </a>

</main>

<?php
session_destroy();

$content = ob_get_clean();
require './view/template.php';
?>