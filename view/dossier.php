
<?php

    include '../controller/consultationR.php';

    session_start ();
    $consult = new consultationfunction();

    $list =  $consult->listDossier($_POST['id'],$_SESSION['user_id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                            <i class="bx bx-folder-open icon"></i>
                            <span class="text nav-text">Consulter Dossier</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/add.php">
                            <i class="bx bxs-comment-add icon"></i>
                            <span class="text nav-text">Ajouter event</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/calendrier.php">
                            <i class="bx bx-calendar-event icon"></i>
                            <span class="text nav-text">Calendrier event </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/listevents.php">
                            <i class="bx bx-list-ul icon"></i>
                            <span class="text nav-text">liste event </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../view/rdvM.php">
                            <i class="bx bxs-cabinet icon"></i>
                            <span class="text nav-text">Consulter RDV </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/add_blog_med.php">
                            <i class="bx bxs-comment-add icon"></i>
                            <span class="text nav-text">Ajouter Blog</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/listeblog_med.php">
                            <i class="bx bxl-blogger icon"></i>
                            <span class="text nav-text">Lister Blog</span>
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
        <form class="form" method="POST" action="">
       
        
        <hr>

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
                <th>Ordonnance</th>
                <th>Modification</th>
                <th>Supprimer</th>
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
                    <td>
                    <?php
                        if (empty($dossier['fichier_pdf'])) {
                            echo '<button><a href="../ordonnance/ordonnance_'.$dossier['nom'].'_'.$dossier['prenom'].'_'.$dossier['date_consultation'].'.pdf' . '" target="_blank">Voir PDF</a></button>';
                        } else {
                            echo 'Aucun fichier PDF disponible';
                        }
                    ?>
                </td>
                <td><button><a href="../view/formualire_modifier_consultation.php?id_c=<?php echo $dossier['id_c']; ?>&id=<?php echo $_POST['id']; ?>">Modifier</a></button></td>
                <td><button><a href="#" onclick="confirmDelete(<?php echo $dossier['id_c']; ?>)">Supprimer</a></button></td>

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