<?php
$title = 'Anthony Lucchini Livres';
ob_start();
?>
<link rel="stylesheet" href="./public/styles/style-livre.css">
<link rel="stylesheet" href="./public/styles/style_illustration.css">
<link rel="stylesheet" href="./public/styles/styles_videos.css">
<link rel="stylesheet" href="./public/styles/style_btn_retour.css">
<!-- icone -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
<?php
$liens = ob_get_clean();

ob_start()
?>

<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php $meta = ob_get_clean();

ob_start(); ?>

<main id="pageLivre">

    <!-- section visuel de tout les livres -->
    <listedoeuvre></listedoeuvre>


    <!-- Nocturnes tome 1 -->
    <section id="eveil" class="listeOeuvre">

        <div class="carteLivre">

            <div class="mobile">
                <h3>Les Nocturnes</h3>
                <h4>Tome 1 : <strong>L'Éveil</strong></h4>

            </div>

            <div class="visuel">

                <img src="./public/ressources/Nocturnes_T1/face-tome1.png" alt="Image Les Nocturnes, tome 1 : L'Éveil">

            </div>
            <div class="dateParution">
                <p class="italic"> Date de parution : </p>
                <p>18/04/2018</p>
            </div>
            <div class="nbrPage">
                <p>352 pages</p>
            </div>

        </div>

        <div class="presentation">

            <div class="unTitre">
                <h3>Les Nocturnes</h3>
                <h4>Tome 1 : <strong>L'Éveil</strong></h4>

            </div>

            <div class="caracteristique">
                <div class="imgsrcPetit">
                    <img src="./public/ressources/Nocturnes_T1/Tome1_les-nocturnes.png" alt="Image Les Nocturnes, tome 1 : L'Éveil">
                </div>

                <div class="droite">
                    <div class="editeur">
                        <p class="italic">Éditeur :</p>
                        <img src="./public/ressources/logo-maison-edition/petit logo noir.png" alt="logo editeur">
                        <p>Beta Publisher</p>
                    </div>

                    <div class="dimensions">
                        <p class="italic">Dimensions :</p>
                        <p> 13.5 x 21.5 cm</p>
                    </div>

                    <div class="isbn">
                        <p class="italic">Numéro ISBN :</p>
                        <p>978-2-490163-02-1</p>
                    </div>

                    <div class="illus-couv">
                        <p class="italic">Illustration de couverture :</p>
                        <p>Lorem ipsum</p>
                    </div>

                    <div class="details">
                        <p class="italic">Détails :</p>
                        <p>Couverture souple, pas d'illustration interne</p>

                    </div>
                </div>

            </div>

            <div class="restant">
                <p class="resum-titre">Résumé :</p>
                <p>N'avez vous jamais rêvé de terres lointaines, de monstres ou de magie ? Ne vous êtes vous jamais réveillés avec d'étranges images en tête ou des palpitations ? Rémi, lui, vit ses rêves au lieu de rêver sa vie. Accompagné de ses trois amis, il va vivre des aventures épiques et faire face à ses pires cauchemars.</p>
            </div>

            <!-- div bouton extra et avis du tome 1 d'éclipse dans le Vue js -->
            <nocturneseveil @afficheillus="btnilluseveil" @montreavis="btnaviseveil"></nocturneseveil>

        </div>

    </section>


    <div id="grandeIllus"></div>
    <!-- affiche les illustrations en appuyant sur le bouton bonus grace au js -->
    <div v-show="cacheIllus1" id="illustrations1"></div>

    <!-- affiche donner son avis du tome 1 -->
    <!-- <avistome1 v-show="cacheAvis1" @aviseveilenvoi="btnsubmitaviseveil"></avistome1> -->




    <!-- Nocturnes tome 2 -->
    <section id="ascension" class="listeOeuvre">

        <div class="carteLivre">

            <div class="mobile">
                <h3>Les Nocturnes</h3>
                <h4>Tome 2 : <strong>L'Ascension</strong></h4>

            </div>

            <div class="visuel">

                <img src="./public/ressources/Nocturnes_T2/Tome2_les_nocturnes.png" alt="Image Les Nocturnes, tome 2 : L'Ascension">

            </div>
            <div class="dateParution">
                <p class="italic"> Date de parution : </p>
                <p>13/05/2019</p>
            </div>
            <div class="nbrPage">
                <p>412 pages</p>
            </div>

        </div>


        <div class="presentation">

            <div class="unTitre">
                <h3>Les Nocturnes</h3>
                <h4>Tome 2 : <strong>L'Ascension</strong></h4>

            </div>

            <div class="caracteristique">
                <div class="imgsrcPetit">
                    <img src="./public/ressources/Nocturnes_T2/Tome2_les_nocturnes_2020-05-04.png" alt="Image Les Nocturnes, tome 2 : L'Ascension">
                </div>

                <div class="droite">
                    <div class="editeur">
                        <p class="italic">Éditeur :</p>
                        <img src="./public/ressources/logo-maison-edition/petit logo noir.png" alt="logo editeur">
                        <p>Beta Publisher</p>
                    </div>

                    <div class="dimensions">
                        <p class="italic">Dimensions :</p>
                        <p> 13.5 x 21.5 cm</p>
                    </div>

                    <div class="isbn">
                        <p class="italic">Numéro ISBN :</p>
                        <p>978-2-490163-14-4</p>
                    </div>

                    <div class="illus-couv">
                        <p class="italic">Illustration de couverture :</p>
                        <p>Lorem ipsum</p>
                    </div>

                    <div class="details">
                        <p class="italic">Détails :</p>
                        <p>Couverture souple, pas d'illustration interne</p>

                    </div>
                </div>

            </div>

            <div class="restant">
                <p class="resum-titre">Résumé :</p>
                <p>Alors que certains rêvent leur vie, Rémi et ses amis ont su faire de leurs rêves une réalité...à leur risques et périls. Les cauchemars attendent patiemment leur heure s’insinuant lentement au plus profond de leurs âmes, semant le doute et le chaos en leur coeur. Lorsque le rêve investit la réalité, lequel doivent-ils choisir de sauver ?</p>
            </div>

            <nocturnesascension @afficheillusascension="btnillu2"></nocturnesascension>
        </div>
    </section>

    <div v-show="cacheIllus2" id="bonus2"></div>

    <!-- affiche donner son avis du tome 2 -->
    <!-- <avistome2 v-show="cacheAvis2" @aviseveilenvoi="btnsubmitavisascension"></avistome2> -->


    <!-- Nocturnes tome 3 -->
    <section id="illumination" class="listeOeuvre">

        <div class="carteLivre">

            <div class="mobile">
                <h3>Les Nocturnes</h3>
                <h4>Tome 3 : <strong>L'Illumination</strong></h4>

            </div>

            <div class="visuel">

                <img src="./public/ressources/Nocturnes_T3/Nocturnes-T3.png" alt="Image Les Nocturnes, tome 3 : L'Illumination">

            </div>
            <div class="dateParution">
                <p class="italic"> Date de parution : </p>
                <p>14/04/2020</p>
            </div>
            <div class="nbrPage">
                <p>340 pages</p>
            </div>

        </div>


        <div class="presentation">

            <div class="unTitre">
                <h3>Les Nocturnes</h3>
                <h4>Tome 3 : <strong>L'Illumination</strong></h4>

            </div>

            <div class="caracteristique">
                <div class="imgsrcPetit">
                    <img src="./public/ressources/Nocturnes_T3/Capture_ecran_T3.png" alt="Image Les Nocturnes, tome 3 : L'Illumination">
                </div>

                <div class="droite">
                    <div class="editeur">
                        <p class="italic">Éditeur :</p>
                        <img src="./public/ressources/logo-maison-edition/petit logo noir.png" alt="logo editeur">
                        <p>Beta Publisher</p>
                    </div>

                    <div class="dimensions">
                        <p class="italic">Dimensions :</p>
                        <p> 13.5 x 21.5 cm</p>
                    </div>

                    <div class="isbn">
                        <p class="italic">Numéro ISBN :</p>
                        <p>978-2-490163-36-6</p>
                    </div>

                    <div class="illus-couv">
                        <p class="italic">Illustration de couverture :</p>
                        <p>Lorem ipsum</p>
                    </div>

                    <div class="details">
                        <p class="italic">Détails :</p>
                        <p>Couverture souple, pas d'illustration interne</p>

                    </div>
                </div>

            </div>

            <div class="restant">
                <p class="resum-titre">Résumé :</p>
                <p>Le temps des rêves est révolu. Vive celui des cauchemars ! Alors que Rémus arrive au bout de son plan pour prendre la place qui lui revient de droit, Rémi et ses amis ne sont plus ceux qu’ils étaient. Désormais un monde les sépare et c’est seuls qu’ils doivent faire face internemon : eux-mêmes. Dans cet affrontement final entre l’Ombre et la Lumière, qui verra son rêve se réaliser ? Et qui verra sa vie lui échapper ? Une chose est certaine, personne n’en ressortira indemne.</p>
            </div>

            <nocturnesillumination @afficheillusillumination="btnbonus3"></nocturnesillumination>
        </div>
    </section>

    <div v-show="cacheIllus3" id="bonus3"></div>



    <!-- nouvelle pelissanne -->
    <section id="pelissanne" class="listeOeuvre">

        <div class="carteLivre">

            <div class="mobile">
                <h3>Abattu sur le chemin de Pélissanne</h3>
                <h4>? <strong>?</strong></h4>

            </div>

            <div class="visuel">

                <img src="./public/ressources/pelissanne/NB_abattu_sur_le_chemin_de_pélissanne_72_dpi.png" alt="Illustration Abattu sur le chemin de Pélissanne">

            </div>
            <div class="dateParution">
                <p class="italic"> Date de parution : Non communiqué</p>
                <p></p>
            </div>
            <div class="nbrPage">
                <p>Non communiqué pages</p>
            </div>

        </div>


        <div class="presentation">

            <div class="unTitre">
                <h3>Abattu sur le chemin de Pélissanne</h3>
                <h4><strong></strong></h4>

            </div>

            <div class="caracteristique">
                <div class="imgsrcPetit">
                    <img src="./public/ressources/pelissanne/NB_abattu_sur_le_chemin_de_pélissanne.png" alt="Illustration Abattu sur le chemin de Pélissanne">
                </div>

                <div class="droite">
                    <div class="editeur">
                        <p class="italic">Éditeur :</p>
                        <img src="./public/ressources/logo-maison-edition/petit logo noir.png" alt="logo editeur">
                        <p>Non communiqué</p>
                    </div>

                    <div class="dimensions">
                        <p class="italic">Dimensions :</p>
                        <p> Non communiqué</p>
                    </div>

                    <div class="isbn">
                        <p class="italic">Numéro ISBN :</p>
                        <p>Non communiqué</p>
                    </div>

                    <div class="illus-couv">
                        <p class="italic">Illustration de couverture :</p>
                        <p>Valdra</p>
                    </div>

                    <div class="details">
                        <p class="italic">Détails :</p>
                        <p>Non communiqué</p>

                    </div>
                </div>

            </div>

            <div class="restant">
                <p class="resum-titre">Résumé :</p>
                <p>Non communiqué</p>
            </div>

            <pelissanne @affichepelissanne="btnbonus4"></pelissanne>
        </div>
    </section>

    <div v-show="cacheIllusPelissanne" id="bonus4"></div>



    <div id="btnRetour">
        <a href="#bandeHaut"><button id="retourHaut" title="Retour haut de page"><i class="fas fa-sort-up"></i></button></a>
    </div>


</main>

<?php $content = ob_get_clean();
ob_start(); ?>

<!-- mes scripts -->
<script src="./public/scripts/script_livre.js"></script>
<script src="./public/scripts/script_bouton_retour.js"></script>


<?php $scripts = ob_get_clean();
require './view/template.php';
?>