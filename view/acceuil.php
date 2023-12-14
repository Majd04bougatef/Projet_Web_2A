<?php
  include '../controller/fonction_medilab_acceuil.php';
  include '../controller/blogC.php';

  include_once '../config.php';
  include_once '../Controller/EventC.php';

  $eventC = new EventC();

  if (isset($_POST['searchTerm'])) {
      $searchTerm = $_POST['searchTerm'];
      $events = $eventC->searchEvents($searchTerm);
  } else {

      $events = $eventC->listEvents();
  }

  $medtun= new function_medtun();



  $blog= new blogC();

  if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $blog_list = $blog->searchBlogsByTitle($searchTerm);
  } else {
    $blog_list = $blog->listBlogsAcceuil();
  }
  $count_medecin = $medtun->conter_nombre_medecin();
  $count_specialite = $medtun->conter_nombre_specialite();
  $count_blog = $medtun->conter_nombre_blog();
  $count_event = $medtun->conter_nombre_event();

 

$blog_list = $blog_list->fetchAll(PDO::FETCH_ASSOC); 

$blogPerPage = 4; 
$totalBlogs = count($blog_list);
$totalPages = ceil($totalBlogs / $blogPerPage);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $blogPerPage;

$paginatedBlogs = array_slice($blog_list, $offset, $blogPerPage);



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MedTUN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/imglogo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="../assets/css/style.css" rel="stylesheet">  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>


  <style>
 .search-input {
    padding: 10px;
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 10px;
  }

  .search-btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  /* Style de la pagination */
  .pagination {
    margin-top: 20px;
  }

  .pagination a {
    color: #007bff;
    padding: 8px 16px;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    margin: 0 4px;
    border-radius: 5px;
  }

  .pagination a.active {
    background-color: #007bff;
    color: white;
  }

  .pagination a:hover:not(.active) {
    background-color: #ddd;
  }
    </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">medtun200@gmail.com</a>
        <i class="bi bi-phone"></i> +216 20 981 776
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="../view/acceuil.php">MedTUN</a></h1>
    
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Blog</a></li>
          <li><a class="nav-link scrollto" href="#departments">Spécialité</a></li>
          <li><a class="nav-link scrollto" href="#evenement">Evénements</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="../view/pagel_login_create.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Se connecter</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Bienvenue dans MedTUN</h1>
      <h2>Tous Les Membres De MedTUN sont a Votre Service</h2>
      <a href="../view/pagel_login_create.php" class="btn-get-started scrollto">S'inscrire</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Pourquoi choisissez MedTUN?</h3>
              <p>
              MedTUN se distingue par sa capacité à simplifier et à rationaliser le processus de prise de rendez-vous, offrant ainsi une solution complète pour les utilisateurs cherchant à organiser efficacement leurs consultations médicales. En plus de sa convivialité, MedTUN propose une interface intuitive qui facilite la planification des rendez-vous, que ce soit pour des consultations médicales régulières, des examens ou d'autres services de santé.
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Services</h4>
                    <p>Gérez vos rendez-vous médicaux facilement et efficacement</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Avantages pour les Patients</h4>
                    <p>Réservation 24/7, n'importe où, n'importe quand</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Avantages pour les Médecins</h4>
                    <p>Gestion centralisée des rendez-vous pour une journée plus organisée</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            
            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">Votre Confidentialité, Notre Priorité</a></h4>
              <p class="description">Nous sommes déterminés à assurer la confidentialité et la sécurité à chaque étape de votre expérience sur notre plateforme.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bxs-detail"></i></div>
              <h4 class="title"><a href="">Découvrez Notre Blog</a></h4>
              <p class="description">Nous croyons en la diffusion d'informations utiles pour améliorer votre expérience de santé et vous tenir informé des dernières avancées.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-mail-send"></i></div>
              <h4 class="title"><a href="">Mail</a></h4>
              <p class="description">Veuillez noter que vous recevrez des e-mails de notification pour confirmer vos rendez-vous et vous informer sur l'envoi d'ordonnances. </p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $count_medecin;?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Docteur inscrit dans notre site</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $count_specialite;?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>spécialité</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bx bxs-detail"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $count_blog;?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Blog</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bx bx-calendar-event"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $count_event;?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Evenements</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->


    <!-- ======= Doctors Section ======= -->
    <section id="doctors" class="doctors">
      <div class="container">
        <div class="section-title">
          <h2>Blog</h2>
          <p></p>
        </div>
        

      <div class="row">
                <form method="GET" action="">
                    <input type="text" name="search" class="search-input" placeholder="Trouvez votre article...">
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            <?php foreach ($paginatedBlogs as $list) : ?>
              <input type="hidden" name="id_b" value="<?php echo $list['id_b'];?>">
                <div class="col-lg-6">
                  <div class="member d-flex align-items-start">
                    <div class="pic"><img  src="../controller/<?php echo $list['image'];?>" class="img-fluid" alt=""></div>
                    <div class="member-info">
                      <h4><?php echo $list['titre_blog'];?></h4>
                      <span><?php echo $list['nom'].'  '.$list['prenom'];?></span>
                      <p><?php echo $list['desc_blog'];?></p>
                      <div class="social">
                        <a href="../controller/read_more.php?id_b=<?php echo $list['id_b'];?>"><i class="bi bi-chat-left-text-fill"></i></a>
                        
                      </div>
                    </div>
                  </div>   
                </div>
                
            <?php endforeach; ?>
        </div>

        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <a href="?page=<?= $i ?>" class="<?= $page == $i ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    </section><!-- End Doctors Section -->

    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
      <div class="container">

        <div class="section-title">
          <h2>Spécialites</h2>
          <p>Une petite idées sur les spécialites.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">Cardiologie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Neurologie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Hepatologie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Pediatrie</a>
              </li>
              
            </ul>
          </div>
          <div class="col-lg-9">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Cardiologie</h3>
                    <p class="fst-italic">La cardiologie est une spécialité médicale qui se concentre sur l'étude, le diagnostic et le traitement des affections liées au cœur et au système cardiovasculaire. Les cardiologues, qui sont des médecins spécialisés en cardiologie, traitent un large éventail de problèmes cardiaques, allant des maladies coronariennes et des troubles du rythme cardiaque aux anomalies congénitales du cœur.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../assets/img/departments-1.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Neurologie</h3>
                    <p class="fst-italic">La neurologie est une spécialité médicale axée sur l'étude, le diagnostic et le traitement des troubles du système nerveux. Cela inclut le cerveau, la moelle épinière, les nerfs périphériques et les muscles. Les médecins spécialisés dans cette discipline sont appelés neurologues.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../assets/img/departments-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Hepataologie</h3>
                    <p class="fst-italic">L'hépatologie est la branche de la médecine qui se concentre sur l'étude, le diagnostic et le traitement des maladies du foie, de la vésicule biliaire, des voies biliaires et des pancréas. Les médecins spécialisés dans cette discipline sont appelés hépatologues.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../assets/img/departments-3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Pediatre</h3>
                    <p class="fst-italic">Le pédiatre est un médecin spécialisé dans la prise en charge de la santé des nourrissons, des enfants et des adolescents. Cette branche de la médecine est appelée pédiatrie. Les pédiatres sont formés pour diagnostiquer, traiter et prévenir un large éventail de problèmes de santé qui peuvent survenir au cours de l'enfance et de l'adolescence.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../assets/img/departments-4.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row gy-4">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="../assets/img/departments-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Departments Section -->

 <!-- ======= Section Événements ======= -->


