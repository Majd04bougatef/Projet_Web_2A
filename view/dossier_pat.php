
<?php

session_start ();
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
                        <a href="../view/selectionner_dossier.php">
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
        <form class="form" method="POST" action="#">
        
        
        

        <section class="attendance">
        <div class="attendance-list">
          <h1>Dossier Patient</h1><br>
        <table class="table">
            <thead>
              <tr>
                <th>Date consult</th>
                <th>Description consultation</th>
                <th>Symptomes</th>
                <th>Prescription consultation</th>
                <th>Examen</th>
              </tr>
            </thead>
            <tbody>
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

            </tbody>
          </table>
          </div>
      </section>
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