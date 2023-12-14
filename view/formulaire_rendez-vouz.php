<?php
include_once("../controller/addconsultation.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https:://cdnjs.cloudflare.com/ajax/libs/font-awsome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/formulaire_rendez-vous/formulaire_rendez-vous.css">
    <link rel="stylesheet" type="text/css" href="../assets/consultation/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Document</title>
    <style>
        #medicamentsContainer {
            margin-top: 20px;
        }

        #medicamentsTable {
            border-collapse: collapse;
            width: 100%;
        }

        #medicamentsTable th,
        #medicamentsTable td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        #medicamentsTable th {
            background-color: #f2f2f2;
        }

        #nouveauMedicament {
            padding: 8px;
        }

        #ajouterMedicamentBtn {
            padding: 8px;
            margin-left: 10px;
            cursor: pointer;
        }

        #examen {
            display: none;
            /* Pour cacher le champ "examen" original */
        }

        .flex {
            display: flex;
        }

        .medicament-container {
            margin-right: 10px;
            /* Ajustez la marge selon vos préférences */
        }

        .table-container {
            flex-grow: 1;
        }
    </style>

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

        <?php
    if (isset($_GET['id_rdv'])) {
        $id_rdv = $_GET['id_rdv'];
        $nom = isset($_GET['nom']) ? $_GET['nom'] : '';
        $prenom = isset($_GET['prenom']) ? $_GET['prenom'] : '';
        $age = isset($_GET['age']) ? $_GET['age'] : '';
    }
    ?>
    <form class="form" method="POST" action="../controller/addconsultation.php">
        <p class="title">Register Consultation</p>
        <p class="message">Information Patient</p>
        <div class="flex">
            <label for="nom">
                <span>Nom : </span>
                <input type="hidden" name="idrdv" value="<?php echo $id_rdv; ?>">
                <input class="input" id="nom" type="text" name="nom" value="<?php echo $nom; ?>">

            </label>

            <label for="prenom">
                <span>Prénom : </span>
                <input class="input" type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>">

            </label>
        </div>

        <div class="flex">
            <label for="age">
                <span>Age :</span>
                <input class="input" type="text" id="age" name="age" value="<?php echo $age; ?>">

            </label>


        </div>
        </p>

        <p class="message">Information Consultation</p>
        <div class="flex">
            <label for="date">
                <span>Date Consultation</span>
                <input class="input" type="date" id="date" name="date">
            </label>

            <label for="description">
                <span>Description Consultation</span>
                <textarea class="input" id="description" type="text" name="description"></textarea>
            </label>



        </div>

        <div class="flex">
            <label for="motif">
                <span>Motif Consultation</span>
                <input class="input" id="motif" type="text" name="motif">
            </label>

            <label for="symptomes">
                <span>Symptomes</span>
                <input class="input" id="symptomes" type="text" name="symptomes">
            </label>
        </div>

        <div class="flex">
            <label for="prescription">
                <span>Prescription Consultation</span>
                <input class="input" id="prescription" type="text" name="prescription">
            </label>

        </div>

        <div class="flex">
            <label for="examen">
                <span>Médicaments :</span>
                <div class="medicament-container">
                    <input class="input" id="nouveauMedicament" type="text">

                </div>
            </label>

            <button class="submit" type="button" id="ajouterMedicamentBtn" onclick="ajouterMedicament()" style="height:45px; margin-top:25px;">Ajouter Médicament</button>

            <input class="input" id="examen" type="hidden" name="examen" value="">
        </div>

        <div class="flex">
            <div class="table-container">
                <table id="medicamentsTable">
                    <thead>
                        <tr>
                            <th>Médicament</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="medicamentsList"></tbody>
                </table>
            </div>
        </div>



        </p>
        <input class="submit" type="submit" onclick="validation_champs(event)">

    </form>

    <script>
        function valider_champs_lettres(chaine) {
            if (/^[A-Za-z ]+$/.test(chaine)) {
                return true;
            } else {
                return false;
            }
        }

        function valider_champs_nombre(num) {
            if (/^[0-9]+$/.test(num) && num < 150 && num > 0) {
                return true;
            } else {
                return false;
            }
        }

        function valider_champs_vide(chaine) {
            if (chaine !== "") {
                return true;
            } else {
                return false;
            }
        }

        function validation_champs(event) {
            event.preventDefault();

            var nom = document.getElementsByName("nom")[0].value;
            var prenom = document.getElementsByName("prenom")[0].value;
            var desc = document.getElementsByName("description")[0].value;
            var motif = document.getElementsByName("motif")[0].value;
            var symp = document.getElementsByName("symptomes")[0].value;
            var examen = document.getElementsByName("examen")[0].value;

            if (!valider_champs_lettres(nom)) {
                alert("Nom incorrect");
                return false;
            }

            if (!valider_champs_lettres(prenom)) {
                alert("Prénom incorrect");
                return false;
            }

            if (!valider_champs_vide(desc)) {
                alert("Manque de description");
                return false;
            }

            if (!valider_champs_vide(motif)) {
                alert("Manque de Motif");
                return false;
            }

            if (!valider_champs_vide(symp)) {
                alert("Manque de Symptomes");
                return false;
            }

            if (!valider_champs_vide(examen)) {
                alert("Manque de Examen");
                return false;
            }

            console.log($("form").serialize());
            var formData = $("form").serializeArray();
            formData.push({
                name: 'idrdv',
                value: '<?php echo $id_rdv; ?>'
            });
            console.log(formData);
            $.ajax({
                type: "POST",
                url: "../controller/addconsultation.php",
                data: $("form").serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Enregistrement réussi!',
                        text: 'Les données ont été ajoutées avec succès.',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Générer Ordonnance'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'formulaire_ordonnance.php?id_rdv=<?php echo $id_rdv; ?>';
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            window.location.href = 'calendar.php';
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Erreur lors de l'envoi de la requête AJAX", error);
                    console.log(xhr.responseText);
                }
            });


            return false;
        }
        document.addEventListener("DOMContentLoaded", function() {
            var date = document.getElementsByName("date")[0];
            var dateActuelle = new Date();
            var dateFormat = dateActuelle.toISOString().slice(0, 10);
            date.value = dateFormat;
        });

        function ajouterMedicament() {
            var medicamentInput = document.getElementById('examen');
            var nouveauMedicamentInput = document.getElementById('nouveauMedicament');
            var medicamentsList = document.getElementById('medicamentsList');
            var medicamentsTable = document.getElementById('medicamentsTable');

            var nouveauMedicament = nouveauMedicamentInput.value.trim();

            if (nouveauMedicament !== '') {
                var newRow = medicamentsTable.insertRow();
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);

                cell1.textContent = nouveauMedicament;

                var deleteButton = document.createElement('button');
                deleteButton.textContent = 'Supprimer';
                deleteButton.onclick = function() {
                    medicamentsTable.deleteRow(newRow.rowIndex);
                    mettreAJourChampExamen();
                };

                cell2.appendChild(deleteButton);

                if (medicamentInput.value !== '') {
                    medicamentInput.value += ', ';
                }
                medicamentInput.value += nouveauMedicament;

                nouveauMedicamentInput.value = '';
            }
        }

        function mettreAJourChampExamen() {
            var medicamentInput = document.getElementById('examen');
            var medicamentsTable = document.getElementById('medicamentsTable');
            var rows = medicamentsTable.rows;

            medicamentInput.value = '';

            for (var i = 1; i < rows.length; i++) {
                var medicament = rows[i].cells[0].textContent.trim();

                if (medicamentInput.value !== '') {
                    medicamentInput.value += ', ';
                }
                medicamentInput.value += medicament;
            }
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