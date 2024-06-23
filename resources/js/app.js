import "./bootstrap";
import "~resources/scss/app.scss";
import.meta.glob(["../img/**"]);
import * as bootstrap from "bootstrap";

// SoftDeletes Modal Controll
const deleteBtns = document.querySelectorAll('.delete button');
// controll that there are button
if(deleteBtns.length>0){
    console.log('ciao');
    //create foreach to apply eventlistner on click to button
    deleteBtns.forEach((btn) => {
        btn.addEventListener('click', function (e){
            e.preventDefault();
            // save title take to button by dataset attribute
            const title = btn.dataset.projectTitle;
            // create message to show on page when click form button
            document.getElementById('message').innerHTML = `stai per cancellare<br> <strong>${title}</strong>,<br> ne sei sicuro?`;
            // select button to confirm delete
            const modal = new bootstrap.Modal(document.getElementById('delete-modal'));
            //listen event click button
            document.getElementById("modal-delete-btn")
                .addEventListener("click", function () {
                    // when clicked, I submit the form button (parent)
                    btn.parentElement.submit();
                });
            // show modal on page.
             modal.show();
        });
});
}




// mi collego a degli elemnti in pagina
const oldImgElem = document.getElementById('oldImg')
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
        oldImgElem.classList.add('hide');
    };
    // questa riga usa un metodo per leggere il contenuto e convertirlo in un URL per essere utilizzato come directory e non letto come semplice testo.
    reader.readAsDataURL(e.target.files[0]);
});

btnDeleteElem.addEventListener('click', function(e){
    e.preventDefault();
    btnDeleteElem.classList.add('hide');
    imgElem.classList.add('hide');
    inputElem.value = "";
});



