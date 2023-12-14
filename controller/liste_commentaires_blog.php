<?php
include '../Controller/commentaireC.php';
$commentaireC = new commentC();
$listCommentaires = $commentaireC->listCommentaires();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaire Display</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

    
        h2{
            text-align: left;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
            margin: auto;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        td {
            background-color: #fff;
        }

        form {
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #27ae60;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #219d54;
        }

        .delete-link {
            color: #e74c3c;
            font-weight: bold;
        }

        .delete-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
   
    <!--<h2><a href="add_commentaire.php">Ajouter un commentaire</a></h2>-->
    <table>
        <tr>
            <th>Id</th>
            <th>Date du commentaire</th>
            <th>Description du commentaire</th>
            <th>Mise à jour</th>
            <th>Supprimer</th>
        </tr>
        <?php
        foreach ($listCommentaires as $commentaire) {
        ?>
            <tr>
                <td><?= $commentaire['id_com']; ?></td>
                <td><?= $commentaire['date_commentaire']; ?></td>
                <td><?= $commentaire['desc_commentaire']; ?></td>
                <td>
                    <form method="POST" action="update_commentaire.php">
                        <input type="submit" name="update" value="Mise à jour">
                        <input type="hidden" value=<?= $commentaire['id_com']; ?> name="id_com">
                    </form>
                </td>
                <td>
                    <a class="delete-link" href="delete_commentaire.php?id_com=<?= $commentaire['id_com']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
