<?php
include_once '../controller/reclamationC.php';
include_once '../model/reclamation.php';


    $error = "";
    // create user
    $reclamation = null;
    // create an instance of the controller
    $reclamationC = new reclamationC();
    if (
        isset($_POST['nom']) &&
        isset($_POST['prenom']) &&
        isset($_POST['etat']) &&
        isset($_POST['sujet_rec']) &&
        isset($_POST['desc_rec']) &&
        isset($_POST['date_rec'])
    ){
        if (
            !empty($_POST["nom"]) &&
            !empty($_POST["prenom"]) &&
            !empty($_POST["etat"]) &&
            !empty($_POST["sujet_rec"]) &&
            !empty($_POST["desc_rec"]) &&
            !empty($_POST["date_rec"])
        ) {
            $reclamation = new reclamation(
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['etat'],
                $_POST['sujet_rec'],
                $_POST['desc_rec'] ,
                $_POST['date_rec'] 
            );
			$reclamationC->modifier($reclamation,$_GET['id_r']);
        }
        else
            $error = "Missing information";
    }  
	if(isset($_POST['modifier']))
	{
    	header ('Location:afficherReclamation1.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        textarea {
            resize: vertical; /* Allow vertical resize only */
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php 
    if (isset($_GET['id_r'])){
        $rec = $reclamationC->recupererReclamation($_GET['id_r']);
    ?>
    <form method="POST" onsubmit="return verif();">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nom</label>
            <div class="col-sm-9">
                <input type="text" name="nom" value="<?php echo $rec['nom']?>" class="form-control" id="nom" placeholder="Nom">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Prenom</label>
            <div class="col-sm-9">
                <input type="text" name="prenom" value="<?php echo $rec['prenom']?>" class="form-control" id="prenom" placeholder="Prenom">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Etat</label>
            <div class="col-sm-9">
                <input type="text" name="etat" value="<?php echo $rec['etat']?>" class="form-control" id="etat" placeholder="Etat">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Sujet</label>
            <div class="col-sm-9">
                <input type="text" name="sujet_rec" value="<?php echo $rec['sujet_rec']?>" class="form-control" id="sujet_rec" placeholder="Sujet">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Description</label>
            <div class="col-sm-9">
                <textarea type="text" name="desc_rec" class="form-control" id="desc_rec" placeholder="Description"><?php echo $rec['desc_rec']?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Date</label>
            <div class="col-sm-9">
                <input type="text" name="date_rec" value="<?php echo $rec['date_rec']?>" class="form-control" id="date_rec" placeholder="Date">
            </div>
        </div>
        <br>
        <div align="center">
            <input type="submit" name="modifier" value="Modifier" class="btn btn-primary me-2">
        </div>
    </form>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>