<?php

include '../controller/blogC.php';

$error = "";

// create blog
$blog = null;

// create an instance of the controller
$blogC = new blogC();

session_start();

if (
    isset($_POST["titre_blog"]) &&
    isset($_POST["sujet_blog"]) &&
    isset($_POST["desc_blog"]) &&
    isset($_FILES["image"])
    // isset($_POST["date_blog"])
) {
    if (
        !empty($_POST['titre_blog']) &&
        !empty($_POST["sujet_blog"]) &&
        !empty($_POST["desc_blog"]) &&
        !empty($_FILES["image"])
        // !empty($_POST["date_blog"])
    ) {
        // Traitement de l'image
        $targetDirectory = "chemin/vers/votre/dossier/";

        // Crée le répertoire s'il n'existe pas
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Vérifier si le fichier est une image réelle
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Télécharger le fichier sur le serveur
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Création de l'objet blog avec le chemin de l'image
                $blog = new blog(
                    null,
                    $_POST['titre_blog'],
                    $_POST['sujet_blog'],
                    $_POST['desc_blog'],
                    new DateTime($_POST['date_blog']),
                    $_SESSION['user_id'],
                    $_FILES['image']['name']
                );
                $blogC->addblog($blog);
                echo '<script>window.location.href = "../view/menu_consultation_medecin.php";</script>';
            } else {
                $error = "Erreur lors du téléchargement du fichier.";
            }
        } else {
            $error = "Le fichier n'est pas une image.";
        }
    } else {
        $error = "Missing information";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                        <a href="../controller/add_event.php">
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
        <form class="form" action="" method="POST" enctype="multipart/form-data">
      <div class="container">
          <div class="modal">
              <div class="modal__header">
                  <span class="modal__title">Nouveau Article</span>
                  <button class="button button--icon">
                      <svg width="24" viewBox="0 0 24 24" height="24" xmlns="http://www.w3.org/2000/svg">
                          <path fill="none" d="M0 0h24v24H0V0z"></path>
                          <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path>
                      </svg>
                  </button>
              </div>
              <div class="modal__body">
                  <div class="input">
                      <label class="input__label" for="titre_blog">Titre</label>
                      <input class="input__field" name="titre_blog" type="text" id="titre_blog" autocomplete="off">
                      <p class="input__description">LE titre doit contient maximum 32 caractéres</p>
                  </div>
                  <div class="input">
                      <label class="input__label" for="sujet_blog">Sujet</label>
                      <input class="input__field" type="text" name="sujet_blog" id="sujet_blog" autocomplete="off">
                  </div>
                  <div class="input">
                      <label class="input__label" for="desc_blog">Description</label>
                      <textarea class="input__field input__field--textarea" name="desc_blog" id="desc_blog" autocomplete="off"></textarea>
                      <p class="input__description">Rédigez une bonne description de votre article</p>
                  </div>
                  <form method="POST" action="" enctype="multipart/form-data">
                  <div class="input">
                      <label class="input__label" for="image">Image</label>
                      <input class="input__field" type="file" name="image" id="image" accept="image/*">
                      <p class="input__description">Choisissez une image pour votre article</p>
                  </div>
                  </form>
              </div>
              <div class="modal__footer">
                  <button class="button button--primary">Créer</button>
                  <button class="button button--primary" type="reset" value="Reset"> Reset</button>
              </div>
          </div>
      </div>
  </form>


    <style>

      .form{
        margin-top: 0%;
        margin-left: 5%;
      }
      
      .button {
  appearance: none;
  font: inherit;
  border: none;
  background: none;
  cursor: pointer;
}

.container {
  position: absolute;

  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1.5rem;
}

.modal {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 500px;
  background-color: #fff;
  box-shadow: 0 15px 30px 0 rgba(0, 125, 171, 0.15);
  border-radius: 10px;
}

.modal__header {
  padding: 1rem 1.5rem;
  border-bottom: 1px solid #ddd;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.modal__body {
  padding: 1rem 1rem;
}

.modal__footer {
  padding: 0 1.5rem 1.5rem;
}

.modal__title {
  font-weight: 700;
  font-size: 1.25rem;
}

.button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  transition: 0.15s ease;
}

.button--icon {
  width: 2.5rem;
  height: 2.5rem;
  background-color: transparent;
  border-radius: 0.25rem;
}

.button--icon:focus, .button--icon:hover {
  background-color: #ededed;
}

.button--primary {
  background-color: #007dab;
  color: #FFF;
  padding: 0.75rem 1.25rem;
  border-radius: 0.25rem;
  font-weight: 500;
  font-size: 0.875rem;
}

.button--primary:hover {
  background-color: #006489;
}

.input {
  display: flex;
  flex-direction: column;
}

.input + .input {
  margin-top: 1.75rem;
}

.input__label {
  font-weight: 700;
  font-size: 0.875rem;
}

.input__field {
  display: block;
  margin-top: 0.5rem;
  border: 1px solid #DDD;
  border-radius: 0.25rem;
  padding: 0.75rem 0.75rem;
  transition: 0.15s ease;
}

.input__field:focus {
  outline: none;
  border-color: #007dab;
  box-shadow: 0 0 0 1px #007dab, 0 0 0 4px rgba(0, 125, 171, 0.25);
}

.input__field--textarea {
  min-height: 100px;
  max-width: 100%;
}

.input__description {
  font-size: 0.875rem;
  margin-top: 0.5rem;
  color: #8d8d8d;
}


    </style>
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