<?php
include '../Controller/userC.php';
$userC = new userC();
$list = $userC->listuser();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../source/style.css">
</head>
<body>

    <center>
        <h1>List of users</h1>
        <h2>
            <a href="adduser.php">Add user</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id user</th>
            <th>cin</th>
            <th>nom</th>
            <th>prenom</th>
            <th>age</th>
            <th>sexe</th>
            <th>telephone</th>
            <th>nationalite</th>
            <th>email</th>
            <th>role</th>
            <th>diplome</th>
            <th>specialite</th>
            <th>pays</th>
            <th>ville</th>
            <th>lieu_cabinet</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $user) {
        ?>
            <tr>
                <td><?= $user['id_user']; ?></td>
                <td><?= $user['cin']; ?></td>
                <td><?= $user['nom']; ?></td>
                <td><?= $user['prenom']; ?></td>
                <td><?= $user['age']; ?></td>
                <td><?= $user['sexe']; ?></td>
                <td><?= $user['telephone']; ?></td>
                <td><?= $user['nationalite']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['role']; ?></td>
                <td><?= $user['diplome']; ?></td>
                <td><?= $user['specialite']; ?></td>
                <td><?= $user['pays']; ?></td>
                <td><?= $user['ville']; ?></td>
                <td><?= $user['lieu_cabinet']; ?></td>

                <td align="center">
                    <form method="POST" action="updateuser.php">
                        <input type="hidden" value="<?= $user['id_user']; ?>" name="id_user">
                        <input type="submit" name="update" value="Update">
                    </form>
                </td>
                <td>
                    <a href="deleteuser.php?id_user=<?= $user['id_user']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
