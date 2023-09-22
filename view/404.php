<?php
$title = 'Erreur 404';
ob_start();
?>

<main id="wrap">
    <div class="cadre">
        <p class="num">404</p>
        <h2>Page non trouvée</h2>
        <h3>Vérifiez l'url dans la barre de navigation, et réessayez.</h3>

        <div class="retour">
            <a href="../index.php?action=index"><button>Accueil</button></a>
            <a href="../index.php?action=connecte" class="lienRetour">Page de connexion</a>
        </div>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require 'template404.php'; ?>