<?php
$title = 'Anthony Lucchini modifier les avis';
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
ob_start(); ?>

<main id="loginAvis">
    
    <div id="englobe">

        <p class="conseil">Vous pouvez maintenant modifier votre avis.</p>

        <div class="article">
            <?php
            // message succès de modififcation, fonction updateSuccess de la class User.php
            if (isset($_GET['modif'])) {

                echo $avis->updateSuccess();
            }
            ?>
            <p><?= htmlentities($result["avis_date"]) . ' <strong class="tome"> ' . htmlentities($result["livre_nom"]) ?></strong></p>
            <p><?= htmlentities($result["texte_msg"]) ?></p>

        </div>
    </div>


    <div id="avisOne">

        <form action="./index.php?id=<?= $result['id_avis'], "&action=modifAvis" ?>" method="post" id="formUp">


            <div id="msgavis">
                <label for="msg">Message* :</label>

                <textarea id="msg" type="text" name="msg" placeholder="Votre message ..."><?= htmlentities($result["texte_msg"]) ?> </textarea>
            </div>

            <div id="envoisModif">
                <p id="oblig">* Champs obligatoires</p>
                <input id="envois" name="modif" type="submit" value="Modifier">

            </div>


        </form>

        <a href="./index.php?id=<?= $_SESSION['idUser'], "&action=login" ?>"><button>Retour vers votre liste d'avis</button></a>
    </div>

</main>

<?php $content = ob_get_clean();

$scripts = "";
require './view/template.php';
?>