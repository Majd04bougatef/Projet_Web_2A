
<?php

    include '../controller/consultationR.php';

    $consult = new consultationfunction();

    $list =  $consult->Dossier_Patient($_POST['id'],$_POST['medecin']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/dossier/dossier.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Dossier</title>
</head>
<body>

    <form class="form" method="POST" action="#">
        <h1 >Dossier Patient : </h1>
        
        <hr>

        <table>
            <tr class="header">
                
                <th>Date consult</th>
                <th>Description consultation</th>
                <th>Symptomes</th>
                <th>Prescription consultation</th>
                <th>Examen</th>
                
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
            

                </tr>
            <?php
                }
            ?>      
        
        </table>

    </form>

        
</body>
</html>