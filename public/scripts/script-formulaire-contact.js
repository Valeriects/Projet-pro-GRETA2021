
function Choix() {
    let res = document.querySelector("select.boum").value;
    console.log(res);
    // pour signifier que je prends le formulaire ("select.boum").value
    switch(res) {
        case '0':
            document.querySelector("#zero").style.display = "block";
            document.querySelector(".miniMentions").style.display = "none";
            document.querySelector("#contactForm1").style.display = "none";
            document.querySelector("#contactForm2").style.display = "none";
        break;
        case '1': 
            document.querySelector("#zero").style.display ="none";
            document.querySelector("#contactForm1").style.display ="block";
            document.querySelector("#contactForm2").style.display = "none";
            document.querySelector(".miniMentions").style.display = "block";
        break;
        case '2':
            document.querySelector("#zero").style.display ="none";
            document.querySelector("#contactForm2").style.display ="block";
            document.querySelector("#contactForm1").style.display = "none";
            document.querySelector(".miniMentions").style.display = "block";
        break;
        default:
            window.location = '127.0.0.1/projet_pro/viewerror_404.php' ;
        break;
    }
}

Choix();
