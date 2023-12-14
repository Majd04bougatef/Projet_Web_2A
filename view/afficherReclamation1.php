<?php
include '../controller/reclamationC.php';

session_start();
$d = new reclamationC();

if(isset($_POST["aff"])){
if ($_POST["aff"] == "Tri") {
  $tab = $d->triReclamation();
} else if ($_POST["aff"] == "Search") {
  $tab = $d->rechercheReclamation($_POST["rech"]);
} }
else
  $tab = $d->afficher();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
   
    <title>Consultation</title>
    <style>
.table{
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 15px;
  width: 100%;
  overflow: hidden;
  border-radius: 5px 5px 0 0;
}
table thead tr{
  color: #fff;
  background: #1977cc;
  text-align: center;
  font-weight: bold;
}
.table th,
.table td{
  padding: 12px 15px;
}
.table tbody tr{
  border-bottom: 1px solid #ddd;
}
.table tbody tr:nth-of-type(odd){
  background: #f3f3f3;
}
.table tbody tr.active{
  font-weight: bold;
  color: #4689c3;
}
.table tbody tr:last-of-type{
  border-bottom: 2px solid #4689c3;
}
.table button{
  padding: 6px 20px;
  border-radius: 10px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #4689c3;
}
.table button:hover{
  background: #4689c3;
  color: #fff;
  transition: 0.5rem;
}

.attendance{
  margin-top:5%;
  width: 90%;
  margin-left: 20%;
  justify-items: center;
  justify-content: flex;
  margin-left: 15%;
  text-transform: capitalize;
}
.attendance-list{
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}

.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px; 
}

h1{
  align-items: center;
}

a{
  text-decoration: none;
} 
</style>

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

                    <li class="">
                        <a href="../view/afficherReclamation1.php">
                            <i class="bx bx-list-ul icon"></i>
                            <span class="text nav-text">Lister Réclamation</span>
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
                <div class="pic">
                    <?php
                    if (isset($_SESSION['user_id']))
                    {
                    ?>

                        <img src="../view/images/<?php echo $_SESSION['image'];?>" class="user-pic" onclick="toggleMenu()">
                    <?php
                    }
                    ?>
                </div>

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
        <section class="attendance">
        <h1>Liste Réclamations : </h1>
        <!--<div class="search-container">
            <form method="post" action="" onsubmit="searchEvents(); return false;">
                <input type="text" id="searchInput" class="search-input" placeholder="Rechercher par titre">
                <button type="submit" class="search-button">Rechercher</button>
            </form>
            <form method="post" action="" onsubmit="filterByDate(); return false;">
                <input type="date" id="startDate" name="startDate" placeholder="Date de début">
                <input type="date" id="endDate" name="endDate" placeholder="Date de fin">
                <button type="button" onclick="filterByDate()">Filtrer par date</button>
            </form>
        </div>-->
        <div class="attendance-list">
          <h1></h1><br>
<table class="table">
                        <thead>
                          <tr>
                            <th> Nom </th>
                            <th> Prenom </th>
                            <th> Etat </th>
                            <th> Sujet </th>
                            <th> Description </th>
                            <th> Date </th>
                            <th>    </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($tab as $rec) { ?>
                          <tr>
                            <td> <?= $rec['nom'] ?> </td>
                            <td> <?= $rec['prenom'] ?> </td>
                            <td> <?= $rec['etat'] ?> </td>
                            <td> <?= $rec['sujet_rec'] ?> </td>
                            <td> <?= $rec['desc_rec'] ?> </td>
                            <td> <?= $rec['date_rec'] ?> </td>
                            <td>
                                <a href="showReclamation1.php?id_r=<?php echo $rec['id_r']; ?>"><button class="btn btn-inverse-warning">Détails</button></a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      </div>
    </section>
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