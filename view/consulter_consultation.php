<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/consulter consultation/consulter_Consultation.css"> 
    <title>Consulter Dossier</title>
</head>
<body>
    <form class="form" method="POST" action="dossier.php">
        <p class="title">Consulter Dossier</p>
        <p class="message">Information du Patient</p>
            <div class="flex">
                <label>
                    <span>Nom : *</span>
                    <input class="input" type="text" name="nom" >
                    
                </label>
        
                <label>
                    <span>Prénom : *</span>
                    <input class="input" type="text" name="prenom" >
                    
                </label>
            </div>  
                
            <div class="flex">
                <label>
                    <span>Age : </span>
                    <input class="input" type="text" name="age" >
                    
                </label>
                
                <label>
                    <span>date consultation:</span>
                    <input class="input" type="date" name="date" >
                    
                </label> 
                    
               
            </div>
        </p>

        
        <input class="submit" type="submit" value="Consulter">

    </form>

    <script>

 

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
    </script>

</body>
</html>