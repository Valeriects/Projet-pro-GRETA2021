<?php
$title = 'Partie en construction';
ob_start();
?>

<main id="wrap">
    <div class="cadre">
        <p class="num"></p>
        <h2>Page en construction</h2>
        <h3>Merci de votre visite. A bientôt !</h3>

        <div class="retour">
            <a href="./index.php?action=index"><button>Accueil</button></a>
            <a href="./index.php?action=connecte" class="lienRetour">Page de connexion</a>
        </div>
    </div>
</main>


<?php $content = ob_get_clean(); ?>

<?php require 'template2.php'; ?>