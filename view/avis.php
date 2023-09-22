<?php
$title = 'Anthony Lucchini Avis';
ob_start();
?>
<link rel="stylesheet" href="./public/styles/style-liste-avis.css">
<link rel="stylesheet" href="./public/styles/style_btn_retour.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
<?php
$liens = ob_get_clean();

ob_start()
?>

<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php
$meta = ob_get_clean();
ob_start(); ?>

<main id="listeAvis">
    <!-- <avistome></avistome> -->
    <div class="liste">
        <h1 class="titre">Les avis concernant les oeuvres d'Anthony Lucchini, auteur de romans fantastiques pour la jeunesse</h1>

        <div class="tome custom-select">
            <p id="choixTome">Les avis par livre :</p>
            <?php

            foreach ($tome as $unit) {
            ?>
                <a class="gauche left" href="./index.php?action=listeAvis&id=<?= $unit['id_livre'] ?>">

                    <img src="<?= htmlspecialchars($unit['livre_jacquette']) ?>" alt="jacquette du tome" class="tomeUnit">

                    <?= htmlspecialchars($unit['livre_nom']) . ' ' . htmlspecialchars($unit['livre_tome']) ?>

                </a>
            <?php
            }
            ?>

            <a class="gauche" href="./index.php?action=listeAvis">
                <button class="readAvis">
                    Voir tous les avis
                </button>
            </a>
        </div>

        <section id="bouge" class="bouge">

            <?php
            foreach ($liste as $row) {
            ?>
                <article class="com">

                    <h2>Avis de <b> <?= htmlspecialchars($row['user_pseudo']) ?> </b> concernant : <?= htmlspecialchars($row['livre_nom']) ?></h2>

                    <!-- avec l'alias de la colonne avis_date -->
                    <p class="date"><?= htmlspecialchars($row['date_fr']) ?></p>

                    <p class="commentaire"><?= htmlspecialchars($row['texte_msg']) ?></p>
                </article>
            <?php
            }
            ?>

        </section>

        <div class="retour">
            <p>Vous voulez donner votre avis ?</p>
            <a href="./index.php?action=connecte"><button>Connectez-vous</button></a>
        </div>

    </div>

</main>

<?php $content = ob_get_clean();
ob_start(); ?>

<!-- mes scripts -->
<script src="./public/scripts/script-toggle-avis.js"></script>
<script src="./public/scripts/script_bouton_retour.js"></script>
<?php $scripts = ob_get_clean();
require './view/template.php';
?>