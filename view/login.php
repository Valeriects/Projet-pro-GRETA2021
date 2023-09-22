<style type="text/css">
    <?php
    include './public/styles/style_users.php';
    ?>
</style>
<?php
$title = 'Anthony Lucchini Compte utilisateur';
ob_start();
?>

<link rel="stylesheet" href="./public/styles/style_login.css">

<?php
$liens = ob_get_clean();

ob_start()
?>

<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php
$meta = ob_get_clean();
ob_start(); ?>


<main id="log">
    <div id="position">
        <?php
        if (isset($_SESSION['ok'])) {
            echo '<div class="user bon">' . $_SESSION['ok'] . '</div>';
        }
        ?>
        <div id="dedans">

            <div class="bord">
                <?php
                if (isset($_SESSION['infoLogin'])) {
                    echo '<div class="user cadre">' . $_SESSION['infoLogin'] . '</div>';
                }
                ?>
            </div>

            <div id="avis" class="avis">
                <div id="avis1">

                    <form action="./index.php?action=login" method="post" id="avisTomeEveil" class="aviseveil">
                        <div id="selectionLivre">
                            <p>Choississez un livre pour donner votre avis.</p>
                            <div class="row"><strong>Les Nocturnes :</strong>

                                <div class="radio">
                                    <input type="radio" id="tome1" name="livre" value="<?= htmlspecialchars($livre['0']['id_livre']) ?>" checked>
                                    <label for="tome1">L'éveil</label>
                                </div>
                                <div class="radio">
                                    <input type="radio" id="tome2" name="livre" value='<?= htmlspecialchars($livre['1']['id_livre']) ?>'>
                                    <label for="tome2">L'ascension</label>
                                </div>
                                <div class="radio">
                                    <input type="radio" id="tome3" name="livre" value="<?= htmlspecialchars($livre['2']['id_livre']) ?>">
                                    <label for="tome3">L'illumination</label>
                                </div>

                            </div>
                            <div class="rowTwo"><strong>Nouvelle :</strong>
                                <div class="radio">
                                    <input type="radio" id="nouvelle01" name="livre" value="<?= htmlspecialchars($livre['3']['id_livre']) ?>">
                                    <label for="nouvelle01">Abattu sur le chemin de Pélissanne</label>
                                </div>
                            </div>

                        </div>

                        <div id="msgavis">
                            <label for="Message">Message* :</label>

                            <textarea id="Message" type="text" name="message" placeholder="Votre message ..."></textarea>
                        </div>

                        <div id="envois">
                            <input class="envois" type="submit" value="Envoyez">

                        </div>

                        <p id="obligatoire">* Champs obligatoires</p>

                    </form>
                </div>
            </div>

            <div id="afficheAvis" class="affichage">

                <?php
                foreach ($avis as $row) {

                    echo '<article class="article">' . htmlspecialchars($row['date_fr']) . ' <strong>' . htmlspecialchars($row['livre_nom']) . ' </strong><br>' . htmlspecialchars($row['texte_msg']) . '
                    </article>
                    <div class="button" >
                    <a href="./index.php?id=' . htmlspecialchars($row['id_avis']) . '&action=modifAvis">
                    <button>Modifier</button>
                    </a>
                    <a href="./index.php?id=' . htmlspecialchars($row['id_avis']) . '&action=deleteAvis">
                    <button>Supprimer</button>
                    </a>
                    </div>';
                }
                ?>

            </div>

            <div class="deconn">
                <a href="./index.php?action=deco">
                    <button>Déconnexion</button>
                </a>
            </div>

        </div>

    </div>

</main>
<?php $content = ob_get_clean();
$scripts = "";

require 'template.php';
?>