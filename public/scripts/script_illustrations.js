// vueJS

const LIVRE = Vue.createApp({
    data() {
        return {
            // srcIllus : "",
            // altIllus : "",
            // nomIllus : "",
            // descriptionIllus : "",
            // illustrateur : "",
            // lienIllustrateur : "",
            cache: false
        }
    },
    methods: {
        btnilluseveil() {
            // console.log("janescendre")
            
            if(this.cache === false) {
                this.cache = true
                // agit uniquement sur le v-show="cache"
                
            } else {
                this.cache = false
            }
        }
    }
})

// composant de la section de présentation des différents livres
LIVRE.component('listedoeuvre', {
    template : `
    <div id="liste">
            <div id="un">
                <h3 class="nomHistoire">
                    La trilogie "Les Nocturnes"
                </h3>
                <ul>
                   
                    <li class="couv">
                        <a href="#eveil">
                            <img src="./public/ressources/Nocturnes T1/Tome1_les-nocturnes.png" alt="Image Les Nocturnes, tome 1 :  L'Éveil">
                            
                        </a>
                        <p><strong>Tome 1 :</strong> L'Éveil</p>
                    </li>

                    <li class="couv">
                        <a href="#ascension">
                            <img src="./public/ressources/Nocturnes T2/Tome2_les_nocturnes_2020-05-04.png" alt="Image Les Nocturnes, tome 2 :  L'Ascension">
                            
                        </a>
                        <p> <strong>Tome 2 :</strong> L'Ascension</p>
                    </li>

                    <li class="couv">
                        <a href="#illumination">
                            <img src="./public/ressources/Nocturnes T3/Capture_ecran_T3.png" alt="Image Les Nocturnes, tome 3 :  L'Illumination">
                        </a>
                        <p> <strong>Tome 3 :</strong> L'Illumination</p>
                    </li>
                    
                </ul>

            </div>


            <div id="deux">
                <h3 class="nomHistoire">
                    Abattu sur le chemin de Pélissanne (nouvelle)
                </h3>
                <ul>
                   
                    <li class="couv">
                        <a href="#pelissanne">
                            <img src="./public/ressources/pelissanne/NB_abattu_sur_le_chemin_de_pélissanne.png" alt="Illustration Abattu sur le chemin de Pélissanne">
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    `
})

// composant section tome 1 nocturnes
LIVRE.component('nocturneseveil', {

    emits: ['afficheillus'],

    methods: {
        btnillustration () {
            
            this.$emit('afficheillus')
        }
    },

    template : `
    <section id="eveil" class="listeOeuvre">

                <div class="carteLivre">

                    <div class="visuel">

                        <img src="./public/ressources/Nocturnes T1/face-tome1.png" alt="Image Les Nocturnes, tome 1 : L'Éveil">
                        
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
                            <img src="./public/ressources/Nocturnes T1/Tome1_les-nocturnes.png" alt="Image Les Nocturnes, tome 1 : L'Éveil">
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
                    
                    <div class="bouton">
                        <a href="#illustrations"><button @click="btnillustration" class="bonusEveil"> Bonus</button></a>
                    
                        <button class="avisEveil">Donnez votre avis</button>
                        
                        <button class="achatEveil">Acheter</button>

                        <div class="prix">
                            <div>
                                <p class="italic">Format numérique :</p> 
                                <p> 3,99€</p>
                            </div>

                            <div>
                                <p class="italic">Format papier :</p>
                                <p> 16€</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
        </section>
       
        `
})


LIVRE.mount("#pageLivre")





// JS pur pour fetch du tome 1

const ILLUSTRATIONS = document.querySelector('#illustrations')
const BONUSEVEIL = document.querySelector('.bonusEveil')
const MULTIPLICATION = document.querySelector('.multiplicationIllustration')



const FETCH = fetch(`./public/json/illustration_eveil.json`)
.then(response => response.json())
.then(data => {
    console.log(data)

    for (item of data) {

        const HTML = `
        <section class="multiplicationIllustration">
            <img class="illimage" src="${item.src}" alt="${item.alt}" description="${item.description}">
            <div class="legende">
                <p class="title"> ${item.title} </p>
                <a class="lien" href="${item.lien_auteur}"> ${item.auteur}</a>
            </div>
        </section>`

            
        // console.log(item.title)

        ILLUSTRATIONS.innerHTML += HTML
    }

})


// pas besoin pour la page livre, cela marche avec le v-show mais besoin pour la page extras/bonus
// BONUSEVEIL.addEventListener ("click", function () {

//     // MULTIPLICATION.classList.toggle('cache')
//     ILLUSTRATIONS.classList.toggle('cache')
//     console.log("hello")
// })


