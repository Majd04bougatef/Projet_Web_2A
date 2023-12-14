
<?php

    include '../controller/rdvC.php';
session_start();
    $rdv= new rdvC();

    $r = $rdv->listrdv_pat_admin($_POST['medecin']);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">  
  <link rel="stylesheet" type="text/css" href="../source/page lister medecin/stylecss.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
 
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  
  <link rel="stylesheet" href="https://fonts.gastatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</head>



<body>
    
<nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="../view/menu_consultation_admin.php"><img class="imglogo" src="../image/logo/logo.png" alt="logo"></a>
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
                        <a href="../view/calendar_admin.php" >
                            <i class='bx bx-clinic icon'></i>
                            <span class="text nav-text" >Calendar des Médecins </span>
                        </a>
                    </li>

                   
                    <li class="">
                        <a href="../view/selectionner_dossier_admin.php">
                            <i class="bx bx-folder-open icon"></i>
                            <span class="text nav-text">Consulter Dossier Patient</span>
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
                        <a href="../view/rdvA.php">
                            <i class="bx bxs-cabinet icon"></i>
                            <span class="text nav-text">Consulter RDV</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../view/category.php">
                            <i class="bx bxs-comment-add icon"></i>
                            <span class="text nav-text">Ajouter categorie</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../controller/add_blog.php">
                            <i class="bx bxl-blogger icon"></i>
                            <span class="text nav-text">Ajouter Blog</span>
                        </a>
                    </li>
                    

                    <li class="">
                        <a href="../controller/listeblog.php">
                            <i class="bx bx-list-ul icon"></i>
                            <span class="text nav-text">Lister Blog</span>
                        </a>
                    </li>
                    
                    
                </ul>
            </div>

            

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

                        <a href="logout.php" class="sub-menu-link">
                            <img src="../view/images/logout.png">
                            <p>Logout</p>
                            <span> > </span>
                        </a>


                    </div>
                </div>

            </nav>
        </div>
        <section class="attendance">
        <div class="attendance-list">
          <h1>Les rendez vous disponible</h1><br>
        <table class="table">
            <thead>
              <tr>
              <th>Id_Patient</th>
                <th>Nom Patient</th>
                <th>Prenom Patient</th>
                <th>Date RDV</th>
                <th>debut rdv</th>
                <th>fin rdv</th>
                <th>categorie rdv</th>
                <th>Modifier</th>
                <th>Supprimer</th>
              </tr>
            </thead>
            <tbody>

            <?php
                foreach ($r as $med){
            ?>

                <tr>
                    <td><?php echo $med['id_user'];?></td>
                    <td><?php echo $med['nom'];?></td>
                    <td><?php echo $med['prenom'];?></td>
                    
                    <td><?php echo $med['date_rdv'];?></td>
                    <td><?php echo $med['deb_rdv'];?></td>
                    <td><?php echo $med['fin_rdv'];?></td>
                    <td><?php echo $med['categorie'];?></td>
                    <td><input type="hidden" name="id_rdv"  value="<?php echo $med['id_rdv'];?>"><button><a href="../view/update2.php?id_rdv=<?php echo $med['id_rdv'];?>">Modifier rdv</a></button></td>
                    <td><a href="#" onclick="confirmDelete(<?php echo $med['id_rdv']; ?>)"><button>Supprimer</button></a></td>
                </tr>
            <?php
                }
            ?>   

            </tbody>
          </table>
        </div>
    </section>
    

    <script>


function confirmDelete(id_rdv) {
                Swal.fire({
                    title: 'Voulez-vous vraiment supprimer ce rdv?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer!',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "../view/delete.php",
                            data: { id_rdv: id_rdv },
                            dataType: 'json', 
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Suppression réussie!',
                                        text: 'Les données ont été supprimées avec succès.'
                                    });
                                    location.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erreur',
                                        text: response.message
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error("Erreur lors de l'envoi de la requête AJAX", error);
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            }

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
