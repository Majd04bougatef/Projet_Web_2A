<?php
include_once '../controller/reclamationC.php';
include_once '../model/reclamation.php';
session_start();

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

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https:://cdnjs.cloudflare.com/ajax/libs/font-awsome/6.2.0/css/all.min.css">
    
    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    

    <title>Consultation</title>
    <style>
        
        form {
            margin-top: 10%;
      
        }
        .modal{
            margin-top: 3%;
            margin-left: 30%;
        }

      
        .container {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .modal {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 500px;
            background-color: #fff;
            box-shadow: 0 15px 30px 0 rgba(0, 125, 171, 0.15);
            border-radius: 10px;
        }

        .modal__header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal__body {
            padding: 1rem 1rem;
        }

        .modal__footer {
            padding: 0 1.5rem 1.5rem;
        }

        .modal__title {
            font-weight: 700;
            font-size: 1.25rem;
        }

        .button {
            display: inline-flex;
            align-items: centers;
            justify-content: center;
            transition: 0.15s ease;
        }

        .button--icon {
            width: 2.5rem;
            height: 2.5rem;
            background-color: transparent;
            border-radius: 0.25rem;
        }

        .button--icon:focus,
        .button--icon:hover {
            background-color: #ededed;
        }

        .button--primary {
            background-color: #007dab;
            color: #FFF;
            padding: 0.75rem 1.25rem;
            border-radius: 0.25rem;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .button--primary:hover {
            background-color: #006489;
        }

        .input {
            display: flex;
            flex-direction: column;
            margin-bottom: 1.5rem;
        }

        .input__label {
            font-weight: 700;
            font-size: 0.875rem;
        }

        .input__field {
            display: block;
            margin-top: 0.5rem;
            border: 1px solid #DDD;
            border-radius: 0.25rem;
            padding: 0.75rem 0.75rem;
            transition: 0.15s ease;
        }

        .input__field:focus {
            outline: none;
            border-color: #007dab;
            box-shadow: 0 0 0 1px #007dab, 0 0 0 4px rgba(0, 125, 171, 0.3);
        }

        .input__error {
            margin-top: 0.25rem;
            font-size: 0.75rem;
            color: #ff1a1a;
        }
    </style>
</head>
<body>

<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="../view/menu_consultation_patient.php"><img class="imglogo" src="../image/logo/logo.png" alt="logo"></a>
                </span>

                <div class="text header-text">
                    <span class="name">Med<span class="tun">TUN</span></span><br>
                    <span class="profession">Best For Medical</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                

                <ul class="menu-links">

                    <li class="">
                        <a href="../view/rendez-vous.php">
                            <i class="bx bxs-calendar icon"></i>
                            <span class="text nav-text">Prendre RDV</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../view/rdvP.php">
                            <i class="bx bxs-cabinet icon"></i>
                            <span class="text nav-text">Consulter RDV</span>
                        </a>
                    </li>
                                 
                    <li class="">
                        <a href="../view/selectionner_dossier.php">
                            <i class="bx bx-folder-open icon"></i>
                            <span class="text nav-text">Consulter Dossier</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../view/choix_pat_reclamation.php">
                            <i class="bx bxs-calendar-exclamation icon"></i>
                            <span class="text nav-text">Réclamation</span>
                        </a>
                    </li>


                    
                </ul>
            </div>

            <div class="bottom-content">
                
                <li class="">
                        <a href="../view/logout.php">
                            <i class="bx bx-log-out icon"></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                <li class="mode">
                    <div class="moon-sun">
                        <i class="bx bx-moon icon moon"></i>
                        <i class="bx bx-sun icon sun"></i>
                    </div>

                    <span class="mod-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav> 
    <div class="home" id="content">
        <div class="links-menu">
            <nav class="profile">
                    <?php
                    if (isset($_SESSION['user_id']))
                    {
                    ?>

                        <img src="../view/images/<?php echo $_SESSION['image'];?>" class="user-pic" onclick="toggleMenu()">
                    <?php
                    }
                    ?>
                

                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                        <?php
                                if (isset($_SESSION['user_id']))
                                {
                                ?>
                                <h1>
                                <img src="../view/images/<?php echo $_SESSION['image'];?>">
                                    <?php echo $_SESSION['nom'];?>
                                </h1>
                                <?php
                                }
                                else{
                                    ?>
                                    <li><a href="#"></a><li>

                                    <?php
                                }
                            ?>
                            
                            
                        </div>
                        <hr>

                        <a href="../view/updateuser.php" class="sub-menu-link">
                            <img src="../view/images/profile.png">
                            <p>Edit Profile</p>
                            <span> > </span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="../view/images/setting.png">
                            <p>Settings and Privacy</p>
                            <span> > </span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="../view/images/help.png">
                            <p>Help & Support</p>
                            <span> > </span>
                        </a>

                        <a href="../view/logout.php" class="sub-menu-link">
                            <img src="../view/images/logout.png">
                            <p>Logout</p>
                            <span> > </span>
                        </a>


                    </div>
                </div>

            </nav>
        </div>
        <div class="modal">
            <div class="modal__header">
                <h2 class="modal__title">Réclamation</h2>
            </div>
            <div class="modal__body">
               
                <form method="POST"  method="POST" onsubmit="return verif();">
               
                    
                <div class="input">
                    <label class="input__label" for="eventName">Nom</label>
                    <input value="<?php echo $_SESSION['nom']; ?>" type="text" name="nom" class="input__field" id="nom" placeholder="Nom">
                </div>

                    <label class="input__label" for="eventDescription">Prénom</label>
                        <input value="<?php echo $_SESSION['prenom']; ?>" type="text" name="prenom" class="input__field" id="prenom" placeholder="Prenom">
                    </div>
                    <div class="input">
                        <label class="input__label" for="eventLocation">Sujet</label>
                        <input type="text" name="sujet_rec" class="input__field" id="sujet_rec" placeholder="Sujet">
                    </div>
                    <div class="input">
                        <label class="input__label" for="eventDate">Description</label>
                        <textarea name="desc_rec" class="input__field" id="desc_rec" placeholder="Description"></textarea>                    </div>
                    <div class="modal__footer">
                        <button class="button button--primary" type="submit" style="margin-left: 30%;">Ajouter reclamation</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
                function updateMedecinList() {
                    var selectedSpecialite = document.getElementById('specialiteSelect').value;

                    $.ajax({
                    type: 'POST',
                    url: '../controller/listerMedAdmin.php',
                    data: { specialité: selectedSpecialite },
                    success: function(response) {
                        $('#medecinListContainer').html(response);
                    },
                    error: function() {
                        alert('Erreur lors de la mise à jour de la liste déroulante');
                    }
                    });
                }

                document.getElementById('specialiteSelect').addEventListener('change', function() {
                    updateMedecinList();
                });

                </script>

    </div>


    <script>
    let subMenu = document.getElementById("subMenu");
    
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>
    <script src="../assets/consultation/menu_consultaion.js"></script>

</body>
</html>





