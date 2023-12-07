
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
             body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('../source/bgr.jpg'); 
            background-size: cover;
            background-position: center;
        }
        .card {
  width: 240px;
  height: 254px;
  padding: 0 15px;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  gap: 12px;
  background: #fff;
  border-radius: 20px;
}

.card  {
  margin: 0;

}

.card__title {
  font-size: 23px;
  font-weight: 900;
  color: #333;
}

.card__content {
  font-size: 13px;
  line-height: 18px;
  color: #333;
}

.card__form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.card__form input {
  margin-top: 10px;
  outline: 0;
  background: rgb(255, 255, 255);
  box-shadow: transparent 0px 0px 0px 1px inset;
  padding: 0.6em;
  border-radius: 14px;
  border: 1px solid #333;
  color: black;
}

.card__form button {
  border: 0;
  background: #111;
  color: #fff;
  padding: 0.68em;
  border-radius: 14px;
  font-weight: bold;
}

.sign-up:hover {
  opacity: 0.8;
} 


.container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* Adjust the gap as needed */
        }

        .card {
            width: 200px; /* Adjust the card width as needed */
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            text-align: center;
            margin: 10px;
        }

        button {
            width: 150px;
            height: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            background: red;
            border: none;
            border-radius: 5px;
            box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
            background: #e62222;
          
        }

        button:hover {
            background: #ff3636;
        }

        button .text {
            transform: translateX(35px);
            color: white;
            font-weight: bold;
        }

        button .icon {
            position: absolute;
            border-left: 1px solid #c41b1b;
            transform: translateX(110px);
            height: 40px;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        button svg {
            width: 15px;
            fill: #eee;
        }

        button:hover .text {
            color: transparent;
        }

        button:hover .icon {
            width: 150px;
            border-left: none;
            transform: translateX(0);
        }

        button:focus {
            outline: none;
        }

        button:active .icon svg {
            transform: scale(0.8);
        }
    </style>
</head>
<body>
<?php
include '../controller/rdvC.php';
$rendezvous = new rdvC();
$list = $rendezvous->showR();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../source/menu_consultation.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <title>Document</title>
    <style>
    

    </style>
</head>
<body>

    <div class="container">
        <?php
            foreach ($list as $med){
        ?>
            <div class="card">
                <div class="card-border-top"></div>
                <div class="img"></div>
                <span><?php echo $med['id_rdv'];?></span>
                <p class="job"><?php echo $med['date_rdv'];?></p>
                <form action="update2.php" method="GET">
                    <input type="hidden" name="id_rdv" value="<?php echo $med['id_rdv']; ?>">
                    <button type="submit">update</button>
                </form>
            </div>
        <?php
            }
        ?>
    </div>
    
</body>
</html>
</body>
</html>