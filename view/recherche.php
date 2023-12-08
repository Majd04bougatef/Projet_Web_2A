<?php
include '../Controller/userC.php';
$userC = new userC();

if (isset($_GET['nom']) && !empty($_GET['nom'])) {
    $list = $userC->showuser($_GET['nom']);
} else {
    $list = $userC->listuser();
}

?>

<html>

<head>
</head>

<body>

    <div>
        <form action="" method="GET">
            <input type="text" name="nom" id="nom" placeholder="Enter user name">
            <input type="submit" value="Search">
        </form>
    </div>

    <center>
        <h1>List of users</h1>
    </center>

    <?php if (is_array($list) && count($list) > 0) : ?>
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
            </tr>
            <?php foreach ($list as $user) : ?>
                <tr>
                    <td><?= $user->getid_user(); ?></td>
                    <td><?= $user->getcin(); ?></td>
                    <td><?= $user->getnom(); ?></td>
                    <td><?= $user->getprenom(); ?></td>
                    <td><?= $user->getage(); ?></td>
                    <td><?= $user->getsexe(); ?></td>
                    <td><?= $user->gettelephone(); ?></td>
                    <td><?= $user->getnationalite(); ?></td>
                    <td><?= $user->getemail(); ?></td>
                    <td><?= $user->getrole(); ?></td>
                    <td><?= $user->getdiplome(); ?></td>
                    <td><?= $user->getspecialite(); ?></td>
                    <td><?= $user->getpays(); ?></td>
                    <td><?= $user->getville(); ?></td>
                    <td><?= $user->getlieu_cabinet(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>

</html>
