
<?php
include_once '../controller/reclamationC.php';
include_once '../model/reclamation.php';


date_default_timezone_set('Africa/Tunis');
$currentDateTime = date('Y-m-d');

    $error = "";
    // create user
    $reclamation = null;
    // create an instance of the controller
    $reclamationC = new reclamationC();
    if (
        isset($_POST['nom']) &&
        isset($_POST['prenom']) &&
        isset($_POST['sujet_rec']) &&
        isset($_POST['desc_rec'])
    ){
        if (
            !empty($_POST["nom"]) &&
            !empty($_POST["prenom"]) &&
            !empty($_POST["sujet_rec"]) &&
            !empty($_POST["desc_rec"])
        ) {
            $reclamation = new reclamation(
                $_POST['nom'],
                $_POST['prenom'],
                "En Attente",
                $_POST['sujet_rec'] ,
                $_POST['desc_rec'] ,
                $currentDateTime
            );
			$reclamationC->ajouter($reclamation);
        }
        else
            $error = "Missing information";
   }
 
	if(isset($_POST['ajout']))
	{
    	header ('Location:afficherReclamation1.php');
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reclamation Form</title>
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
            margin-bottom: 20px;
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
    <form method="POST" onsubmit="return verif();">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nom</label>
            <div class="col-sm-9">
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Prenom</label>
            <div class="col-sm-9">
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prenom">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Sujet</label>
            <div class="col-sm-9">
                <input type="text" name="sujet_rec" class="form-control" id="sujet_rec" placeholder="Sujet">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Contenu</label>
            <div class="col-sm-9">
                <textarea name="desc_rec" class="form-control" id="desc_rec" placeholder="Description"></textarea>
            </div>
        </div>
        <br>
        <div align="center">
            <input type="submit" name="ajout" value="Ajouter" class="btn btn-primary me-2">
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>