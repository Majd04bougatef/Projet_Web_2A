<?php
include '../Controller/blogC.php';
$blogC = new blogC();
$list = $blogC->listblogs();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>




<body>

    <center>
        <h1>Liste des articles </h1>
        <h2>
            <a href="add_blog.php">Add article</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id </th>
            <th>Titre</th>
            <th>Sujet</th>
            <th>Description</th>
            <th>Date </th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $blog) {
        ?>
            <tr>
                <td><?= $blog['id_b']; ?></td>
                <td><?= $blog['titre_blog']; ?></td>
                <td><?= $blog['sujet_blog']; ?></td>
                <td><?= $blog['desc_blog']; ?></td>
                <td><?= $blog['date_blog']; ?></td>
                <td align="center">
                    <form method="POST" action="update_blog.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $blog['id_b']; ?> name="id_b">
                    </form>
                </td>
                <td>
                    <a href="delete_blog.php?id_b=<?php echo $blog['id_b']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>

