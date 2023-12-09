<?php
session_start();
include '../controller/userC.php';
$user = null;

$userC = new userC();


if (isset($_POST["cin"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["age"]) && isset($_POST["sexe"]) && isset($_POST["nationalite"]) && isset($_POST["telephone"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["role"]) && isset($_POST["diplome"]) && isset($_POST["specialite"]) && isset($_POST["pays"]) && isset($_POST["ville"]) && isset($_POST["lieu_cabinet"])) {
    $user = new user(
        null, 
        $_POST["cin"],
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["age"],
        $_POST["sexe"],
        $_POST["telephone"],
        $_POST["nationalite"],
        $_POST["email"],
        $_POST["password"],
        $_POST["role"],
        $_POST["diplome"],
        $_POST["specialite"],
        $_POST["pays"],
        $_POST["ville"],
        $_POST["lieu_cabinet"]
    );
    
    echo 'erger';
    $userC->updateuser($user, $_POST["user_id"]);
 
    header('Location: menu_consultation.php');
} else {
    $error = "";
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/list.css">
    <title>User Display</title>
</head>

<body>


<div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    
    if (isset($_SESSION['user_id'])) {
       
        $user = $userC->showuser($_SESSION['user_id']);
      
        
    ?>

        <form action="" method="POST">
        <?php
    foreach ($_POST as $key => $value) {
        echo "$key: $value<br>";
    }
    ?>
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="cin">CIN:</label>
                    </td>
                    <td><input type="text" name="cin" id="cin" value="<?php echo $_SESSION['cin']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">Nom:</label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $_SESSION['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom:</label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['prenom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="age">Age:</label>
                    </td>
                    <td><input type="text" name="age" id="age" value="<?php echo $_SESSION['age']; ?>" maxlength="3"></td>
                </tr>
                <tr>
                    <td>
                        <label for="sexe">Sexe:</label>
                    </td>
                    <td><input type="text" name="sexe" id="sexe" value="<?php echo $_SESSION['sexe']; ?>" maxlength="1"></td>
                </tr>
                <tr>
                    <td>
                        <label for="telephone">Telephone:</label>
                    </td>
                    <td><input type="text" name="telephone" id="telephone" value="<?php echo $_SESSION['telephone']; ?>" maxlength="10"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nationalite">Nationalite:</label>
                    </td>
                    <td><input type="text" name="nationalite" id="nationalite" value="<?php echo $_SESSION['nationalite']; ?>" maxlength="20"></td>
                </tr>
               
                <tr>
                    <td>
                        <label for="password">Password:</label>
                    </td>
                    <td><input type="password" name="password" id="password" value="<?php echo $_SESSION['password']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="role">Role:</label>
                    </td>
                    <td><input type="text" name="role" id="role" value="<?php echo $_SESSION['role']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="diplome">Diplome:</label>
                    </td>
                    <td><input type="text" name="diplome" id="diplome" value="<?php echo $_SESSION['diplome']; ?>" maxlength="50"></td>
                </tr>
                <tr>
                    <td>
                        <label for="specialite">Specialite:</label>
                    </td>
                    <td><input type="text" name="specialite" id="specialite" value="<?php echo $_SESSION['specialite']; ?>" maxlength="50"></td>
                </tr>
                <tr>
                    <td>
                        <label for="pays">Pays:</label>
                    </td>
                    <td><input type="text" name="pays" id="pays" value="<?php echo $_SESSION['pays']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="ville">Ville:</label>
                    </td>
                    <td><input type="text" name="ville" id="ville" value="<?php echo $_SESSION['ville']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lieu_cabinet">Lieu Cabinet:</label>
                        </td>
                    <td><input type="text" name="lieu_cabinet" id="lieu_cabinet" value="<?php echo $_SESSION['lieu_cabinet']; ?>" maxlength="50"></td>
                </tr>
                <tr>
                   
                    <td colspan="2">
                    
                        <input type="submit" value="Update">
                        <input type="reset" value="Reset">
                        <a href="../view/deleteuser.php" ><p>delete Profile</p>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
        </form>
    <?php
    }
    ?>
</body>

</html>
