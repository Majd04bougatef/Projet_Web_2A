function valider_champs_lettres(chaine) {
    if (/^[A-Za-z ]+$/.test(chaine)) {
        return true;
    } else {
        return false;
    }
}

function valider_champs_nombre(num) {
    if (/^[0-9]+$/.test(num) && num < 150 && num > 0) {
        return true;
    } else {
        return false;
    }
}

function valider_champs_vide(chaine) {
    if (chaine !== "") {
        return true;
    } else {
        return false;
    }
}

function validation_champs() {
    var nom = document.getElementsByName("nom")[0].value;
    var prenom = document.getElementsByName("prenom")[0].value;
    var desc = document.getElementsByName("description")[0].value;
    var motif = document.getElementsByName("motif")[0].value;
    var symp = document.getElementsByName("symptomes")[0].value;
    var examen = document.getElementsByName("examen")[0].value;

    if (!valider_champs_lettres(nom)) {
        alert("Nom incorrect");
        return false;
    }

    if (!valider_champs_lettres(prenom)) {
        alert("Prénom incorrect");
        return false;
    }

    if (!valider_champs_vide(desc)) {
        alert("Manque de description");
        return false;
    }

    if (!valider_champs_vide(motif)) {
        alert("Manque de Motif");
        return false;
    }

    if (!valider_champs_vide(symp)) {
        alert("Manque de Symptomes");
        return false;
    }

    if (!valider_champs_vide(examen)) {
        alert("Manque de Examen");
        return false;
    }

    return true;
}

document.addEventListener("DOMContentLoaded", function () {
    var date = document.getElementsByName("date")[0];
    var dateActuelle = new Date();
    var dateFormat = dateActuelle.toISOString().slice(0, 10);
    date.value = dateFormat;
});