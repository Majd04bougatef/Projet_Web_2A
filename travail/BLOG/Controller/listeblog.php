<?php
include '../Controller/blogC.php';
$blogC = new blogC();
$list = $blogC->listblogs();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Med.TUN Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    
  </head>
  <body>

    <!-- header -->
    <header>
      <nav class = "navbar">
        <div class = "container">
          <a href = "index.html" class = "navbar-brand">Med.TUN</a>
          <div class = "navbar-nav">
            <a href = "">home</a>
            <a href = "">design</a>
            <a href = "">blog</a>
            <a href = "">about</a>
          </div>
        </div>
      </nav>
      <div class = "banner">
        <div class = "container">
          <h1 class = "banner-title">
            <span>Med.</span> TUN
          </h1>
          <p>Tout ce que vous voulez savoir sur la médecine et les soins de santé</p>
          <form>
            <input type = "text" class = "search-input" placeholder="Trouvez votre article . . .">
            <button type = "submit" class = "search-btn">
              <i class = "fas fa-search"></i>
            </button>
          </form>
        </div>
      </div>
    </header>
    <!-- end of header -->
    
    

<!-- blog -->
<section class="blog" id="blog">
    <div class="container">
        <div class="title">
            <h2>Dernier Blog</h2>
            <p>Articles récents sur la santé et la médecine</p>
        </div>
        <div class="blog-content">

            <?php
            foreach ($list as $blog) {
            ?>
                <!-- item -->
                <div class="blog-item">
                    <div class="blog-img">
                        <!-- You can use the image path from your database or use a placeholder -->
                       <!-- <img src="<?= $blog['image_path']; ?>" alt="">-->
                        <img src="../Controller/blog-p-6.webp">
                        <span><i class="far fa-heart"></i></span>
                    </div>
                    <div class="blog-text">
                        <span><?= $blog['date_blog']; ?></span>
                        <h2><?= $blog['titre_blog']; ?></h2>
                        <p><?= $blog['desc_blog']; ?></p>
                        <a href="read_more.php?id_b=<?= $blog['id_b']; ?>">Read More</a>
                    </div>
                </div>
                <!-- end of item -->
            <?php
            }
            ?>

        </div>
    </div>
</section>
<!-- end of blog -->
    
    <!-- footer -->
    <footer>
      <div class = "social-links">
        <a href = "#"><i class = "fab fa-facebook-f"></i></a>
        <a href = "#"><i class = "fab fa-twitter"></i></a>
        <a href = "#"><i class = "fab fa-instagram"></i></a>
        <a href = "#"><i class = "fab fa-pinterest"></i></a>
      </div>
      <span>Med.TUN Blog Page</span>
    </footer>
    <!-- end of footer -->
    
    
  </body>
</html>