

<?php

include_once '../controller/userC.php';
$userC= new userC();
$user=null;
    session_start();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/list.css">
    <link rel="stylesheet" href="../assets/update user/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Display</title>
</head>

<body>

<?php
    
    if (isset($_SESSION['user_id'])) {
       
        $user = $userC->showuser($_SESSION['user_id']);
        
        
    ?>

        
    <form method="POST" action="../controller/update_admin.php" > 
    <div class="container light-style flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-4">
                Parametres compte
            </h4>
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-toggle="list"   href="#account-general">General</a>
                            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Changer mot de passe</a>
                        </div>
                    </div>

                    
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">
                                <div class="card-body media align-items-center">
                                    <img src="<?php echo '../view/images/'.$_SESSION['image'];?>" alt class="d-block ui-w-80">
                                   
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">CIN</label>
                                        <input name="id" type="hidden" value="<?php echo  $user['id_user'];?>">
                                        <input class="form-control mb-1" type="text" name="cin" id="cin" value="<?php echo $_SESSION['cin']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nom</label>
                                        <input class="form-control" type="text" name="nom" id="nom" value="<?php echo $_SESSION['nom']; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Prénom</label>
                                        <input class="form-control" type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['prenom']; ?>" maxlength="20">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input name="mail" id="mail" type="text" class="form-control mb-1" value="<?php echo $_SESSION['mail']; ?>">
                                        <div class="alert alert-warning mt-3">
                                            Your email is not confirmed. Please check your inbox.<br>
                                            <a href="javascript:void(0)">Resend confirmation</a>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Téléphone</label>
                                        <input class="form-control" type="text" name="tel" id="tel" value="<?php echo $_SESSION['telephone']; ?>" maxlength="20">
                                    </div>
                                
                                </div>
                            </div>

                            <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">mot de passe actuel</label>
                                    <input type="password" class="form-control" name="current_password" id="current_password" >
                                </div>
                                <div class="form-group">
                                    <label class="form-label">nouveau mot de passe</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password" >
                                </div>
                                <div class="form-group">
                                    <label class="form-label">confirmer nopuveau mot de passe</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" >
                                </div>
                                


                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary">Modifier</button>&nbsp;
            <button type="button" class="btn btn-default">Vider</button>
        </div>
        </div>

        </form>
    <?php
    }
    ?>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"> </script>

    
</body>

</html>
