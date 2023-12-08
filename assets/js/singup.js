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
    var cin = document.getElementsByName("cin")[0].value;
    var age = document.getElementsByName("age")[0].value;
    var telephone = document.getElementsByName("telephone")[0].value;
    var nationalite = document.getElementsByName("nationalite")[0].value;
    var diplome = document.getElementsByName("diplome")[0].value;
    var pays = document.getElementsByName("pays")[0].value;
    var ville = document.getElementsByName("ville")[0].value;


    if (!valider_champs_lettres(nom)) {
        alert("Nom incorrect");
        return false;
    }

    if (!valider_champs_lettres(prenom)) {
        alert("Prénom incorrect");
        return false;
    }

    if (!valider_champs_vide(cin)) {
        alert("Manque de description");
        return false;
    }

    if (!valider_champs_vide(age)) {
        alert("Manque de Motif");
        return false;
    }

    if (!valider_champs_vide(telephone)) {
        alert("Manque de Symptomes");
        return false;
    }

    if (!valider_champs_vide(nationalite)) {
        alert("Manque de Examen");
        return false;
    }
    if (!valider_champs_vide(diplome)) {
        alert("Manque de Examen");
        return false;
    }

   
    if (!valider_champs_vide(pays)) {
        alert("Manque de Examen");
        return false;
    }


    if (!valider_champs_vide(ville)) {
        alert("Manque de Examen");
        return false;
    }

    return true;


}

