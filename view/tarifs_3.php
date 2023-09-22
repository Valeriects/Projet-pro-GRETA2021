<?php
$title = 'Anthony Lucchini Livres Tarifs';
ob_start();
?>
<link rel="stylesheet" href="./public/styles/style_tarif.css">
<?php
$liens = ob_get_clean();

ob_start()
?>

<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php $meta = ob_get_clean();

ob_start(); ?>

<main>

    <div id="tarif">
        <div class="border">
            <a href="https://www.betapublisher.com/roman/l'illumination" target="_blank">
                <img class="logo_img" src="./public/ressources/tarif_logo/Logo Noir fond transparent.png" alt="lien vers beta publisher">
                <p>Ebook (Epub et Mobi) uniquement</p>
            </a>

        </div>
        <div class="border">
            <a href="https://livre.fnac.com/a14688452/Anthony-Lucchini-Les-Nocturnes#omnsearchpos=4" target="_blank">
                <img class="logo_img" src="./public/ressources/tarif_logo/OIP.jpg" alt="lien vers la fnac">
                <p>Format broché et Ebook (Epub)</p>
            </a>
        </div>
        <div class="border">
            <a href="https://www.amazon.fr/LIllumination-Anthony-Lucchini/dp/2490163361/ref=pd_sbs_1/262-0985527-8711863?pd_rd_w=JvTIZ&pf_rd_p=81cea6b9-d758-4c09-83c8-cd14bfe8b85f&pf_rd_r=RND5YRDN20BCKJ49PPV9&pd_rd_r=14956377-adf4-47d0-8c53-b14b7fb1850d&pd_rd_wg=ECwpQ&pd_rd_i=2490163361&psc=1" target="_blank">
                <img class="logo_img" src="./public/ressources/tarif_logo/Amazon-logo.png" alt="lien vers amazon">
                <p>Format broché et Ebook (kindle)</p>
            </a>
        </div>
        <div class="border">
            <a href="https://www.librairiesindependantes.com/product/category/3750/?query=les+nocturnes" target="_blank">
                <img class="logo_img inde" src="./public/ressources/tarif_logo/R.jpg" alt="lien vers beta publisher">
                <p></p>
            </a>
        </div>
        <div class="border">
            <a href="https://www.librairiesindependantes.com/product/category/3750/?query=les+nocturnes" target="_blank">
                <img class="logo_img inde" src="./public/ressources/tarif_logo/R.jpg" alt="lien vers beta publisher">
                <p></p>
            </a>
        </div>

    </div>

</main>
<?php $content = ob_get_clean();
require './view/template.php';
?>