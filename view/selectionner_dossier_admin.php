<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/consulter consultation/consulter_Consultation.css"> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Consulter Dossier</title>
    
    <title>Consultation</title>
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
                            <i class="bx bxs-box icon"></i>
                            <span class="text nav-text">Consulter Dossier PAtient</span>
                        </a>
                    </li>

                    
                </ul>
            </div>

            

                <li class="">
                    <a href="../view/acceuil.php">
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
        <form class="form" method="POST" action="../view/dossier_patient.php" id="consultForm" onsubmit="return valider_champs()">
        <p class="title">Consulter Dossier</p>
        <p class="message">Information du Patient</p>

        <div class="flex">
            <label>
                <span>ID Patient : *</span>
                <input class="input" type="text" name="id" oninput="valider_champs()">
            </label>

            <label>
                <span>Medecin : *</span>
                <br>
                <select name="medecin" id="medecinSelect" style="height:63px;width:60%;">
                    <option>Selectionner un medecin</option>
                    <?php
                        foreach ($list as $med){
                    ?>
                        <option value="<?php echo $med['id_med']; ?>"><?php echo $med['nom'].'  '.$med['prenom']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </label>
        </div>
        <input class="submit" type="submit" value="Consulter" onclick="submitForm('../view/dossier_patient.php')" >

    </form>

    <script>
        function valider_champs() {
            var id = document.getElementsByName("id")[0].value;

            if (id.length === 10) {
                $.ajax({
                    type: 'POST',
                    url: '../controller/listermedecin.php',
                    data: { id: id },
                    success: function(response) {
                        console.log('Réponse du serveur :', response);
                        $('#medecinSelect').html(response);
                    },
                    error: function() {
                        alert('Erreur lors de la mise à jour de la liste déroulante');
                    }
                });
            }
        }

        function submitForm(action) {
            document.getElementById("consultForm").action = action;
            document.getElementById("consultForm").submit();
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