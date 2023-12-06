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
                    <a href="menu_consultation.php"><img class="imglogo" src="../image/logo/logo.png" alt="logo"></a>
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
    <a href="updateuser.php">
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
        <div class="action">
            <div class="profile">
                <img src="img.jpg" alt="Profile Image">
            </div>
            <div class="menu">
                <!-- Session nom -->
                <ul>
                    <li><img src="img.jpg" alt="Icon"><a href="#">My Profile</a></li>
                    <li><img src="img.jpg" alt="Icon"><a href="#">Edit Profile</a></li>
                    <li><img src="img.jpg" alt="Icon"><a href="#">Inbox</a></li>
                    <li><img src="img.jpg" alt="Icon"><a href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
        <div class="animated-title">
            <div class="text-top">
              <div>
                <span>Vous Pouvez Ici </span>
                
                <span>Profitez de nos services</span>
              </div>
            </div>
            <div class="text-bottom">
              <div>MedTUN</div>
              
            </div>
          </div>
        </div>
    </div>
    <script src="../assets/consultation/menu_consultaion.js"></script>

</body>
</html>