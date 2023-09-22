html, body {
width: 100%;
height:100%;
overflow: none;
}

.container-header {
position: fixed;
top: 0px;
left: 0px;
height: 200px;
right: 0px;
overflow: hidden;
z-index: 999;
}

.container-footer {
position: fixed;
bottom: 0px;
left: 0px;
right: 0px;
overflow: hidden;
}

#log, #imgconnect {
display : flex;
flex-direction: column;
justify-content: center;
align-items: center;
justify-items: center;
align-content : center;
position: absolute;
top: 132px;
bottom: 70px;
left: 0px;
right: 0px;
overflow: none;
}

.lienConnecte {
font-size: .9em;
font-family: "Arimo", sans-serif;
color: var(--bleu);
font-weight: bold;
margin-top: 2vh;
}

.wrap {
display: flex;
flex-direction: column;
justify-content: center;
border: 1.5px solid var(--bleu);
border-radius: 0.3em;
box-shadow: 4px 5px 6px 0px #d0d0d0f0;
width: 40%;
height: 45vh;
padding: 1em 2em;
}

.formulaire {
display: flex;
flex-direction: column;
justify-content: center;
align-content : space-evenly;
height: 80%;

}

.rowForm {
display: flex;
flex-direction: row;
justify-content: space-around;
align-items: center;
}

.inputInscription {
width: 50%;
border: 0.5px solid var(--bleu);
border-radius: 0.3em;
background-color: var(--moinsBlanc);
height: 4vh;
padding-left: 0.8vw;
font-size: 0.8em;
}

.labelInscription {
width: 40%;
font-size: 0.8em;
}

::placeholder {
color: var(--gris);
font-size: 0.9em;
}

.btninscription, .btnConnecte {
width: 20%;
justify-self: center;
margin: 0;
}

.btn {
display: flex;
justify-content: center;
}

.index {
margin: 0;
}

#bande-bas {
height: 70px;
}

.red {
color: red;
font-weight: bold;
font-family: "Arimo", sans-serif;
}

.blue {
color: var(--bleu);
font-weight: bold;
font-family: "Arimo", sans-serif;
}

#boutonavis {
    margin-right:0;
}

@media (max-width: 768px) {
.wrap {
width: 75%;
height: 50vh;
}

.btninscription, .btnConnecte {
width: 35vw;
}

.inputInscription {
width: 70%;
}

.red {
margin-top: 1.5vh;

}


}