<section id="evenement" class="evenemnts">
  <div class="container">
  <div class="section-title">
  <h2>evenement</h2>
      <p>
        Bienvenue dans l'univers captivant des événements médicaux, où la découverte, l'innovation et le partage de connaissances se rencontrent. 
        Explorez notre plateforme dédiée pour rester informé sur les dernières avancées et participer à des événements qui façonnent l'avenir de la médecine.
      </p>
      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
      
    <?php 
      foreach ($events as $event):
    ?>
    <div class="swiper-slide">
        <div class="testimonial-wrap">
            <div class="testimonial-item">
                <a href="../controller/event_details_medtun.php?id_event=<?= $event['id_e']; ?>">
                    <img height ="200px" width="300px" src="../controller/<?php echo isset($event['image']) ? $event['image'] : ''; ?>"    >
                </a>
                <h3 data-aos="fade-up"><?= isset($event['titre_event']) ? $event['titre_event'] : ''; ?></h3>                <p>
          
                </p>
            </div>
        </div>
    </div><!-- Fin de l'élément de témoignage -->
<?php endforeach; ?>

      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  <script>
    AOS.init();
</script>

</section>
<!-- Fin de la section Événements -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
      </div>

      <div>
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193006.801292632!2d10.130123353294925!3d36.80464158596226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12beacfaec75a9c3%3A0x71df9a62b3bb6f82!2sTunis%2C%20Tunisia!5e0!3m2!1sen!2sus!4v1645013521940!5m2!1sen!2sus" frameborder="0" allowfullscreen></iframe>
</div>


      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localisation:</h4>
                <p>Tunis ,Tunsisie</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>medtun200@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Télephone:</h4>
                <p>+216 20 000 000</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="../view/mailmedtun.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message " required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Envoyer Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>MedTUN</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
  
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>