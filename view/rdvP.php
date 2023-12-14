<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="../source/page selectionner medecin patient/style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
   
    <title>Consultation</title>
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
                        <a href="selectionner_dossier.php">
                            <i class="bx bx-folder-open icon"></i>
                            <span class="text nav-text">Consulter Dossier</span>
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

        <?php
// Include the listermed.php file
include '../controller/rdvC.php';

$rendezvous = new rdvC();

    $list = $rendezvous->listermed($_SESSION['user_id']);


?>
        <form class="form" method="POST" action="../controller/afficher_liste_rdv.php">
    
    <p class="message"> </p>
        <div class="flex">
            <label>
                <input  type="text" class="input" name="id_user" value="<?php echo $_SESSION['user_id'];?>">
                <span>Votre id </span>
            </label>
        
        </div>
        <div class="flex">
            <label>
                <div class="selectdiv" >
                    <label for="ville">Sélectionnez medecin :
                        <select  name="medecin">
                            <?php
                                foreach ($list as $liste){
                                    
                            ?>
                                    <option value="<?php echo $liste['id_user'];?>"><?php echo $liste['nom'].'  '.$liste['prenom']?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </label>
                </div>
            </label>
        </div> 
        
            
    <input type="submit" class='submit' value='afficher'>
    
</form>
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



