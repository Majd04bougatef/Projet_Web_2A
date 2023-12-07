<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../source/menu_consultation.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
   
    <title>Consultation</title>
</head>
<body>
    
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <a href="menu_consultation.php"><img class="imglogo" src="../source/logo.png" alt="logo"></a>
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
                    <li >
                        <a href="../view/rendez-vous.php" >
                            <i class='bx bx-clinic icon'></i>
                            <span class="text nav-text" >Ajjouter rendezvous</span>
                        </a>
                    </li>

                    <li >
                        <a href="../view/chose.php">
                            <i class="bx bx-bar-chart-alt-2 icon"></i>
                            <span class="text nav-text">Consulter rendezvous</span>
                        </a>
                    </li>

                    <li >
                        <a href="../view/choseup.php">
                            <i class="bx bx-bell icon"></i>
                            <span class="text nav-text">Update rendez-vous</span>
                        </a>
                    </li>

                    
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
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
        <h1>rendez-vous</h1>
    </div>
    <script src="../source/menu.js"></script>

</body>
</html>