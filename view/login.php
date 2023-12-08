<?php
require '../controller/userC.php';
session_start();
$userC = new userC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email_signin"];
    $password = $_POST["password_signin"];

    $user = $userC->validateLogin($email, $password);

    if ($user) {

        $_SESSION['user_id'] = $user->getid_user();
        $_SESSION['image'] = $user->getimage();
        $_SESSION['cin'] = $user->getcin();
        $_SESSION['nom'] = $user->getnom();
        $_SESSION['prenom'] = $user->getprenom();
        $_SESSION['age'] = $user->getage();
        $_SESSION['sexe'] = $user->getsexe();
        $_SESSION['telephone'] = $user->gettelephone();
        $_SESSION['nationalite'] = $user->getnationalite();
        $_SESSION['mail'] = $user->getemail();
        $_SESSION['password'] = $user->getpassword();
        $_SESSION['role'] = $user->getrole();
        $_SESSION['diplome'] = $user->getdiplome();
        $_SESSION['specialite'] = $user->getspecialite();
        $_SESSION['pays'] = $user->getpays();
        $_SESSION['ville'] = $user->getville();
        $_SESSION['lieu_cabinet'] = $user->getlieu_cabinet();
        $_SESSION['image'] = $user->getimage();   
        
        if ($_SESSION['role']=='patient')
            header('Location: menu_consultation.php');
        else if ($_SESSION['role']=='medecin')
            header('Location: menu_consultation_med.php');
        else    
            header('Location: menu_consultation_admin.php');

        exit();
    } else {
        echo "Invalid login credentials.";
    }
}
?>

