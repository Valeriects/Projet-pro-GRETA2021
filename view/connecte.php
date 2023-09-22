<style type="text/css">
    <?php include './public/styles/style_users.php'; ?>
</style>
<?php
$title = 'Anthony Lucchini Connexion';
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

if (isset($_SESSION['okinscrit'])) {
    echo '<div class="blue">' . $_SESSION['okinscrit'] . '</div>';
}

// je créé mon formulaire ici:
echo $form->build();

if (isset($_SESSION['erreur24'])) {
    echo '<div class="red">' . $_SESSION['erreur24'] . '</div>';
}

echo '</div>';

echo '<a href="./index.php?action=inscrire" class="lienConnecte">Voulez-vous vous inscrire ?</a><br>';

?>
<a href="./index.php?action=listeAvis"><button id="boutonavis">Voir tous les avis</button></a>
<?php
echo '</main>';

$content = ob_get_clean();
require './view/template.php';

?>