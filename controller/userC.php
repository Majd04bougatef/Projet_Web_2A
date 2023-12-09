<?php
include '../config.php';
include '../model/user.php';

class userC
{

    function showuser($id_user)
    {
        $sql = "SELECT * from user where id_user = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id_user]);

            $id_user = $query->fetch();
            return $id_user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function updatePasswordResetToken($is_user, $token) {
        $pdo = Config::getConnexion();

        $stmt = $pdo->prepare("UPDATE user SET reset_token = :token WHERE id_user = :id_user");
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":id_user", $is_user);
             return $stmt->execute();
    }
    public function getUserByEmail($email) {
        $pdo = Config::getConnexion();

        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
     public function listuser()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    // Inside userC.php

// Inside userC.php

public function adduser($user)
{
    try {
        $db = config::getConnexion();

        $x=$user->getrole();
        $x2=$user->getnom();
        $cr = substr($x, 0, 1);
        $cn = substr($x2, 0, 1);

        $mr = strtoupper($cr);
        $mn = strtoupper($cn);
        $c=$user->getcin();
        $id =$mr.$mn.$c;

        echo $id;
        $query = $db->prepare('INSERT INTO user (id_user,cin, nom, prenom, age, sexe, telephone, nationalite, mail, password, role, diplome, specialite, pays, ville, lieu_cabinet,image) VALUES (:id,:cin, :nom, :prenom, :age, :sexe, :telephone, :nationalite, :email, :password, :role, :diplome, :specialite, :pays, :ville, :lieu_cabinet,:image)');
        $query->execute([
            'id'  => $id,
            'cin' => $user->getcin(),
            'nom' => $user->getnom(),
            'prenom' => $user->getprenom(),
            'age' => $user->getage(),
            'sexe' => $user->getsexe(),
            'telephone' => $user->gettelephone(),
            'nationalite' => $user->getnationalite(),
            'email' => $user->getemail(),
            'password' => $user->getpassword(),
            'role' => $user->getrole(),
            'diplome' => $user->getdiplome(),
            'specialite' => $user->getspecialite(),
            'pays' => $user->getpays(),
            'ville' => $user->getville(),
            'lieu_cabinet' => $user->getlieu_cabinet(),
            'image' => $user->getimage()
        ]);

   } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

    function updateuser($user, $id_user)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE user SET 
            
                cin = :cin, 
                nom = :nom, 
                prenom = :prenom, 
                age = :age, 
                sexe = :sexe, 
                telephone = :telephone, 
                nationalite = :nationalite, 
                email = :email, 
                password = :password, 
                role = :role, 
                diplome = :diplome, 
                specialite = :specialite, 
                pays = :pays, 
                ville = :ville, 
                lieu_cabinet = :lieu_cabinet
            WHERE id_user = :id_user'
        );
        $query->execute([
            'id_user' => $id_user,
           ' image'=> $user->getimage(),
            'cin' => $user->getcin(),
            'nom' => $user->getnom(),
            'prenom' => $user->getprenom(),
            'age' => $user->getage(),
            'sexe' => $user->getsexe(),
            'telephone' => $user->gettelephone(),
            'nationalite' => $user->getnationalite(),
            'email' => $user->getemail(),
            'password' => $user->getpassword(),
            'role' => $user->getrole(),
            'diplome' => $user->getdiplome(),
            'specialite' => $user->getspecialite(),
            'pays' => $user->getpays(),
            'ville' => $user->getville(),
            'lieu_cabinet' => $user->getlieu_cabinet()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function deleteuser($id_user)
{
    $sql = "DELETE FROM user WHERE id_user = :id_user";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id_user', $id_user);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

public function getUserById($id_user)
{
    $query = "SELECT * FROM user WHERE id_user = :id_user";
    $db = config::getConnexion();
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_user', $id_user);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($userData) {
        return new user(
            $userData['id_user'],
            $userData['cin'],
            $userData['nom'],
            $userData['prenom'],
            $userData['age'],
            $userData['sexe'],
            $userData['telephone'],
            $userData['nationalite'],
            $userData['email'],
            $userData['password'],
            $userData['role'],
            $userData['diplome'],
            $userData['specialite'],
            $userData['pays'],
            $userData['ville'],
            $userData['lieu_cabinet'],
            $userData['image']
        );
    }
    return null; 
}


public static function rechercheParNom($nom)
{
    $pdo = Config::getConnexion();

    try {
        $query = "SELECT * FROM user WHERE nom LIKE :nom";
        $stmt = $pdo->prepare($query);
        $nomRecherche = "%$nom%";
        $stmt->bindParam(':nom', $nomRecherche, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die('Erreur de recherche par nom: ' . $e->getMessage());
    }
}
































































































public function login($email, $password) {
    try {
        $pdo = config::getConnexion();

        $select_user = $pdo->prepare("SELECT * FROM users WHERE email = :email and pwd = :password");
        $select_user->bindValue(':email', $email, PDO::PARAM_STR);
        $select_user->bindValue(':password', $password, PDO::PARAM_STR);
        $select_user->execute();

        $row = $select_user->fetch(PDO::FETCH_ASSOC);

        // Utilisez isset pour vérifier si $row['user_id'] est défini
        if (isset($row['user_id'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];
            return 1 ;
        } else {
            $message = 'Identifiants incorrects!';
        }
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }
}

public function validateLogin($email, $password) {
    $pdo = Config::getConnexion();

    $stmt = $pdo->prepare("SELECT * FROM user WHERE mail = :email");
  
    $stmt->execute(['email'=>$email]);

    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userData) {

        if ( $userData['password']== $password){
            return new user(
                $userData['id_user'],
                $userData['cin'],
                $userData['nom'],
                $userData['prenom'],
                $userData['age'],
                $userData['sexe'],
                $userData['telephone'],
                $userData['nationalite'],
                $userData['email'],
                $userData['password'],
                $userData['role'],
                $userData['diplome'],
                $userData['specialite'],
                $userData['pays'],
                $userData['ville'],
                $userData['lieu_cabinet'],
                $userData['image']
            );
        }
    }

    return null;
}
 public function customEncrypt($password) {
    // Define a substitution cipher
    $cipher = [
        'a' => '12dmls',
        'b' => 'l5dmen',
        'c' => 'xyz123',
        'd' => 'abc456',
        'e' => '789def',
        'f' => '012ghi',
        'g' => 'lmn456',
        'h' => 'opq789',
        'i' => '012jkl',
        'j' => '789mno',
        'k' => 'pqr012',
        'l' => '345stu',
        'm' => '678vwx',
        'n' => 'yz0123',
        'o' => '456abc',
        'p' => '789def',
        'q' => '012ghi',
        'r' => '345jkl',
        's' => '678mno',
        't' => 'pqr012',
        'u' => '345stu',
        'v' => '678vwx',
        'w' => 'yz0123',
        'x' => '456abc',
        'y' => '789def',
        'z' => '012ghi',

        'A' => 'ABC123',
        'B' => 'XYZ789',
        'C' => 'lmn456',
        'D' => 'opq789',
        'E' => '012ghi',
        'F' => 'lmn456',
        'G' => 'opq789',
        'H' => '012jkl',
        'I' => '789mno',
        'J' => 'pqr012',
        'K' => '345stu',
        'L' => '678vwx',
        'M' => 'yz0123',
        'N' => '456abc',
        'O' => '789def',
        'P' => '012ghi',
        'Q' => '345jkl',
        'R' => '678mno',
        'S' => 'pqr012',
        'T' => '345stu',
        'U' => '678vwx',
        'V' => 'yz0123',
        'W' => '456abc',
        'X' => '789def',
        'Y' => '012ghi',
        'Z' => '345jkl',

        '0' => '456abc',
        '1' => '789def',
        '2' => '012ghi',
        '3' => '345jkl',
        '4' => '678mno',
        '5' => 'pqr012',
        '6' => '345stu',
        '7' => '678vwx',
        '8' => 'yz0123',
        '9' => '456abc'
    ];

    $hashedPassword = '';
    foreach (str_split($password) as $char) {
        $hashedPassword.= isset($cipher[$char]) ? $cipher[$char] : $char;
    }

    return $hashedPassword;
}


}


























?>