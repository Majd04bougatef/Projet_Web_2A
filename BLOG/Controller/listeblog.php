<?php
include '../Controller/blogC.php';
$blogC = new blogC();
$list = $blogC->listblogs();

if (isset($_GET['search']) && !empty($_GET['search'])) {
  $searchTerm = $_GET['search'];
  $list = $blogC->searchBlogsByTitle($searchTerm);
} else {
  $list = $blogC->listblogs();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Med.TUN Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="index.html" class="navbar-brand">Med.TUN</a>
                <div class="navbar-nav">
                    <a href="">home</a>
                    <a href="">blog</a>
                </div>
            </div>
        </nav>
        <div class="banner">
            <div class="container">
                <h1 class="banner-title">
                    <span>Med.</span> TUN
                </h1>
                <p>Tout ce que vous voulez savoir sur la médecine et les soins de santé</p>
                <form method="GET" action="listeblog.php">
                    <input type="text" name="search" class="search-input" placeholder="Trouvez votre article...">
                    <button type="submit" class="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <section class="blog" id="blog">
        <div class="container">
            <div class="title">
                <h2>Dernier Blog</h2>
                <p>Articles récents sur la santé et la médecine</p>
            </div>
            <div class="blog-content">

                <?php foreach ($list as $blog) { ?>
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="<?= $blog['image']; ?>" alt="<?= $blog['titre_blog']; ?>">
                            <span><i class="far fa-heart"></i></span>
                        </div>
                        <div class="blog-text">
                            <span><?= $blog['date_blog']; ?></span>
                            <h2><?= $blog['titre_blog']; ?></h2>
                            <h2><?= $blog['sujet_blog']; ?></h2>
                            <p><?= $blog['desc_blog']; ?></p>
                            <a href="read_more.php?id_b=<?= $blog['id_b']; ?>">Read More</a>
                            <form method="POST" action="update_blog.php">
                                <input type="submit" name="update" value="Update">
                                <input type="hidden" value="<?= $blog['id_b']; ?>" name="id_b">
                            </form>
                            <a href="#" class="delete-link" data-id="<?= $blog['id_b']; ?>">Delete</a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>

    <footer>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
        </div>
        <span>Med.TUN Blog Page</span>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var deleteLinks = document.querySelectorAll('.delete-link');

            deleteLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();

                    var result = confirm("Voulez-vous vraiment supprimer cet article?");

                    if (result) {
                        // Redirige vers l'URL de suppression avec l'identifiant du blog
                        window.location.href = 'delete_blog.php?id_b=' + link.getAttribute('data-id');
                    }
                });
            });
        });
    </script>
</body>
</html>
