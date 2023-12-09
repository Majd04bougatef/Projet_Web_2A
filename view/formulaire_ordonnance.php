<?php
    include_once("../controller/ordonnanceR.php");

    session_start();
    $ordR = new ordonnancefunction();
    $ordR2 = new ordonnancefunction();
    $ordR3 = new ordonnancefunction();

    $liste = $ordR->list_Pat_consult($_GET['id_rdv']);
    $liste2 = $ordR->list_Med_consult($_GET['id_rdv']);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/formualire_ordonnance/formualire_ordonnance.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 
   
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
        <form id="ordonnanceForm" method="POST" action="">
        <div class="title"><h1>Ordonnance </h1></div>
        <h2>Information Patient</h2><br>
        <div class="info">
            <label for="nomPatient">Nom :</label>
            <input type="text" id="nomPatient" name="nomPatient" value="<?php echo $liste['nom'];?>">
            <label for="prenomPatient">Prénom :</label>
            <input type="text" id="prenomPatient" name="prenomPatient" value="<?php echo $liste['prenom'];?>">
            <label for="agePatient">Âge :</label>
            <input type="number" id="agePatient" name="agePatient" value="<?php echo $liste['age'];?>">
        </div><br>
        <h2>Information Médicaments</h2><br>
        <div class="info">
            <label for="nomMedecin">Nom Médecin :</label>
            <input type="text" id="nomMedecin" name="nomMedecin"  value="<?php echo $liste2['nom'];?>">
            <label for="prenomMedecin">Prénom Médecin :</label>
            <input type="text" id="prenomMedecin" name="prenomMedecin" value="<?php echo $liste2['prenom'];?>">
            <input type="hidden" name="specMedecin" value="<?php echo $liste2['specialite'];?>">
        </div><br>
        <h3>Liste des Médicaments</h3><br>
        <table class="medicaments-table">
            <thead>
                <tr>
                    <th>Nom Médicament</th>
                    <th>Posologie par jour</th>
                    <th>Remarques</th>
                </tr>
            </thead>
            <tbody id="medicamentsList">
            <?php
                $medicaments = $ordR3->list_Medicament_consult($_GET['id_rdv']);
                foreach ($medicaments as $medicament) {
                    echo '<input type="hidden" name="date" value="'.$medicament['date_consultation'].'">';
                    echo '<input type="hidden" name="ex" value="'.$medicament['examen_consultation'].'">';
                    echo '<input type="hidden" name="id_c" value="'.$medicament['id_c'].'">';
                    $listeMedicaments = explode(', ', $medicament['examen_consultation']);
                    foreach ($listeMedicaments as $nomMedicament) {
                        echo '<tr>';
                        echo '<td><input type="text" name="nomMedicament[]" value="' . $nomMedicament . '" required></td>';
                        echo '<td>
                                <input type="number" class="posologie-input" name="posologie[]" value="1" min="1">
                                <span class="plus-minus-btn" onclick="incrementer(this)">+</span>
                                <span class="plus-minus-btn" onclick="decrementer(this)">-</span>
                            </td>';
                        echo '<td><input type="text" name="remarques[]" value=""></td>'; 
                        echo '</tr>';
                    }
                }
            ?>
            </tbody>
        </table>
        <button type="submit" id="preparerOrdonnance">Enregistrer Ordonnance</button>

        <div id="successMessage" class="hidden success-animation" style="background-color:#799bb9; color: white; padding: 10px;">
            L'ordonnance a été ajoutée avec succès!
        </div>
    </form>

    <script>
    function incrementer(btn) {
        var input = btn.previousElementSibling;
        input.value = parseInt(input.value) + 1;
    }

    function decrementer(btn) {
        var input = btn.previousElementSibling.previousElementSibling;
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }

    $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '../controller/addordonnance.php',
                data: $(this).serialize(),
                success: function (response) {
                    showSuccessMessage();
                    console.log(response);
            
                    $('#successMessage').append('<br><a href="#" id="downloadPDF">Télécharger le PDF</a>');
                },
                error: function () {
                    console.log('Une erreur s\'est produite');
                }
            });
        });

        function showSuccessMessage() {
            $('#successMessage').removeClass('hidden');
        }

        $('#successMessage').on('click', '#downloadPDF', function (e) {
            e.preventDefault();
            window.location.href = '../view/ordonnance_pdf.php?' + $('form').serialize();
        });
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