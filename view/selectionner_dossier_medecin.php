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
                    <span>ID Patient : *</span>
                    <input class="input" type="text" name="id" >
                    
                </label>
            </div>  
                
            
        </p>

        
        <input class="submit" type="submit" value="Consulter" onclick="return valider_champs()">

    </form>
    <script>
    function valider_champs() {
    var id = document.getElementsByName("id")[0].value;

    if (id === "") {
        alert("Donner une ID");
        event.preventDefault();
        return false;
    }

    if (id.length !== 10) {
        alert("L'ID doit avoir une longueur de 10 caractères");
        event.preventDefault();
        return false;
    }

    return true;
}
</script>

</body>
</html>