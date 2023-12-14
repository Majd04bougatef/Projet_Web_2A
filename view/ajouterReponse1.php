
<?php
include_once '../controller/reponseC.php';
include_once '../controller/reclamationC.php';
include_once '../model/reponse.php';


date_default_timezone_set('Africa/Tunis');
$currentDateTime = date('Y-m-d');


    $error = "";
    // create user
    $reponse = null;
    $reclamationC = new reclamationC();
    // create an instance of the controller
    $reponseC = new reponseC();
    if (
        isset($_POST['reponse'])
    ){
        if (
            !empty($_POST["reponse"])
        ) {
            $reponse = new reponse(
                $_POST['reponse'],
                $currentDateTime ,
                $_GET["id_r"]
            );
			$reponseC->ajouter($reponse);
        }
        else
            $error = "Missing information";
    }  
	if(isset($_POST['ajout']))
	{
    	header ('Location:afficherReponse1.php');
	}

    $reclamation=$reclamationC->recupererReclamation($_GET["id_r"]);

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

        .search {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
        <input type="text" class="form-control" placeholder="Search products">
    </form>

    <form method="POST" onsubmit="return verif();">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Reponse</label>
            <div class="col-sm-9">
                <textarea name="reponse" class="form-control" id="reponse" placeholder="Reponse"></textarea>
            </div>
        </div>
        <br>
        <div align="center">
            <input type="submit" name="ajout" value="Repondre" class="btn btn-primary me-2">
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>