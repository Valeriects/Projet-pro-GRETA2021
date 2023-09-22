function resteSelect() {
    classList.toggle('encadrement');
}

console.log("hello !!");
// const ahref = document.querySelector(".gauche");

// ahref.addEventListener(click, function () {
    
// })

if(sessionStorage == null) document.write("Storage non supporté par le navigateur");

sessionStorage["cadre"] = 'class="encadrement"';

sessionStorage.setItem('class', 'encadrement');

const CLASS = sessionStorage.getItem('class');

