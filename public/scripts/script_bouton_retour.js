
// pour le bouton du retour vers le haut
// je fais une constante de la div où se palce le bouton de retour
const RETOUR = document.querySelector("#btnRetour");

// au scroll de ma page, je passe la fonction auScroll()
window.onscroll = function () {auScroll()};
// ici, je définis la fonction auScroll()
function auScroll() {
    // les chiffres sont des pixels !
    // si on scroll a plus de 100 pixels du haut ou bien qu'un élément fasse pareil 
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        // alors la div du bouton retour apparait
        RETOUR.style.display = "block";
    } else {
        // sinon, la div du bouton de retour disparait
        RETOUR.style.display = "none";
    }
}
