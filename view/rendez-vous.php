<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="../source/menu_consultation.css">
    <link rel="stylesheet" type="text/css" href="../source/page rendez vous/style.css">
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
        <form class="form" action="../View/rdv2.php" method="POST" id="registrationForm">
    <p class="title">Find a doctor </p>
    <p class="message">CHOSE THE PLACE TO DISPLAY DOCTORS</p>
    
    <div class="selectdiv" >
        <label for="pays">Sélectionner une pays
            <select name="pays" id="pays" onchange="chargerVilles()">
                <option value="0">select </option>
                <option value="tunis">Tunisie</option>
                <option value="algerie">algerie</option>
                <option value="france">France</option>
            </select>
        </label>
    </div>

    <br>
    <div class="selectdiv" >
        <label for="ville">Sélectionnez une ville :
            <select id="ville" onchange="chargerGouvernements()" name="ville">
                <!-- Les options seront chargées dynamiquement en JavaScript -->
            </select>
        </label>
    </div>

    <div class="selectdiv" >
        <label for="specialites-medicales">Sélectionnez une  specialites-medicales :
            <select id="specialites-medicales" class="select-box" name="select-box">
                <option value="generaliste">Généraliste</option>
                <option value="cardiologie">Cardiologie</option>
                <option value="dermatologie">Dermatologie</option>
                <option value="gastro-entérologie">Gastro-entérologie</option>
                <option value="gynécologie-obstétrique">Gynécologie-obstétrique</option>
                <option value="néphrologie">Néphrologie</option>
                <option value="neurologie">Neurologie</option>
                <option value="ophtalmologie">Ophtalmologie</option>
                <option value="orthopédie">Orthopédie</option>
                <option value="pédiatrie">Pédiatrie</option>
                <option value="psychiatrie">Psychiatrie</option>
                <option value="radiologie">Radiologie</option>
            </select>
        </label>
    </div>
    
    <button type="submit" class="submit" onclick="submitForm();">Submit</button>
    </form>
    
    <script>

function chargerVilles() {
    var paysSelect = document.getElementById("pays");
    var villeSelect = document.getElementById("ville");

    // Efface les options actuelles
    villeSelect.innerHTML = "";

    // Ajoute les nouvelles options en fonction du pays sélectionné
    if (paysSelect.value === "tunis") {
       
        ajouterOption(villeSelect, "bizerte", "Bizerte");
        ajouterOption(villeSelect, "jandouba", "Jandouba");
        ajouterOption(villeSelect, "zaghouene", "Zaghouene");
        ajouterOption(villeSelect, "tunisie", "Tunis");
        ajouterOption(villeSelect, "ariana", "Ariana");
        ajouterOption(villeSelect, "manouba", "Manouba");
        ajouterOption(villeSelect, "ben arous", "Ben arous");
        ajouterOption(villeSelect, "nabeul", "Nabeul");
        ajouterOption(villeSelect, "sousse", "Sousse");
        ajouterOption(villeSelect, "kairawen", "Kairawen");
        ajouterOption(villeSelect, "sfax", "Sfax");
        ajouterOption(villeSelect, "gafsa", "Gafsa");
        ajouterOption(villeSelect, "gassrine", "Gassrine");
        ajouterOption(villeSelect, "sidi-bouzid", "Sidi Bouzid");
        ajouterOption(villeSelect, "tataouine", "Tataouine");
        ajouterOption(villeSelect, "mednine", "Medenine");
        ajouterOption(villeSelect, "monastir", "Monastir");
        ajouterOption(villeSelect, "mahdia", "Mahdia");
        ajouterOption(villeSelect, "kef", "Le kef");
        ajouterOption(villeSelect, "kbeli", "Kbeli");
        ajouterOption(villeSelect, "tozeur", "Tozeur");
        ajouterOption(villeSelect, "gabes", "Gabes");
        ajouterOption(villeSelect, "beja", "Beja");
        ajouterOption(villeSelect, "seliana", "Seliana");
        
        
    } else if (paysSelect.value === "france") {
        ajouterOption(villeSelect, "paris", "Paris");
        ajouterOption(villeSelect, "marseille", "Marseille");
        ajouterOption(villeSelect, "lyon", "Lyon");
        
    }
    
}



function ajouterOption(selectElement, value, text) {
    var option = document.createElement("option");
    option.value = value;
    option.text = text;
    selectElement.add(option);
}

// Charge initialement les villes au chargement de la page
chargerVilles();

function submitForm() {
            // Get selected values
            const pays = document.getElementById("pays").value;
            const ville = document.getElementById("ville").value;
            const specialite = document.getElementById("specialites-medicales").value;

            // Redirect to result.html with query parameters
            window.location.href = `rdv2.php?pays=${pays}&ville=${ville}&specialite=${specialite}`;
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