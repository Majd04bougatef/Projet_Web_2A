<?php 
session_start();

var_dump($_SESSION);

?>



<!DOCTYPE html>
    <!-- Creadted by Coding Pakistan Youtube Channel -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Drop-Down Profile Menu - Coding Pakistan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <div class="hero">
        
        <nav>
            <h2 class="logo">medtun</h2>
            <ul>

                <li> <a href="#"> Home </a></li>
                <li> <a href="#"> Features </a></li>
                <li> <a href="#"> About </a></li>
                <li> <a href="#"> Contact </a></li>
            </ul>
            <img src="images/user.png" class="user-pic" onclick="toggleMenu()">

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="images/user.png">
                        <?php

if (isset($_SESSION['user_id']))
{
?>
<h1><?php echo $_SESSION['nom'];?></h1>
    <?php
}
else{
    ?>
    <li><a href="#">ssssss</a><li>

    <?php
}
?>
                    </div>
                    <hr>

                    <a href="http://localhost/projet%202/view/updateuser.php" class="sub-menu-link">
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

                    <a href="http://localhost/projet%202/view/logout.php" class="sub-menu-link">
                        <img src="images/logout.png">
                        <p>Logout</p>
                        <span> > </span>
                    </a>

                </div>
            </div>

        </nav>
    </div>

<script>
    let subMenu = document.getElementById("subMenu");
    
    function toggleMenu(){
        subMenu.classList.toggle("open-menu");
    }
</script>
</body>
</html>