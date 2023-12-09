
alert("zertzerzerzerzerzer");
console.log("eeeeeee");

document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector(".form");

    form.addEventListener("submit", function(event) {
        var nom = document.querySelector("[name='nom']").value;
        var prenom = document.querySelector("[name='prenom']").value;
        var age = document.querySelector("[name='age']").value;

        var Lettres = /^[A-Za-z ]+$/;

        var Chiffres = /^[0-9]+$/;

        if (!Lettres.test(nom)) {
            alert("Leeee nom est obligatoire et ne doit contenir que des lettres.");
            event.preventDefault(); 
            return;
        }

        if (!Lettres.test(prenom)) {
            alert("Leeeeeeeeeee prenom est obligatoire et ne doit contenir que des lettres.");
            event.preventDefault(); 
            return;
        }

        if (!Chiffres.test(age)) {
            alert("L'age ne doit contenir que des chiffres.");
            event.preventDefault(); 
            return;
        }
    });
});