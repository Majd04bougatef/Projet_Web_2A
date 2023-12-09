<?php

include '../controller/consultationR.php';

session_start ();

$error = "";
$cons = new consultationfunction();


    
    $consult = new consultationfunction();

    $list =  $consult->listDossier($_POST['id'],$_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/formualire_modifier_consultation/formulaire_modifier_consultation.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../assets/dossier/dossier.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../assets/dossier/dossier.js"></script>
    <title>Dossier</title>
    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
   
    <title>Consultation</title>
</head>
<body>
    
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="../view/menu_consultation_medecin.php"><img class="imglogo" src="../image/logo/logo.png" alt="logo"></a>
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
                <li class="search-box">
                    
                        <i class="bx bx-search icon"></i>
                        <input type="search" placeholder="Search..">
                    
                </li>

                <ul class="menu-links">
                    <li class="">
                        <a href="../view/calendar.php" >
                            <i class='bx bx-clinic icon'></i>
                            <span class="text nav-text" >Calendar</span>
                        </a>
                    </li>

                   
                    <li class="">
                        <a href="../view/selectionner_dossier_medecin.php">
                            <i class="bx bxs-box icon"></i>
                            <span class="text nav-text">Consulter Dossier</span>
                        </a>
                    </li>

              
                    
                </ul>
            </div>

            

                <li class="">
                    <a href="logout.php">
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

                        <img src="images/<?php echo $_SESSION['image'];?>" class="user-pic" onclick="toggleMenu()">
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
                                <img src="images/<?php echo $_SESSION['image'];?>">
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
                            <img src="images/profile.png">
                            <p>Edit Profile</p>
                            <span> > </span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="images/setting.png">
                            <p>Settings and Privacy</p>
                            <span> > </span>
                        </a>

                        <a href="#" class="sub-menu-link">
                            <img src="images/help.png">
                            <p>Help & Support</p>
                            <span> > </span>
                        </a>

                        <a href="logout.php" class="sub-menu-link">
                            <img src="images/logout.png">
                            <p>Logout</p>
                            <span> > </span>
                        </a>


                    </div>
                </div>

            </nav>
        </div>
        <?php
    if (isset($_GET['id_c'])) {
        $consult = $cons->getConsult($_GET['id_c']);

    ?>
    <form class="form" method="POST" action="../controller/updateconsultation.php" onsubmit="return confirmUpdate(event)">
        <p class="title">Modifier Consultation</p>
        <p class="message">Information Consultation</p>
        <div class="flex">
            <label>
                <span>ID_Consultaion : </span>

                <input class="input" type="text" name="id_c" value="<?php echo $consult['id_c'] ; ?>">
            </label>
        </div>
        <div class="flex">
            <label>
                <span>Description Consultation :</span>
                <input class="input" type="text" name="description" value="<?php echo $consult['description_consultation'] ; ?>">
            </label>
        </div>
        <div class="flex">
            <label>
                <span>Symptomes :</span>
                <input class="input" type="text" name="symptomes" value="<?php echo $consult['symptomes'] ; ?>">
            </label>
        </div>
        <div class="flex">
            <label>
                <span>Prescription Consultation :</span>
                <input class="input" type="text" name="prescription" value="<?php echo $consult['prescription_consultation'] ; ?>">
            </label>
        </div>
        <div class="flex">
            <label>
                <span>Examen Consultation:</span>
                <input class="input" type="text" name="examen" value="<?php echo $consult['examen_consultation'] ; ?>">
            </label>
        </div>
        <input class="submit" type="submit" >
    </form>

    <?php
    }
    ?>
<script>
function confirmUpdate(event) {
    event.preventDefault();  

    Swal.fire({
        title: 'Modification Consultation?',
        text: 'Vous êtes sur le point de mettre à jour la consultation.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, mettre à jour!'
    }).then((result) => {
        if (result.isConfirmed) {
            submitForm();
        }
    });
}

function submitForm() {
    var form = document.querySelector('.form');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.onload = function () {
        console.log(xhr.responseText);
        window.location.href = '../view/dossier.php';
    };
    xhr.send(formData);
}
</script>

    <script src="../assets/consultation/menu_consultaion.js"></script>

</body>
</html>