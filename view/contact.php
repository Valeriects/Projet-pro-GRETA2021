<?php
$title = 'Anthony Lucchini Contact';
ob_start();
?>
<link rel="stylesheet" href="./public/styles/style_contact.css">
<link rel="stylesheet" href="./public/styles/style-contact_zone-selection.css">
<?php
$liens = ob_get_clean();

ob_start()
?>

<meta name="description" content="Le site officiel d'Anthony Lucchini, auteur de la trilogie onirique des Nocturnes, originaire de Salon de provence. Écrivain jeunesse français, sa première trilogie fait partie des livres jeunesse de romans d’initiation. Venez découvrir ses oeuvres, les bonus associés et les avis d'autres passionnés de lecture comme vous.">

<?php
$meta = ob_get_clean();
ob_start(); ?>
<!--corps de la page -->
<main class="container_contact">

    <div class="petit">
        <p>Vous êtes : </p>

        <div class="custom-select">

            <select class="boum" name="Rubrique" onchange='Choix()'>
                <option value="0">Sélectionner ...</option>
                <option value="1">Professionnels</option>
                <option value="2">Lecteurs</option>
            </select>

        </div>
    </div>

    <div class="toutFormulaire">
        <!-- pour l'affichage par défault -->
        <div id="zero"></div>


        <div id="contactForm1">
            <!-- formulaire pour professionnels -->

            <form class="contactFormUn" action="./index.php?action=contact" method="post" enctype="multipart/form-data">

                <div class="gauche">
                    <label class="prems" for="organisme">Organisme* :</label>
                    <input class="un" id="organisme" type="text" placeholder="Le nom de votre organisme" name="organisme" />

                    <label class="deux" for="adresse">Adresse* :</label>
                    <input class="trois" id="adresse" type="text" placeholder="Votre adresse postale" name="adresse" />

                    <label class="quatre" for="pays">Pays* :</label>
                    <input class="cinq" id="pays" type="text" placeholder="Votre pays" name="pays" />

                    <label class="six" for="telephone">Téléphone* :</label>
                    <input class="sept" id="telephone" type="text" placeholder="Votre numéro de téléphone" name="telephone" />

                    <label class="huit" for="email">E-Mail* :</label>
                    <input class="neuf" id="email" type="text" placeholder="Votre E-Mail" name="email" />

                    <p class="paragraphe">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe quas mollitia sapiente eligendi nobis suscipit facere. Aliquid, ipsum, sint adipisci pariatur quisquam, saepe alias officiis inventore illo voluptatem veritatis veniam?
                    </p>

                </div>

                <div class="droite">
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti voluptate optio earum officia unde dolores libero, aperiam quidem iure aliquam aliquid, ducimus quae facere? Sed explicabo alias modi dignissimos cumque!</p>

                        <label for="piece_jointe"></label>
                        <!-- soit 3Mo dans la valeur max -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                        <input id="piece_jointe" class="PJ" type="file" name="filename" placeholder="Pièce jointe" />
                    </div>

                    <div>

                        <label for="Message">Message* :</label>
                        <textarea id="Message" name="Message" placeholder="Votre message ..."></textarea>

                        <div class="btnenvoyer">
                            <span class="captcha">captcha en bas a droite avt le mini mention</span>
                            <input type="submit" value="Envoyez">
                        </div>

                    </div>
                </div>
            </form>
        </div>



        <div id="contactForm2">
            <!-- formulaire pour lecteurs -->
            <form class="contactForm" action="./index.php?action=contact" method="post" enctype="multipart/form-data">
                <div class="gauche">
                    <div class="formDiv">
                        <p id="civilite">Civilités* :</p>
                        <div class="radio">
                            <input id="MME" type="radio" id="MME" name="sexe" value="Mme.">
                            <label for="MME">Mme.</label>

                            <input id="MR" type="radio" id="MR" name="sexe" value="Mr.">
                            <label for="MR">Mr.</label>
                        </div>
                    </div>

                    <label class="alphas" for="nom">Nom* :</label>
                    <input class="beta" id="nom" type="text" placeholder="Votre nom" name="nom" />

                    <label class="capa" for="lieu">Pays* :</label>
                    <input class="delta" id="lieu" type="text" placeholder="Votre pays" name="lieu" />

                    <label class="epzilon" for="mail">E-Mail* :</label>
                    <input class="falbala" id="mail" type="text" placeholder="Votre E-Mail" name="mail" />


                    <p class="paragraphe">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Saepe quas mollitia sapiente eligendi nobis suscipit facere. Aliquid, ipsum, sint adipisci pariatur quisquam, saepe alias officiis inventore illo voluptatem veritatis veniam?
                    </p>

                </div>

                <div class="droite">
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti voluptate optio earum officia unde dolores libero, aperiam quidem iure aliquam aliquid, ducimus quae facere? Sed explicabo alias modi dignissimos cumque!</p>

                        <label for="piece_jointe"></label>
                        <!-- soit 3Mo dans la valeur max -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                        <input id="piece_jointe" class="PJ" type="file" name="filenameLect" placeholder="Pièce jointe" />


                    </div>

                    <div>

                        <label for="Message">Message* :</label>

                        <textarea id="Message" name="msgLect" placeholder="Votre message ..."></textarea>

                        <div class="btnenvoyer">
                            <span class="captcha">captcha en bas a droite avt le mini mention</span>
                            <input type="submit" value="Envoyez">

                        </div>

                    </div>
                </div>


            </form>
        </div>
        <!-- fin formulaire pour lecteurs -->


        <div class="erreurChamp">

            <p class="cacheErreur">Attention, vous n'avez pas cochez le captcha.</p>

            <p class="cacheErreur">Attention, vous n'avez pas remplis tous les champs.</p>

            <p class="cacheErreur">Attention, veuillez entrer une adresse mail.</p>

            <p class="cacheErreur">Attention, veuillez entrer un numéro de téléphone.</p>

            <!-- uniquement au click sur le bouton Ajouter -->
            <p class="cacheErreur">Attention, aucun fichier n'a été sélectionné.</p>

        </div>


        <!-- </div> -->

        <p class="miniMentions">* Champs Obligatoires.</p>

        <!-- </section> -->

    </div>
    <!-- </div> -->
</main>

<?php $content = ob_get_clean();
ob_start(); ?>


<!-- mes scripts -->
<script src="./public/scripts/script-formulaire-contact.js"></script>
<script src="./public/scripts/script-formulaire-selection.js"></script>

<?php $scripts = ob_get_clean();
require 'template.php';
?>