


function valider_champs_lettres(chaine) {
    if (/^[A-Za-z]+$/.test(chaine)) {
        return true;
    } else {
        return false;
    }
}

function valider_champs_nombre(num) {
    if (/^[0-9]+$/.test(num) && num<150 && num>0) {
        return true;
    } else {
        return false;
    }
}

function valider_champs_select (value) {
    if (value === "") {
        return false;
    } else {
        return true;
    }
}

function validation_champs() {
    var nom = document.getElementsByName("nom")[0].value;
    var prenom = document.getElementsByName("prenom")[0].value;

    var age = document.getElementsByName("age")[0].value;

    var select = document.getElementById("symptomes").value;



    if (!valider_champs_lettres(nom)) {
        alert("Nom incorrect");
        return false;
    } 
    
    if (!valider_champs_lettres(prenom)) {
        alert("prenom incorrect");
        return false; 
    } 

    if (!valider_champs_nombre(age)) {
        alert("age incorrect");
        return false;
    } 
    
    if (!valider_champs_select(select)) {
        alert("Selectionner un symptomes");
        return false; 
    } 


    

}

document.addEventListener("DOMContentLoaded", function() {
    var date = document.getElementsByName("date")[0];
    var dateActuelle = new Date();
    var dateFormat = dateActuelle.toISOString().slice(0, 10);
    date.value = dateFormat;
});







