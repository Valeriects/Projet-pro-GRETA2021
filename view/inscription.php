<style type="text/css">
    <?php include './public/styles/style_users.php'; ?>
</style>
<?php
$title = 'Anthony Lucchini Inscription';
ob_start();
?>
<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php
$meta = ob_get_clean();
$liens = "";
$scripts = "";
ob_start();

echo '<main id="imgconnect">';

echo '<div class="wrap">';

echo $form->build();

if (isset($_SESSION['erreurInscription'])) {
    echo '<div class="red">' . $_SESSION['erreurInscription'] . '</div>';
}

if (isset($_SESSION['erreur1'])) {
    echo '<div class="red">' . $_SESSION['erreur1'] . '</div>';
}


echo '</div>';

echo '<a href="./index.php?action=connecte" class="lienConnecte">Vous avez déjà un compte ?</a><br>';
?>
<a href="./index.php?action=listeAvis"><button id="boutonavis">Voir tous les avis</button></a>
<?php
echo '</main>';
$content = ob_get_clean();

require './view/template.php';
?>