import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";

// mi collego a degli elemnti in pagina
const imgElem = document.getElementById('imagePreview');
const btnDeleteElem = document.getElementById('btnDelete');
const inputElem = document.getElementById('cover_image');

// ascolto l'evento change dell'input
inputElem.addEventListener('change',function(e){
    //istanzia nuovo oggetto FileReader( è un api che ha dei metodi per legere il contenuto dei file.)
    const reader = new FileReader();
    // questa funzione di callback viene usata dopo che il file viene letto
    reader.onload = function() {
        // imposta la directory del file nel src dell'immagine
        imgElem.src = reader.result;
        // rimuove le classi hide dai due elementi in pagine ( anteprima e bottone rimuovi)
        imgElem.classList.remove('hide');
        btnDeleteElem.classList.remove('hide');
    };
    // questa riga usa un metodo per leggere il contenuto e convertirlo in un URL per essere utilizzato come directory e non letto come semplice testo.
    reader.readAsDataURL(e.target.files[0]);
});

btnDeleteElem.addEventListener('click', function(e){
    e.preventDefault();
    btnDeleteElem.classList.add('hide');
    imgElem.classList.add('hide');
});

