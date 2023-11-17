<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/formualire_modifier_consultation/formulaire_modifier_consultation.css">
    <title>Modifier Consultation</title>
</head>
<body>
    <form class="form" method="POST" action="../controller/updateconsultation.php">
        <p class="title">Modifier Consultation</p>
        <p class="message">Information Patient</p>
            <div class="flex">
                <label>
                    <span>Nom : </span>
                    <input class="input" type="text" name="nom" >
                    
                </label>
        
                <label>
                    <span>Prénom : </span>
                    <input class="input" type="text" name="prenom" >
                    
                </label>
            </div>  
                
            <div class="flex">
                <label>
                    <span>Age :</span>
                    <input class="input" type="text" name="age" >
                    
                </label> 
                    
               
            </div>
        </p>

        <p class="message">Information Consultation</p>
            
                
            <div class="flex">
                             
                <label>
                    <span>Que Voulez-vous Modifier</span>
                    <select id="symptomes" name="symptomes" class="input">
                        <option value="">Selectionner une chose</option>
                        <option value="description">description Consultation</option>
                        <option value="motif">Motif Consultation</option>
                        <option value="symptomes">symptomes</option>
                        <option value="prescription">Prescription Medical</option>
                        <option value="examen">Examen complementaires</option>
                        <option value="duree">duree</option>
                        
                    </select>
                </label> 

                <label id="text" style="visibility: hidden;">
                    <span class="text"></span>
                    <input class="input" type="text" name="age" >
                </label>

            </div>

            
        </p>
        <input class="submit" type="submit" onclick="validation_champs()" >

    </form>

    <script src="../assets/formualire_modifier_consultation/formulaire_modifier_consultation.js"></script>
</body>
</html>