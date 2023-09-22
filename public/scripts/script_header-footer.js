

// Pour faire des composants de la barre de nav et du footer avec vueJS
// afin que cela prenne moins de place sur les pages php

// le bandeau du haut
const HEADER =Vue.createApp({})

HEADER.component('bande_header', {


    template : `<div class="container-header">

                    <div class="titre">
                        <a href="./index.php?action=index">Anthony Lucchini</a>
                    </div>

                    <div class="img-croquis">
                        <img class="croquis" src="./public/ressources/croquis/livre01_blanc.png" alt="croquis livre phare tentacule">
                    </div>

                    <div class="bio">
                        <a href="./index.php?action=bio">Biographie</a>
                    </div>

                    <div class="livres">
                        <a href="./index.php?action=livre">Livres</a>
                    </div>

                    <div class="presse">
                        <a href="./index.php?action=press">Revue de presse</a>
                    </div>

                    <div class="agenda">
                        <a href="./index.php?action=agenda">Agenda</a>
                    </div>

                    <div class="icone">
                        <img class="burger" src="./public/ressources/icon/2x/outline_menu_white_24dp.png" alt="icone du menu" >
                    </div>

                </div>


                <div class="menuPopup hidden">

                    <a href="./index.php?action=index">Accueil 
                        <i class="fas fa-home"></i>
                    </a>

                    <a href="./index.php?action=bio">Biographie  
                        <i class="fas fa-portrait"></i>
                    </a>

                    <a href="./index.php?action=livre">Livres  
                        <i class="fas fa-book"></i>
                    </a>

                    <a href="./index.php?action=press">Revue de presse  
                        <i class="fas fa-newspaper"></i>
                    </a>          

                    <a href="./index.php?action=agenda">Agenda  
                        <i class="far fa-calendar-alt"></i>
                    </a>

                    <a href="./index.php?action=contact">Contact  
                        <i class="fas fa-comment-dots"></i>
                    </a>

                    <a href="./index.php?action=construction">Paramètres  
                        <i class="fas fa-cogs"></i>
                    </a>
                    
                </div>`
})

HEADER.mount("#bandeHaut")




//debut code menu burger qui s'ouvre lorsqu'on clique dessus
const MENUPOPUP = document.querySelector(".menuPopup");
const ICONE = document.querySelector(".icone");

// au clique sur l'icone menu du format mobile, cela ouvre le pop up menu
ICONE.addEventListener("click", ()=> {
    MENUPOPUP.classList.toggle('hidden');
})



// le bandeau du bas
const FOOTER = Vue.createApp({})

FOOTER.component('bande-footer', {
    template : `<div class="container-footer">
                    <div class="contact">
                        <a href="./index.php?action=contact">Me contacter</a>
                    </div>
                    <div class="tiret1">-</div>
                    <div class="cgu">
                        <a href='./index.php?action=construction'>CGU</a>
                    </div>
                    <div class="mentions">
                        <a href="./index.php?action=construction">Mentions légales</a>
                    </div>
                    <div class="tiret2">-</div>
                    <div class="cookie">
                        <a href="./index.php?action=construction">Gestion des cookies</a>
                    </div>
                    <div class="img">
                        <a href="https://www.betapublisher.com/">
                            <img class="logo" src="./public/ressources/logo-maison-edition/Blanc-complet.png" alt="logo beta publisher" title="Beta Publisher" description="logo en blanc de Beta Publisher">
                        </a>
                    </div>
                </div>`
})

FOOTER.mount("#bande_bas")