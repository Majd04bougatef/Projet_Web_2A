
<?php

    include '../controller/consultationR.php';

    $consult = new consultationfunction();

    $list =  $consult->listDossier($_POST['nom'],$_POST['prenom'],$_POST['age']);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/dossier/dossier.css">
    <title>Document</title>
</head>
<body>

    <form class="form" method="POST" action="../controller/listerDossier.php">
        <h1>Dossier Patient : <?php echo $_POST['nom'].'    '.$_POST['prenom'].'   '.$_POST['age'].'  ans'; ?></h1>
        
        <hr>

        <table>
            <tr class="header">
                
                <th>Date consult</th>
                <th>Description consultation</th>
                <th>Symptomes</th>
                <th>Prescription consultation</th>
                <th>Examen</th>
                <th>Durée</th>
                <th>Modification</th>
                <th>Supprimer</th>
            </tr>

            <?php
                foreach ($list as $dossier){
            ?>
                <tr>
                    <td><?php echo $dossier['date_consultation'];?></td>
                    <td><?php echo $dossier['description_consultation'];?></td>
                    <td><?php echo $dossier['symptomes'];?></td>
                    <td><?php echo $dossier['prescription_consultation'];?></td>
                    <td><?php echo $dossier['examen_consultation'];?></td>
                    <td><?php echo $dossier['duree_consultation'];?></td>
                    <td><a href="formualire_modifier_consultation.php?id_c=<?php echo $dossier['id_c']; ?>">Modifier</a></td>
                    <td><a href="../controller/deleteconsultation.php?id_c=<?php echo $dossier['id_c']; ?>">Supprimer</a></td>

                </tr>
            <?php
                }
            ?>      
        
        </table>

    </form>
</body>
</html>