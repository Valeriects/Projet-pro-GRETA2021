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
            <a href="https://www.betapublisher.com/roman/l'%C3%A9veil" target=" _blank">
                <img class="logo_img" src="./public/ressources/tarif_logo/Logo Noir fond transparent.png" alt="lien vers beta publisher">
                <p>Ebook (Epub et Mobi) uniquement</p>
            </a>

        </div>
        <div class="border">
            <a href="https://livre.fnac.com/a12131796/Les-nocturnes-L-eveil-Tome-1-Les-Nocturnes-Anthony-Lucchini#omnsearchpos=3" target="_blank">
                <img class="logo_img" src="./public/ressources/tarif_logo/OIP.jpg" alt="lien vers la fnac">
                <p>Format broché et Ebook (Epub)</p>
            </a>
        </div>
        <div class="border">
            <a href="https://www.amazon.fr/Nocturnes-L%C3%89veil-Anthony-Lucchini/dp/2490163027/ref=sr_1_1?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=anthony+lucchini&qid=1635687951&qsid=262-0985527-8711863&sr=8-1&sres=2490163027%2C2490163361%2C2490163140%2CB07HSK1LKQ%2CB08WX6V7F4%2CB0838J37FL%2CB07Q4816JM%2CB01M1EZRLI%2CB08DCJNMY7%2CB082YRTP98%2CB07Z7531RS%2CB07K138XGS%2C2746735830%2CB07T3NQ9XN%2CB01BFLUE44%2CB07WDZ5R2B%2CB01CKCON7G%2CB01BQRDHDC%2CB000VTHUEY%2CB000069B9O&srpt=ABIS_BOOK" target="_blank">
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