// const PRESS = Vue.createApp({
//     data() {
//         return {
//             imgSrc : "",
//             imgAlt : "",
//             nomJournal : "",
//             titreArticle : "",
//             extraitArticle : "",
//             dateEdition : "",
//             siteSrc : "",
//             siteAlt : ""
//         }
//     },
//     // pour que le fetch soit mit en place dès que l'applicaton est montée
//     mounted() {
//         this.articlePress()
//     },
//     methods: {
//         articlePress() {
//             fetch(`./json/presse.json`)
//             .then (response => response.json())
//             .then (chaqueArticle => {
//                 console.log(chaqueArticle)

//                 for(carta of chaqueArticle) {
//                     this.imgSrc = carta.srcImg ,
//                     this.imgAlt = carta.altImg ,
//                     this.nomJournal = carta.nomPress ,
//                     this.titreArticle = carta.titleExtrait ,
//                     this.extraitArticle = carta.extrait ,
//                     this.dateEdition = carta.date,
//                     this.siteSrc = carta.srcLien,
//                     this.siteAlt = carta.altLien       
//                 }
               
//             })
//             .catch(function(err) {
//                 console.warn(err)
//             })
//         }
        

//     }

// }).mount("#press")




// fetch en js pur
const INSERER = document.querySelector("#press");

fetch(`./public/json/presse.json`)
.then (response => response.json())
.then (chaqueArticle => {
    console.log(chaqueArticle)
    // appelle de la fonction carta() avec les données json
    carta(chaqueArticle) 
})
.catch(function(err) {
    console.error(err)
})


// fonction carta()
function carta(response) {
    for (element of response) {
        const CARDHTML = `
        <li>
            <div class="cadre">
                <img src="${element.srcImg}" alt="${element.altImg}">
                <h3>${element.nomPress}</h3>
                <h4>${element.titleExtrait}</h4>
                <p>"${element.extrait}"
                </p>
                <p>${element.date}</p>
                <a href="${element.srcLien}">Lien vers l'article</a>
            </div>
        </li>`   

        INSERER.innerHTML += CARDHTML;

    }

    console.log(INSERER);
}
