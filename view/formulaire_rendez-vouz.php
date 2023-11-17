
<?php
    include_once("../controller/addconsultation.php");
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https:://cdnjs.cloudflare.com/ajax/libs/font-awsome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/formulaire_rendez-vous/formulaire_rendez-vous.css">
    <script src="../assets/formulaire_rendez-vous/formulaire_rendez-vous.js"></script>
    <title>Document</title>
</head>
<body>


    <?php
        if (isset($_POST['idrdv'])) {
            $rdv = $consultR->showPatient($_POST['idrdv']);

    ?>  

    <form class="form" method="POST" action="../controller/addconsultation.php">
        <p class="title">Register Consultation</p>
        <p class="message">Information Patient</p>
            <div class="flex">
                <label>
                    <span>Nom : </span>
                    <input  type="hidden" name="idrdv" value="<?php echo $_POST['idrdv'] ?>">
                    <input class="input" type="text" name="nom" value="<?php echo $rdv['nom']; ?>">
                    
                </label>
        
                <label>
                    <span>Prénom : </span>
                    <input class="input" type="text" name="prenom" value="<?php echo $rdv['prenom']; ?>">
                    
                </label>
            </div>  
                
            <div class="flex">
                <label>
                    <span>Age :</span>
                    <input class="input" type="text" name="age" value="<?php echo $rdv['age']; ?>">
                    
                </label> 
                    
               
            </div>
        </p>

        <p class="message">Information Consultation</p>
            <div class="flex">
                <label>
                    <span>Date Consultation</span>
                    <input class="input" type="date" name="date" >
                </label>
                
                <label>
                    <span>Description Consultation</span>
                    <textarea class="input" type="text" name="description" ></textarea>
                </label>

                
   
            </div>  
                
            <div class="flex">
                <label>
                    <span>Motif Consultation</span>
                    <input class="input" type="text" name="motif" >
                </label> 
                  
                <label>
                    <span>Symptomes</span>
                    <select id="symptomes" name="symptomes" class="input">
                        <option value="">Sélectionnez un symptôme</option>
                        <option value="fievre">Fièvre persistante</option>
                        <option value="douleur">Douleur abdominale sévère</option>
                        <option value="essoufflement">Essoufflement inexpliqué</option>
                        <option value="douleur_thoracique">Douleur thoracique</option>
                        <option value="maux_de_tete">Maux de tête graves et persistants</option>
                        <option value="vertiges">Vertiges récurrents</option>
                        <option value="saignements">Saignements anormaux ou saignements inhabituels</option>
                        <option value="perte_de_poids">Perte de poids inexpliquée</option>
                        <option value="symptômes_neurologiques">Symptômes neurologiques</option>
                        <option value="changements_vision">Changements de la vision</option>
                        <option value="problemes_peau">Problèmes de peau graves</option>
                        <option value="douleur_articulaire">Douleur articulaire ou musculaire sévère</option>
                        <option value="toux_persistante">Toux persistante</option>
                        <option value="saignements_expectorants">Saignements expectorants</option>
                        <option value="urineusanglante">Urine sanglante</option>
                        <option value="problemes_gastro">Problèmes gastro-intestinaux graves</option>
                        <option value="reaction_allergique">Réaction allergique grave</option>
                        <option value="symptomes_cardiaques">Symptômes cardiaques</option>
                        <option value="symptomes_psychiatriques">Symptômes psychiatriques graves</option>
                        <option value="fievre_nourrissons">Fièvre chez les nourrissons de moins de 3 mois</option>
                        <option value="Autres_symptomes">Autres symptômes graves, inhabituels ou inquiétants</option>
                    </select>
                </label> 
            </div>

            <div class="flex">
                <label>
                    <span>Prescription Consultation</span>
                    <input class="input" type="text" name="prescription" >
                </label> 
                  
                <label>
                    <span>Examen_complementaires</span>
                    <input class="input" type="text" name="examen" >
                </label> 
            </div>

            <div class="flex">
                <label>
                    <span>durée Consultation</span>
                    <input class="input" type="number" name="duree" >
                </label> 
                  
    
            </div>

        </p>
        <input class="submit" type="submit" onclick="validation_champs()" >

    </form>
    <?php
    }
    ?>
    
</body>
</html>