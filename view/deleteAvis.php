<?php
$title = 'Anthony Lucchini supprimer les avis';
ob_start();
?>
<link rel="stylesheet" href="./public/styles/loginAvis.css">
<?php
$liens = ob_get_clean();

ob_start()
?>

<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php
$meta = ob_get_clean();
$scripts = "";
ob_start(); ?>

<main id="loginDelete">
    <p class="warningMob">Veux-tu réellement supprimer ton superbe avis ?</p>


    <div class="articleDelete">
        <?php
        if (!empty($result)) {
        ?>
            <p><?= htmlentities($result["avis_date"]) . ' <strong class="tome"> ' . htmlentities($result["livre_nom"]) ?></strong></p>
            <p><?= htmlentities($result["texte_msg"]) ?></p>
        <?php
        } elseif (isset($_POST)) {
            // si j'efface un avis, je reçois la notification de la part de la fonction deleteSuccess de ma class User.php
            echo $avis->deleteSuccess();
        }
        ?>
    </div>

    <div id="avisOneDelete">

        <form action="./index.php?id=<?= $result['id_avis'], "&action=deleteAvis" ?>" method="post" id="formDelete">

            <div id="msgavis">

                <p class="warning">Veux-tu réellement supprimer ton superbe avis ?</p>

            </div>

            <div id="envois">

                <button class="sup" name="delete" type="submit" value="Supprimer">Supprimer</button>

            </div>

        </form>

        <div class="bouton">
            <a class="delete" href="./index.php?id=<?= $_SESSION['idUser'], "&action=login" ?>"><button>Retour vers votre liste d'avis</button></a>
        </div>

    </div>


</main>
<?php
$content = ob_get_clean();

require './view/template.php';
?>