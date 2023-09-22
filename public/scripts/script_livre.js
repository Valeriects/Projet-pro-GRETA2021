
// vueJS

const LIVRE = Vue.createApp({
    data() {
        return {
            
            cacheIllus1: false,
            cacheAvis1: false,
            cacheIllus2: false,
            cacheAvis2: false,
            cacheIllus3: false,
            cacheAvis3: false,
            cacheIllusPelissanne: false,
            cacheAvisPelissanne: false,
            pasbon: false,
            toutbon: false, 
            saisiepseudo: "",
            saisiemessage: ""
        }
    },
    methods: {
        // au click sur le bouton extra, je montre les illustrations :
        btnilluseveil() {
            // console.log("janescendre")
            
            if(this.cacheIllus1 === false) {
                // agit uniquement sur le v-show="cacheIllus1"
                this.cacheIllus1 = true
                // et si jamais le formulaire d'avis était ouvert il se fermerait
                this.cacheAvis1 = false
            } else {
                this.cacheIllus1 = false
                this.cacheAvis1 = false
            }
        }
        ,
        // au click sur le bouton avis, j'affiche le formulaire d'avis:
        btnaviseveil() {
            if(this.cacheAvis1 === false) {
                // agit uniquement sur le v-show="cacheAvis1"
                this.cacheAvis1 = true
                // et si jamais les ilustration sont affichées, alors elles se cacheraient
                this.cacheIllus1 = false
            } else {
                this.cacheAvis1 = false
                this.cacheIllus1 = false
            }
        },
        btnillu2() {
             if(this.cacheIllus2 === false) {
                // agit uniquement sur le v-show="cacheIllus2"
                this.cacheIllus2 = true
            } else {
                this.cacheIllus2 = false
            }
        },
        btnbonus3() {
             if(this.cacheIllus3 === false) {
                // agit uniquement sur le v-show="cacheIllus3"
                this.cacheIllus3 = true
            } else {
                this.cacheIllus3 = false
            }
        },
        btnbonus4() {
            if (this.cacheIllusPelissanne === false) {
                this.cacheIllusPelissanne = true
            } else {
                this.cacheIllusPelissanne == false
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
                            <img src="./public/ressources/Nocturnes_T1/Tome1_les-nocturnes.png" alt="Image Les Nocturnes, tome 1 :  L'Éveil">
                            
                        </a>
                        <p><strong>Tome 1 :</strong> L'Éveil</p>
                    </li>

                    <li class="couv">
                        <a href="#ascension">
                            <img src="./public/ressources/Nocturnes_T2/Tome2_les_nocturnes_2020-05-04.png" alt="Image Les Nocturnes, tome 2 :  L'Ascension">
                            
                        </a>
                        <p> <strong>Tome 2 :</strong> L'Ascension</p>
                    </li>

                    <li class="couv">
                        <a href="#illumination">
                            <img src="./public/ressources/Nocturnes_T3/Capture_ecran_T3.png" alt="Image Les Nocturnes, tome 3 :  L'Illumination">
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

// composant boutons tome 1 nocturnes
LIVRE.component('nocturneseveil', {

    emits: ['afficheillus', 'montreavis'],

    methods: {
        btnillustration() {
            
            this.$emit('afficheillus')
        },
        btnavis() {
            this.$emit('montreavis')
        }
    },

    template : `    <div class="bouton">
                        <a href="#bouton"><button @click="btnillustration" id="bouton" class="bonusEveil"> Bonus</button></a>
                    
                        <a href="./index.php?action=listeAvis"><button @click="btnavis" id="boutonavis" class="avisEveil">Voir tous les avis</button></a>
                        
                        <a href="./index.php?action=tarifOne"><button id="boutonprix" class="achatEveil">Acheter</button></a>

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
                    
                    <div class="mobileBouton">
                        <div class="mobBtn1">
                            <a href="#bouton"><button @click="btnillustration" id="bouton" class="bonusEveil"> Bonus</button></a>
                       
                            <a href="./index.php?action=listeAvis"><button @click="btnavis" id="boutonavis" class="avisEveil">Voir tous les avis</button></a>
                        
                            <a href="./index.php?action=tarifOne"><button id="boutonprix" class="achatEveil">Acheter</button></a>
                        </div>

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
                    </div>`
})


// composant boutons tome 2 nocturnes
LIVRE.component('nocturnesascension', {

    emits: ['afficheillusascension', 'montreavisascension'],

    methods: {
        btnillus2 () {
            
            this.$emit('afficheillusascension')
        },
        btnavis2() {
            this.$emit('montreavisascension')
        }
    },

    template : `    <div class="bouton">
                        <a href="#bouton2"><button @click="btnillus2" id="bouton2" class="bonusAscension"> Bonus</button></a>
                    
                        <a href="./index.php?action=listeAvis"><button id="boutonavis2" class="avisAscension">Voir tous les avis</button></a>
                        
                        <a href="./index.php?action=tarifTwo"><button id="boutonprix2" class="achatAscension">Acheter</button></a>

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
                    
                    <div class="mobileBouton">
                        <div class="mobBtn1">
                            <a href="#bouton"><button @click="btnillus2" id="bouton" class="bonusAscension"> Bonus</button></a>
                       
                            <a href="./index.php?action=listeAvis"><button id="boutonavis" class="avisAscension">Voir tous les avis</button></a>
                        
                            <a href="./index.php?action=tarifTwo"><button id="boutonprix" class="achatAscension">Acheter</button></a>
                        </div>

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
                    </div>`
})

// composant boutons tome 3 nocturnes
LIVRE.component('nocturnesillumination', {

    emits: ['afficheillusillumination', 'montreavisillumination'],

    methods: {
        btnbonus3 () {
            
            this.$emit('afficheillusillumination')
        },
        btnavis3() {
            this.$emit('montreavisillumination')
        }
    },

    template : `    <div class="bouton">
                        <a href="#bouton3"><button @click="btnbonus3" id="bouton3" class="bonusIllumination"> Bonus</button></a>
                    
                        <a href="./index.php?action=listeAvis"><button id="boutonavis3" class="avisIllumination">Voir tous les avis</button></a>
                        
                        <a href="./index.php?action=tarifThree"><button id="boutonprix3" class="achatIllumination">Acheter</button></a>

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
                    
                    <div class="mobileBouton">
                        <div class="mobBtn1">
                            <a href="#bouton"><button @click="btnbonus3" id="bouton" class="bonusIllumination"> Bonus</button></a>
                       
                            <a href="./index.php?action=listeAvis"><button id="boutonavis" class="avisIllumination">Voir tous les avis</button></a>
                        
                            <a href="./index.php?action=tarifThree"><button id="boutonprix" class="achatIllumination">Acheter</button></a>
                        </div>

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
                    </div>`
})


// composant boutons pelissanne
LIVRE.component('pelissanne', {

    emits: ['affichepelissanne', 'montreavispelissanne'],

    methods: {
        btnbonus4 () {
            
            this.$emit('affichepelissanne')
        },
        btnavis4() {
            this.$emit('montreavispelissanne')
        }
    },

    template : `    <div class="bouton">
                        <a href="#bouton4"><button @click="btnbonus4" id="bouton4" class="bonusPelissanne"> Bonus</button></a>
                    
                        <a href="./index.php?action=listeAvis"><button id="boutonavis4" class="avisPelissanne">Voir tous les avis</button></a>
                        
                        <a href="#bouton4"><button id="boutonprix4" class="achatPelissanne">Acheter</button></a>

                        <div class="prix">
                            <div>
                                <p class="italic">Format numérique :</p> 
                                <p> Non communiqué</p>
                            </div>

                            <div>
                                <p class="italic">Format papier :</p>
                                <p> Non communiqué</p>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="mobileBouton">
                        <div class="mobBtn1">
                            <a href="#bouton4"><button @click="btnbonus4" id="bouton" class="bonusPelissanne"> Bonus</button></a>
                       
                            <a href="./index.php?action=listeAvis"><button id="boutonavis" class="avisPelissanne">Voir tous les avis</button></a>
                        
                            <a href="#bouton4"><button id="boutonprix" class="achatPelissanne">Acheter</button></a>
                        </div>

                        <div class="prix">
                            <div>
                                <p class="italic">Format numérique :</p> 
                                <p> </p>
                            </div>

                            <div>
                                <p class="italic">Format papier :</p>
                                <p> </p>
                            </div>
                        </div> 
                    </div>`
})


LIVRE.mount("#pageLivre")











// JS pur pour fetch illustrations du tome 1

const ILLUSTRATIONS = document.querySelector('#illustrations1')
const BONUSEVEIL = document.querySelector('.bonusEveil')
const MULTIPLICATION = document.querySelector('.multiplicationIllustration')

const VIDEO = `<div id="up"><iframe class="video1" width="560" height="315" src="https://www.youtube.com/embed/16rXZdJ3O4M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>`
 ILLUSTRATIONS.innerHTML += VIDEO

const FETCH = fetch(`./public/json/illustration_eveil.json`)
.then(response => response.json())
.then(data => {
    console.log(data)

    for (item of data) {

        const HTML = `
        <div class="mySlides"><img src='${item.src}'></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <section class="multiplicationIllustration">
            <img class="illimage" src="${item.src}" alt="${item.alt}" description="${item.description}" onclick="currentSlide(1)">
            <div class="legende">
                <p class="title"> ${item.title} </p>
                <a class="lien" href="${item.lien_auteur}"> ${item.auteur}</a>
            </div>
        </section>`

        ILLUSTRATIONS.innerHTML += HTML

    }

})


// JS pur pour fetch videos

const BONUS2 = document.querySelector('#bonus2')
const BONUSASCENSION = document.querySelector('.bonusAscension')
const BONUS3 = document.querySelector('#bonus3')
const BONUSILLUMINATION = document.querySelector('.bonusIllumination')




const HTML = `<iframe class="video" width="560" height="315" src="https://www.youtube.com/embed/qY-DxX0R0JM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`

BONUS2.innerHTML += HTML

const HTML2 = `<iframe class="video" width="560" height="315" src="https://www.youtube.com/embed/qvivG5Ve3vY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`
    
BONUS3.innerHTML += HTML2




// JS pur pour fetch illustrations de la nouvelle de Pélissanne:

const ILLUSPELISSANNE = document.querySelector('#bonus4')
const BONUSPELISSANNE = document.querySelector('.bonusPelissanne')
const MULTIPELISSANNE = document.querySelector('.multipelissanne')

const FETCH4 = fetch(`./public/json/illustration_pelissanne.json`)
.then(response => response.json())
.then(data4 => {
    console.log(data4)

    for (result of data4) {

        const HTML4 = `
        <div class="mySlides"><img src='${result.src}'></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <section class="multipelissanne">
            <img class="illimagePelissanne" src="${result.src}" alt="${result.alt}" description="${result.description}" onclick="currentSlide(1)">
            <div class="legende">
                <p class="title"> ${result.title} </p>
                <a class="lien" href="${result.lien_auteur}"> ${result.auteur}</a>
            </div>
        </section>`

        ILLUSPELISSANNE.innerHTML += HTML4

    }

})

// test pr image:

// var slideIndex = 1;
// showSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("mySlides");
//   var dots = document.getElementsByClassName("illimage");
// //   var captionText = document.getElementById("caption");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
//   captionText.innerHTML = dots[slideIndex-1].alt;
// }


